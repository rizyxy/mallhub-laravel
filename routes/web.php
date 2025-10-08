<?php

use App\Http\Controllers\IndexProductController;
use App\Http\Controllers\IndexStoreCatalogController;
use App\Http\Controllers\IndexStoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api')->group(function () {
    Route::get('/stores', IndexStoreController::class);

    Route::get('/store/{storeId}/products', IndexStoreCatalogController::class);

    Route::get('/products', IndexProductController::class);
});
