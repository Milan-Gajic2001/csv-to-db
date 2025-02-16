<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'supplier_name',
        'days_valid',
        'priority',
        'part_number',
        'part_desc',
        'quantity',
        'price',
        'condition',
        'category'
    ];
}
