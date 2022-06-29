<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/{all}', [HomeController::class, 'index'])->name('home.index');
