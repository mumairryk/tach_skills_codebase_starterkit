<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Example Routes
Route::view('/', 'landing');
Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
});
Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');

Auth::routes();

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    Route::match(['get', 'post'], '/dashboard', function () {
        return view('dashboard');
    });


Route::resource('/transports',\App\Http\Controllers\TransportController::class)->except('destroy');
Route::get('/transport/{transport}/destroy',[\App\Http\Controllers\TransportController::class,'destroy'])->name('transports.destroy');
Route::resource('/appointments',\App\Http\Controllers\AppointmentController::class)->except('destroy');
Route::get('/appointment/{appointment}/destroy',[\App\Http\Controllers\AppointmentController::class,'destroy'])->name('appointments.destroy');

Route::resource('/users',\App\Http\Controllers\UserController::class)->except('destroy');
Route::get('/user/{user}/destroy',[\App\Http\Controllers\UserController::class,'destroy'])->name('users.destroy');



});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
