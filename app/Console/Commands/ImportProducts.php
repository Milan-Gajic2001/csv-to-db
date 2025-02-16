<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ImportProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:products {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This commands insert data into products table from csv file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument("file");

        //Checking if file exists, if not return error with message
        if (!file_exists($filePath) || !is_readable($filePath)) {
            $this->error('File does not exist or is not readable.');
            return;
        }
        // file method makes array of csv file 
        // collect method makes collection of array
        $data = collect(file($filePath))
            ->skip(1)
            // each data in one line separated by coma is made into array
            ->map(fn($line) => str_getcsv($line))
            ->map(fn($productData) => [
                'supplier_name' => $productData[0],
                'days_valid' => intval($productData[1]),
                'priority' => intval($productData[2]),
                'part_number' => $productData[3],
                'part_desc' => $productData[4],
                'quantity' => intval($productData[5]),
                'price' => intval($productData[6]),
                'condition' => $productData[7],
                'category' => $productData[8],
            ])
            // Checking if row has all needed data
            ->filter(function ($productData) {
                foreach ($productData as $value) {
                    if (!$value) {
                        return false;
                    }
                }
                return true;
            });

        Product::insert($data->all());
    }
}
