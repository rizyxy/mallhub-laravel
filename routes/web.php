<?php

use App\Http\Controllers\IndexCategoryController;
use App\Http\Controllers\IndexFloorController;
use App\Http\Controllers\IndexProductController;
use App\Http\Controllers\IndexStoreController;
use Illuminate\Support\Facades\Route;
use League\Csv\Query\Row;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('api')->group(function () {

    Route::get('products', IndexProductController::class);

    Route::get('stores', IndexStoreController::class);

    Route::get('floors', IndexFloorController::class);

    Route::get('categories', IndexCategoryController::class);

    Route::get('subcategories', IndexCategoryController::class);
});
