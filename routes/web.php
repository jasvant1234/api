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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test', [App\Http\Controllers\HomeController::class, 'test'])->name('test');
Route::get('/notification', [App\Http\Controllers\HomeController::class, 'notification'])->name('notification');

Route::get('/mail', [App\Http\Controllers\HomeController::class, 'mail'])->name('mail');
Route::post('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/slider', [App\Http\Controllers\ProductController::class, 'index'])->name('slider');



