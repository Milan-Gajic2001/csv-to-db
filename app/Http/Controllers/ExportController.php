<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    //
    public function exportCsv($name)
    {
        $supplierName = $name;
        $sanitizedSupplierName = preg_replace('/[^a-zA-Z0-9]/', '_', $supplierName);
        $timezone = 'Europe/Belgrade';
        $timestamp = Carbon::now($timezone)->format('Y_m_d-H_i');
        $csvFileName = $sanitizedSupplierName . '_' . $timestamp . '.csv';

        $data = Product::where('supplier_name', $supplierName)->get();
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $columns = ['supplier_name', 'days_valid', 'priority', 'part_number', 'part_desc', 'quantity', 'price', 'condition', 'category', 'created_at', 'updated_at']; // Replace with your actual column names

        $writeLines = function () use ($data, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($data as $row) {
                fputcsv($file, [$row->supplier_name, $row->days_valid, $row->priority, $row->part_number, $row->part_desc, $row->quantity, $row->price, $row->condition, $row->category, $row->created_at, $row->updated_at]); // Replace with your actual column names
            }
            fclose($file);
        };

        return Response::stream($writeLines, 200, $headers);
    }
}
