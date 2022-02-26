<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout/{user}', 'logout');
});
