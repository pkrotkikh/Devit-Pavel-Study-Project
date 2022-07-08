<?php

use App\Http\Controllers\Web\AuthenticationController;
use App\Http\Controllers\Web\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [AuthenticationController::class, 'register'])->name('auth.register');
Route::get('/login', [AuthenticationController::class, 'login'])->name('auth.login');
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('/{all}', [HomeController::class, 'index'])->name('home.index');
});
