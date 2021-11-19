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

    Route::get('/invoice/{id}/destroy', [\App\Http\Controllers\InvoiceController::class,'destroy'])->name('invoice.destroy');
    Route::post('/invoice/{type}/store', [\App\Http\Controllers\InvoiceController::class,'store'])->name('invoice.store');
    Route::get('/invoice/{id}/edit', [\App\Http\Controllers\InvoiceController::class,'edit'])->name('invoice.edit');
    Route::put('/invoice/{id}/update', [\App\Http\Controllers\InvoiceController::class,'update'])->name('invoice.update');
    Route::get('/invoice/{type}', [\App\Http\Controllers\InvoiceController::class,'index'])->name('invoice.index');
    Route::get('/invoice/{type}/create', [\App\Http\Controllers\InvoiceController::class,'create'])->name('invoice.create');




});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
