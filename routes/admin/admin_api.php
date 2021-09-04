<?php

use App\Http\Controllers\Admin\AboutUsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/get-all/about-us',[AboutUsController::class,'getAll'])->name('about-us.getAll');
Route::post('/create/about-us',[AboutUsController::class,'create'])->name('about-us.create');
