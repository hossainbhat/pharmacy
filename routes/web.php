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


        //import products
        Route::get('/import-products', [App\Http\Controllers\ImportProductController::class, 'importProduct']);
        Route::match(['get','post'],'/add-edit-importProduct/{id?}', [App\Http\Controllers\ImportProductController::class, 'addEditImportProduct']);
        Route::get('delete-importProduct/{id}', [App\Http\Controllers\ImportProductController::class, 'deleteImportProduct']);
        Route::post('import-product', [App\Http\Controllers\ImportProductController::class, 'importExcellProduct']);

        //product company
        Route::get('/companies', [App\Http\Controllers\ProductCompayController::class, 'ProductCompany']);
        Route::match(['get','post'],'/add-edit-company/{id?}', [App\Http\Controllers\ProductCompayController::class, 'addEditProductCompany']);
        Route::get('delete-company/{id}', [App\Http\Controllers\ProductCompayController::class, 'deleteProductCompany']);
        //product category
        Route::get('/categories', [App\Http\Controllers\ProductCategoryController::class, 'ProductCategory']);
        Route::match(['get','post'],'/add-edit-category/{id?}', [App\Http\Controllers\ProductCategoryController::class, 'addEditProductCategory']);
        Route::get('delete-category/{id}', [App\Http\Controllers\ProductCategoryController::class, 'deleteProductCategory']);
         //product generic
         Route::get('/generics', [App\Http\Controllers\ProductGenericController::class, 'ProductGeneric']);
         Route::match(['get','post'],'/add-edit-generic/{id?}', [App\Http\Controllers\ProductGenericController::class, 'addEditProductGeneric']);
         Route::get('delete-generic/{id}', [App\Http\Controllers\ProductGenericController::class, 'deleteProductGeneric']);
        //product strength
        Route::get('/strengths', [App\Http\Controllers\ProductStrengthController::class, 'ProductStrength']);
        Route::match(['get','post'],'/add-edit-strength/{id?}', [App\Http\Controllers\ProductStrengthController::class, 'addEditProductStrength']);
        Route::get('delete-strength/{id}', [App\Http\Controllers\ProductStrengthController::class, 'deleteProductStrength']);

     });
});
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
