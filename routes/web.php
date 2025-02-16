<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'homepage'])->name('homepage');


Route::prefix('api')->group(function () {
    // Showing all suppliers
    Route::get('/suppliers', [ProductController::class, 'getSuppliers']);
});
