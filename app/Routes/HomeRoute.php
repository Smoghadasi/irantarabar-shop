<?php

/**
 * Home routes
 *
 * @category Routes
 * @package  General
 * @author   Sadra Moghadasi <sadra.19@gmail.com>
 * @license  Copyright Iran-tarabar
 * @link     https://iran-tarabar.ir
 */

namespace App\Routes;

use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ProductController;
use App\Interfaces\RouteInterface;
use Illuminate\Support\Facades\Route;

class HomeRoute implements RouteInterface
{
    /**
     * Initialize general routes
     *
     * @return void
     */
    public static function init(): void
    {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('home.products.show');

        Route::get('/cart', [CartController::class, 'index'])->name('home.cart.index');
        Route::post('/add-to-cart', [CartController::class, 'add'])->name('home.cart.add');
        Route::get('/remove-from-cart/{rowId}', [CartController::class, 'remove'])->name('home.cart.remove');
        Route::put('/cart', [CartController::class, 'update'])->name('home.cart.update');
        // Route::get('/clear-cart', [CartController::class, 'clear'])->name('home.cart.clear');
        // Route::post('/check-coupon', [CartController::class, 'checkCoupon'])->name('home.coupons.check');
        Route::get('/checkout', [CartController::class, 'checkout'])->name('home.orders.checkout');
    }
}
