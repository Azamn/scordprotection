<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;


// Route::get('/', function () {
//     return view('main.index');
// })->name('index');


Auth::routes();

Route::get('/home', [HomePageController::class, 'index'])->name('home');

Route::view('/contact-us/page', 'main.contactus')->name('contact-us');
Route::view('/service-page', 'main.ourservice')->name('our-service');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/clients', function () {
    return view('main.clients');
});

Route::get('/services', function () {
    return view('main.service');
});



Route::get('/admin/login', function () {
    return view('admin.Login.admin-login');
});

Route::get('/admin/request', function () {
    return view('admin.Request.request-list');
});


Route::get('/admin/request-completed', function () {
    return view('admin.Request.request-list-completed');
});


Route::get('/admin/contact', function () {
    return view('admin.User.contact');
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
