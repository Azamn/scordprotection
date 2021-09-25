<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OurClietsController;
use App\Http\Controllers\Admin\GetInTouchController;
use App\Http\Controllers\FeedbackController;

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

/** Route :: About-US */
Route::get('/get-all/about-us',[AboutUsController::class,'getAll'])->name('about-us.getAll');
Route::post('/create/about-us',[AboutUsController::class,'create'])->name('about-us.create');

/** Route:: GetInTouch */
Route::get('/get-all/get-in-touch',[GetInTouchController::class, 'getAll']);
Route::post('/create/get-in-touch',[GetInTouchController::class, 'create']);

/** Route :: OurClients */
Route::get('/get-all/our-clients',[OurClietsController::class, 'getAll']);
Route::post('/create/our-clients',[OurClietsController::class, 'create']);
Route::get('/get-single/our-clients/{clientId}',[OurClietsController::class,'getSingle']);
Route::post('/update/our-clients/{clientId}',[OurClietsController::class, 'update']);

/** Route :: Services */
Route::get('/get-all/service',[ServiceController::class, 'getAll']);
Route::post('/create/services',[ServiceController::class, 'create']);
Route::get('/get-single/service/{serviceId}',[ServiceController::class,'getSingle']);
Route::post('/update/service/{serviceId}',[ServiceController::class, 'update']);

/** Route :: features */
Route::get('/get-all/features', [FeatureController::class, 'getAll']);
Route::post('/create/feature',[FeatureController::class, 'create']);


Route::get('/home',[HomePageController::class, 'index']);
