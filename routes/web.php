<?php

use App\Http\Controllers\IndexStoreController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api')->group(function () {
    Route::get('/stores', IndexStoreController::class);
});
