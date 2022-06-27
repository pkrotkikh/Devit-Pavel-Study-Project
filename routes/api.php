<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post("v1/auth/register", [AuthController::class, "register"])->name("api.auth.register");
Route::post("v1/auth/login", [AuthController::class, "login"])->name("api.auth.login");
Route::get("v1/auth/me", [AuthController::class, "me"])->name("api.auth.me");
