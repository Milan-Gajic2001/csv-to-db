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

    public function productPage()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function getProduct($id)
    {
        $product = Product::find($id);

        return view('productDetails', ['product' => $product]);
    }
}
