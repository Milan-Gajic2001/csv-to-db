<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('api')->group(function () {
    // RADI
    Route::get('/suppliers', [ProductController::class, 'getSuppliers']);
});
