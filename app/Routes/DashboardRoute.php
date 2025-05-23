<?php

/**
 * Dashboard routes
 *
 * @category Routes
 * @package  General
 * @author   Sadra Moghadasi <sadra.19@gmail.com>
 * @license  Copyright Iran-tarabar
 * @link     https://iran-tarabar.ir
 */

namespace App\Routes;

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AttributeValueController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Interfaces\RouteInterface;
use Illuminate\Support\Facades\Route;

class DashboardRoute implements RouteInterface
{
    /**
     * Initialize general routes
     *
     * @return void
     */
    public static function init(): void
    {
        Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
            //داشبورد
            Route::get('/', [DashboardController::class, 'index']);

            // برند
            Route::resource('brand', BrandController::class);

            // ویژگی
            Route::resource('attribute', AttributeController::class);

            // دسته بندی
            Route::resource('category', CategoryController::class);

            // مقدار ویژگی
            Route::resource('attributeValue', AttributeValueController::class);

            // محصول
            Route::resource('product', ProductController::class);

            Route::get('products/{product}/images-edit', [ProductImageController::class, 'edit'])->name('product.images.edit');

            Route::get('products/{product}/category-edit', [ProductController::class, 'editCategory'])->name('product.category.edit');

            Route::put('/products/{product}/category-update', [ProductController::class, 'updateCategory'])->name('product.category.update');


            Route::delete('products/{product}/images-destroy', [ProductImageController::class, 'destroy'])->name('product.images.destroy');
            Route::put('/products/{product}/images-set-primary', [ProductImageController::class, 'setPrimary'])->name('products.images.set_primary');
            Route::post('/products/{product}/images-add', [ProductImageController::class, 'add'])->name('products.images.add');

            // تگ
            Route::resource('tag', TagController::class);

            // سفارشات
            Route::resource('order', OrderController::class);

            // تراکنش ها
            Route::resource('transaction', TransactionController::class);

            // کاربران
            Route::resource('user', UserController::class);


            // ویژگی دسته بندی
            Route::get('category-attributes/{category}', [CategoryController::class, 'getCategoryAttributes'])->name('getCategoryAttributes');
        });
    }
}
