<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/products', [PageController::class, 'productPage'])->name('products');
Route::get('/products/{id}', [PageController::class, 'getProduct'])->name('productDetails');


Route::prefix('api')->group(function () {
    // Showing all suppliers
    Route::get('/suppliers', [ProductController::class, 'getSuppliers']);
    // Change suppliers name
    Route::patch('/suppliers/{name}/new_name', [ProductController::class, 'updateName']);
    // Delete supplier and his products
    Route::delete('/suppliers/{name}', [ProductController::class, 'deleteSupplier']);
    // Show all products from db
    Route::get('/products', [ProductController::class, 'getAllProducts']);
    // Show all products from specific supplier
    Route::get('/suppliers/name/{name}', [ProductController::class, 'getSupplierProducts']);
    // Change product data
    Route::patch('/products/{id}', [ProductController::class, 'updateRow']);
});
