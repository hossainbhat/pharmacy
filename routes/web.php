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

Route::prefix('/admin')->group(function(){
    Route::match(['get','post'],'/',[App\Http\Controllers\UserController::class, 'login']);
    
    Route::group(['middleware' => ['auth']],function(){
        Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard']);
        Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile']);
        Route::post('/update/profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile']);
        Route::get('/setting', [App\Http\Controllers\UserController::class, 'setting']);
        Route::post('/check-pwd', [App\Http\Controllers\UserController::class, 'chkPassword']);
        Route::post('/update-pwd', [App\Http\Controllers\UserController::class, 'updatePassword']);
        Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);
    });
});
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
