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

        return response()->json(['message' => 'Suppliers name updated successfully'], 200);
    }

    public function deleteSupplier($name)
    {
        $suppliersProducts = Product::where('supplier_name', $name)->get();
        if ($suppliersProducts->isEmpty()) {
            return response()->json(['message' => 'No suppliers found with the given name'], 404);
        }

        $suppliersProducts->each(fn($product) => $product->delete());
        return response()->json(['message' => 'Supplier deleted successfully'], 200);
    }

    // Get all products
    public function getAllProducts()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function getSupplierProducts($name)
    {
        $supplierProducts = Product::where('supplier_name', $name)->get();
        if ($supplierProducts->isEmpty()) {
            return response()->json(['message' => 'No suppliers found with the given name'], 404);
        }
        return response()->json($supplierProducts);
    }
    // Update row data (product data)
    public function updateRow($id, Request $request)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Supplier not found'], 404);
        }

        // Update supplier data with the request input
        $product->update($request->all());

        return response()->json(['message' => 'Supplier data updated successfully']);
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found']);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
}
