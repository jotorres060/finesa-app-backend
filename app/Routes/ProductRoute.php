<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::controller(ProductController::class)->group(function () {
        $prefix = 'products';

        Route::get($prefix, 'index');
        Route::post($prefix, 'store');
        Route::put($prefix .'/{product}', 'update');
        Route::delete($prefix .'/{product}', 'destroy');
    });
});
