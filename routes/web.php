<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Mail\MailController;



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


Route::prefix('admin')->group(function(){
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::get('/formSendMail', [UserController::class, 'formSendMail'])->name('formSendMail');
    Route::post('/send', [UserController::class, 'sendMailUserProfile'])->name('send');

    

});
Route::prefix('session')->group(function(){
    Route::get('/', [SessionController::class, 'index']);
    Route::get('/about', [SessionController::class, 'about']);

});