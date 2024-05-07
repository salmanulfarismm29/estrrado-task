<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorProductController;
use App\Http\Controllers\VendorStockontroller;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/', 'login_here')->name('login_here');
    Route::get('/logout', 'logout')->name('logout');
});
Route::middleware('auth')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/admni-dashboard', 'admin')->name('admin.dashboard');
            Route::get('/vendor-dashboard', 'vendor')->name('vendor.dashboard');

        });
        Route::resource('vendors', VendorController::class);
        Route::resource('products', ProductController::class);
        Route::resource('stocks', StockController::class);

        Route::resource('vendor-product', VendorProductController::class);
        Route::resource('vendor-stock', VendorStockontroller::class);


});
