<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/vue', [App\Http\Controllers\HomeController::class, 'vue'])->name('vue');
