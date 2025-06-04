<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\OrderController;
use App\Http\Controllers\Home\PaymentController;
use App\Http\Controllers\Home\ProfileAddressController;
use App\Http\Controllers\Home\ProfileController;
use App\Http\Controllers\Home\WishListController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('home.panel.')->group(function () {
        Route::get('panel', [ProfileController::class, 'panel'])->name('dashboard');

        Route::resource('address', ProfileAddressController::class);
        Route::get('/get-cities/{province_id}', [ProfileAddressController::class, 'getCities']);
    });
    Route::post('/payment', [PaymentController::class, 'payment'])->name('home.payment');
    Route::get('/payment-verify/{gatewayName}', [PaymentController::class, 'paymentVerify'])->name('home.payment_verify');

    Route::resource('orders', OrderController::class);
    Route::get('/wishlist', [WishListController::class, 'usersProfileIndex'])->name('wishlist.users_profile.index');

    // Route::get('/orders', [OrderController::class, 'index'])->name('orders.users_profile.index');


    // Route::get('verify-email', EmailVerificationPromptController::class)
    //     ->name('verification.notice');

    // Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    // Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    //     ->middleware('throttle:6,1')
    //     ->name('verification.send');

    // Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    //     ->name('password.confirm');

    // Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
