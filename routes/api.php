<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TweetController;
use App\Http\Controllers\Api\UserController;
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

Route::prefix("v1")->group(function (){
    Route::post("auth/register", [AuthController::class, "register"])->name("api.auth.register");
    Route::post("auth/login", [AuthController::class, "login"])->name("api.auth.login");

    Route::group(['middleware' => ['auth:api']], function () {
        Route::get("users/profile", [UserController::class, "profile"])->name("api.user.profile");
        Route::get("users/{user_id}", [UserController::class, "otherProfile"])->name("api.user.other.profile");
        Route::get("users/{user_id}/tweets", [UserController::class, "userTweets"])->name("api.user.tweets");

        Route::get('tweets', [TweetController::class, 'index'])->name("api.tweet.index");
        Route::get('tweets/{id}', [TweetController::class, 'show'])->name("api.tweet.show");
        Route::get('tweets/{id}/like', [TweetController::class, 'like'])->name("api.tweet.like");
        Route::post('tweets', [TweetController::class, 'store'])->name("api.tweet.store");
        Route::put('tweets/{id}', [TweetController::class, 'update'])->name("api.tweet.update");
        Route::delete('tweets/{id}', [TweetController::class, 'delete'])->name("api.tweet.delete");
    });
});
