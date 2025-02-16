<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function homepage()
    {
        $supplierNames = Product::distinct()->pluck('supplier_name');

        return view('homepage', ['supplierNames' => $supplierNames]);
    }
}
