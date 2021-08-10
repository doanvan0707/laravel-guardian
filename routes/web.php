<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;

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

Route::group(['middleware' => ['guardian'], 'prefix' => 'admin'], function(){
    Route::get('/product', [ProductController::class, 'index'])->name('product.read');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'checkLogin'])->name('check-login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('permission', [PermissionController::class, 'create'])->name('create-permission');
    Route::post('permission', [PermissionController::class, 'store'])->name('store-permission');
    Route::get('join-group', [PermissionController::class, 'setjoinGroup'])->name('set-join-group');
    Route::post('join-group', [PermissionController::class, 'storejoinGroup'])->name('store-join-group');
});