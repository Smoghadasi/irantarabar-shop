<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\FleetController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProfileAddressController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\WishListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['auth:sanctum', 'throttle:60,1']], function () {
    // دریافت اطلاعات کاربر
    Route::get('getUser', [ProfileController::class, 'getProfile']);

    // ناوگان
    Route::get('fleet', [FleetController::class, 'index']);


    // آدرس کاربر
    Route::apiResource('address', ProfileAddressController::class);

    // سفارش ها
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order/{orderId}', [OrderController::class, 'show']);

    // province cities
    Route::get('/province', [ProfileAddressController::class, 'province']);
    Route::get('/provinceCities/{province}', [ProfileAddressController::class, 'provinceCities']);

    // علاقه مندی ها
    Route::get('/add-to-wishlist/{product}', [WishListController::class, 'add']);
    Route::get('/remove-from-wishlist/{product}', [WishlistController::class, 'remove']);
    Route::get('/wishlist', [WishListController::class, 'usersProfileIndex']);

    // بررسی کد تخفیف
    // Route::post('/check-coupon', [CartController::class, 'checkCoupon'])->name('home.coupons.check');
});



// بررسی کاربر سایت
Route::post('check_user', [AuthController::class, 'check_user']);

// دسته بندی
Route::get('category', [CategoryController::class, 'index']);



// بنر
Route::get('banner', [BannerController::class, 'index']);

// جدیدترین محصولات
Route::get('newProducts', [HomeController::class, 'newProducts']);


// جستجو دسته بندی
Route::get('search/{category}', [ProductController::class, 'show']);

// جستجو ساده
Route::get('searchProduct', [ProductController::class, 'searchProduct']);
