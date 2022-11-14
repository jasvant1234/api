<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[\App\Http\Controllers\Api\ApiController::class,'register'])->name('register');
Route::post('/login',[\App\Http\Controllers\Api\ApiController::class,'login'])->name('login');
Route::get('/getalluser',[\App\Http\Controllers\Api\ApiController::class,'getalluser'])->name('getalluser');
Route::get('/single_user_get',[\App\Http\Controllers\Api\ApiController::class,'single_user_get'])->name('single_user_get');
Route::get('/destroy',[\App\Http\Controllers\Api\ApiController::class,'destroy'])->name('destroy');
Route::get('/edit/{id}',[\App\Http\Controllers\Api\ApiController::class,'edit'])->name('edit');
Route::post('/update',[\App\Http\Controllers\Api\ApiController::class,'update'])->name('update');
Route::post('/logout',[\App\Http\Controllers\Api\ApiController::class,'logout'])->name('logout');
