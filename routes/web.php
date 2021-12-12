<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OurClietsController;
use App\Http\Controllers\Admin\GetInTouchController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('main.index');
// });


Auth::routes();

Route::get('/', [HomePageController::class, 'index'])->name('home');

Route::view('/contact-us/page', 'main.contactus')->name('contact-us');
Route::view('/service-page', 'main.service')->name('our-service');

/** Admin Side */
/** Service Route */
Route::get('/service/list',[ServiceController::class,'getAll'])->name('list-service');
Route::post('/create/services',[ServiceController::class, 'create'])->name('store.services');
Route::view('/create/service','admin.Service.service-create')->name('create-service');


/** Our Clients Route */
Route::get('/get-all/our-clients',[OurClietsController::class, 'getAll'])->name('get.all-ourClients');
Route::view('/create/clients-data','admin.Client.client-create')->name('create-clients');

Route::post('/create/get-in-touch',[GetInTouchController::class, 'create'])->name('store.get-in-touch');

Route::get('/our-clients/page',[HomePageController::class,'ourClientsView'])->name('get.our-clients');

/** Dashboard Route */
Route::get('/admin/dashboard',[DashboardController::class, 'dashboardPage']);

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::get('/clients', function () {
    return view('main.clients');
});

Route::get('/services', function () {
    return view('main.service');
});


Route::get('/admin/login', function () {
    return view('Admin.Login.admin-login');
});

Route::get('/admin/request',[GetInTouchController::class, 'getAll'])->name('get.customer-request');


// Route::get('/admin/request', function () {
//     return view('admin.Request.request-list');
// });


Route::get('/admin/request-completed', function () {
    return view('admin.Request.request-list-completed');
});


Route::get('/admin/contact', function () {
    return view('admin.User.contact');
});


Route::get('/admin/facilities', function () {
    return view('admin.Facilities.facilities');
});


Route::get('/admin/facilities-create', function () {
    return view('admin.Facilities.facilities-create');
});

Route::get('/admin/aboutus-create', function () {
    return view('admin.AboutUs.aboutus-create');
});


Route::get('/admin/about-us', function () {
    return view('admin.AboutUs.aboutus');
});


Route::get('/admin/feedback', function () {
    return view('admin.User.feedback');
});


Route::get('/admin/services', function () {
    return view('admin.Service.service-list');
});

Route::get('/admin/service-create', function () {
    return view('admin.Service.service-create');
});

Route::get('/admin/service-edit', function () {
    return view('admin.Service.service-edit');
});
