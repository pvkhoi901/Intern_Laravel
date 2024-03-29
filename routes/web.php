<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\PermissionGroup\PermissionGroupController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\Customer\CustomerController;
use Illuminate\Support\Facades\Auth;

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


Route::prefix('admin')->middleware(['auth', 'verified', 'admin.verify'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('permission-group', PermissionGroupController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('customer', CustomerController::class);
    Route::get('/formSendMail', [UserController::class, 'formSendMail'])->name('formSendMail');
    Route::post('/send', [UserController::class, 'sendMailUserProfile'])->name('send');
});

Auth::routes(['verify' => true]);
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
