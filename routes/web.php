<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminPromoController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\User\ConfirmOrderController;
use App\Http\Controllers\User\UserCartController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserOrderController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/products', [HomeProductController::class, 'index'])->name('products');
Route::get('/products/{product}' , [HomeProductController::class, 'show'])->name('products.show');

Auth::routes();

// user route
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', UserDashboardController::class)->name('user.dashboard');

    Route::get('/profile', UserProfileController::class)->name('user.profile');
    Route::post('/order/confirm/{order}', ConfirmOrderController::class)->name('user.order.confirm');
    Route::name('user')->resource('carts', UserCartController::class)->only(['index', 'show', 'store']);
    Route::name('user')->resource('orders', UserOrderController::class)->only(['index', 'show', 'store', 'create']);
    
});

// admin route
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', AdminDashboardController::class)->name('admin.dashboard');

    // products management
    Route::name('admin')->resource('products', AdminProductController::class);
    
    // category management
    Route::name('admin')->resource('categories', AdminCategoryController::class);

    // promo
    Route::name('admin')->resource('promos', AdminPromoController::class);

    // order 
    Route::name('admin')->resource('orders', AdminOrderController::class);
});

