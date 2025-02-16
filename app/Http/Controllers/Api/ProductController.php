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

    public function updateName($name, Request $request)
    {
        $supplierRows = Product::where('supplier_name', $name)->get();

        if (!$supplierRows) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        foreach ($supplierRows as $row) {
            $row->supplier_name = $request->input('new_name');
            $row->save();
        }

        return redirect()->route('homepage')->with('success', 'Supplier name successfully updated');
    }
}
