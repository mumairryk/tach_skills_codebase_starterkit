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

Route::group(['middleware' => ['auth','admin'], 'prefix' => 'admin'], function(){
    Route::match(['get', 'post'], '/dashboard', function () {
        return view('dashboard');
    });


    Route::resource('/transports',\App\Http\Controllers\TransportController::class)->except('destroy');
    Route::get('/transport/calendar',[\App\Http\Controllers\TransportController::class, 'calendar'])->name('transports.calendar');
    Route::get('/transport/{transport}/destroy',[\App\Http\Controllers\TransportController::class,'destroy'])->name('transports.destroy');

    Route::get('/transport/ajaxSubmit',[\App\Http\Controllers\TransportController::class,'ajaxSubmit'])->name('transports.ajaxSubmit');

    Route::resource('/appointments',\App\Http\Controllers\AppointmentController::class)->except('destroy');
    Route::get('/appointment/calendar',[\App\Http\Controllers\AppointmentController::class,'calendar'])->name('appointments.calendar');
    Route::get('/appointment/{appointment}/destroy',[\App\Http\Controllers\AppointmentController::class,'destroy'])->name('appointments.destroy');
    Route::get('/appointment/ajaxSubmit',[\App\Http\Controllers\AppointmentController::class,'ajaxSubmit'])->name('appointments.ajaxSubmit');

    Route::resource('/users',\App\Http\Controllers\UserController::class)->except('destroy');
    Route::get('/user/{user}/destroy',[\App\Http\Controllers\UserController::class,'destroy'])->name('users.destroy');

    /** Role Routes */
    Route::get('roles',[\App\Http\Controllers\RoleController::class,'index'])->name('roles');
    Route::get('role/create',[\App\Http\Controllers\RoleController::class,'create'])->name('roles.create');
    Route::post('role/store',[\App\Http\Controllers\RoleController::class,'store'])->name('roles.store');
    Route::get('role/edit/{id}',[\App\Http\Controllers\RoleController::class,'edit'])->name('roles.edit');
    Route::patch('role/{id}/update',[\App\Http\Controllers\RoleController::class,'update'])->name('roles.update');
    Route::get('role/destroy/{id}',[\App\Http\Controllers\RoleController::class,'destroy'])->name('roles.destroy');


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
