<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OurClietsController;
use App\Http\Controllers\Admin\GetInTouchController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FeedbackController;
use App\Models\GetInTouch;

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

Route::group(['middleware' => 'auth:sanctum'], function () {

    /** Route :: About-US */
    Route::get('/get-all/about-us', [AboutUsController::class, 'getAll'])->name('about-us.getAll');
    Route::post('/create/about-us', [AboutUsController::class, 'create'])->name('store.about-us');
    Route::delete('/delete/about-us', [AboutUsController::class, 'delete'])->name('about-us.delete');
    Route::get('/change/about-us/status', [AboutUsController::class, 'changeAboutUsStatus'])->name('about-us.change.status');

    /** Route:: GetInTouch */
    Route::get('/customer/request', [GetInTouchController::class, 'getAll'])->name('customer-request-all');
    Route::post('/create/get-in-touch', [GetInTouchController::class, 'create']);
    Route::delete('/delete/request', [GetInTouchController::class, 'delete'])->name('delete.request');
    Route::get('/customer/completed/request', [GetInTouchController::class, 'getCompletedRequest'])->name('get.customer-completed-request');
    Route::get('/change/request/status', [GetInTouchController::class, 'changeRequestStatus'])->name('request.change.status');


    /** Route :: OurClients */
    Route::get('/get-all/our-clients', [OurClietsController::class, 'getAll'])->name('all-ourClients');
    Route::post('/create/our-clients', [OurClietsController::class, 'create'])->name('client.create');
    Route::get('/get-single/our-clients/{clientId}', [OurClietsController::class, 'getSingle']);
    Route::post('/update/our-clients/{clientId}', [OurClietsController::class, 'update']);
    Route::delete('/delete/our-clients', [OurClietsController::class, 'delete'])->name('client.delete');
    Route::get('/change/client/status', [OurClietsController::class, 'changeClientStatus'])->name('client.change.status');

    /** Route :: Services */
    Route::get('/get-all/service', [ServiceController::class, 'getAll']);
    Route::post('/update/service/{serviceId}', [ServiceController::class, 'update']);
    Route::delete('/delete/service', [ServiceController::class, 'delete'])->name('delete.service');

    /** Route :: features */
    Route::get('/get-all/features', [FeatureController::class, 'getAll'])->name('get.all-features');
    Route::post('/create/feature', [FeatureController::class, 'create'])->name('create.feature');
    Route::delete('/delete/feature', [FeatureController::class, 'delete'])->name('feature.delete');
    Route::get('/change/feature/status', [FeatureController::class, 'changeFeatureStatus'])->name('feature.change.status');


    /** Route :: Feedback */
    Route::get('customer/feedback', [FeedbackController::class, 'getAll'])->name('get.feedback');
    Route::post('/create/feedback', [FeedbackController::class, 'create'])->name('store.feedback');
    Route::delete('/delete/feedback', [FeedbackController::class, 'delete'])->name('feedback.delete');
    Route::get('/change/feedback/status', [FeedbackController::class, 'changeFeedbackStatus'])->name('feedback.change.status');

    /** Route :: Contact US */
    Route::get('/get/contact-us', [ContactUsController::class, 'getContact'])->name('get.contact');
    Route::post('/update/contatc-us', [ContactUsController::class, 'create'])->name('update.contatc');
});


Route::get('/get/service/drop-down', [ServiceController::class, 'getServiceFOrDropdown'])->name('get.dropDownService');
Route::get('/get-single/service/{service}', [ServiceController::class, 'getSingle'])->name('get-single.service');

//Route::get('/', [HomePageController::class, 'index']);
