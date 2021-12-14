<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function () {
    return auth()->user();
});

//Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('forgot/password',[AuthController::class,'forgotPasswordRequest'])->name('forgot.password');

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('logout',[AuthController::class,'logout']);
    Route::post('change/password',[AuthController::class,'changePassword']);
});
