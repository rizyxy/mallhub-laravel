<?php

use App\Http\Controllers\IndexCategoryController;
use App\Http\Controllers\IndexFloorCatalogController;
use App\Http\Controllers\IndexFloorController;
use App\Http\Controllers\IndexProductController;
use App\Http\Controllers\IndexStoreCatalogController;
use App\Http\Controllers\IndexStoreController;
use App\Http\Controllers\IndexSubCategoryCatalogController;
use App\Http\Controllers\IndexSubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api')->group(function () {

    Route::get('/categories', IndexCategoryController::class);

    Route::get('/category/{categoryId}/subcategories', IndexSubCategoryController::class);

    Route::get('/subcategory/{subCategoryId}/products', IndexSubCategoryCatalogController::class);

    Route::get('/floors', IndexFloorController::class);

    Route::get('/floor/{floorId}/stores', IndexFloorCatalogController::class);

    Route::get('/stores', IndexStoreController::class);

    Route::get('/store/{storeId}/products', IndexStoreCatalogController::class);

    Route::get('/products', IndexProductController::class);
});
