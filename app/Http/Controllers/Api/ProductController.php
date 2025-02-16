<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function getSuppliers()
    {
        $supplierNames = Product::distinct()->pluck('supplier_name');

        return response()->json($supplierNames);
    }
}
