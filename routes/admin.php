<?php

use Illuminate\Support\Facades\Route;

// Route::redirect('/','admin/dashboard');

Route::redirect('/', '/admin/service');
Route::view('dashboard', 'admin.dashboard')->name('admin.dashboard');


Route::view('profile', "admin.profile.account")->name('admin.profile.account');

Route::view('device_services/{id}', "admin.device.list-services")->name('admin.device.services');
Route::view('personal_services', "admin.service.index-personal")->name('admin.personal.service');
Route::view('service_simple/create', "admin.service.create-simple")->name('admin.service-simple.create');

$routes = ['item', 'device', 'service'];

foreach ($routes as $route) {
    Route::view($route, 'admin.' . $route . '.index')->name('admin.' . $route . '.index');
    Route::view($route . '/create', 'admin.' . $route . '.create')->name('admin.' . $route . '.create');
    Route::view($route . '/edit/{id}', 'admin.' . $route . '.edit')->name('admin.' . $route . '.edit');
}
