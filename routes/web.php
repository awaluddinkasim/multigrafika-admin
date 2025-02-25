<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StickerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return to_route('dashboard');
})->name('index');

Route::group(['middleware' => 'guest'], function () {
    Route::view('/login', 'login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/stickers', [StickerController::class, 'index'])->name('stickers.list');
    Route::get('/stickers/create', [StickerController::class, 'create'])->name('stickers.create');
    Route::post('/stickers', [StickerController::class, 'store'])->name('stickers.store');
    Route::get('/stickers/{sticker:uuid}', [StickerController::class, 'show'])->name('stickers.show');
    Route::get('/stickers/{sticker:uuid}/edit', [StickerController::class, 'edit'])->name('stickers.edit');
    Route::put('/stickers/{sticker:uuid}', [StickerController::class, 'update'])->name('stickers.update');
    Route::delete('/stickers/{sticker:uuid}', [StickerController::class, 'destroy'])->name('stickers.destroy');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/order/{order:order_id}/complete', [OrderController::class, 'complete'])->name('orders.complete');
    Route::post('/orders/{order:order_id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

    Route::prefix('/account')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('account.admin');
        Route::post('/admin', [AdminController::class, 'store'])->name('account.admin.store');
        Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('account.admin.edit');
        Route::put('/admin/{admin}', [AdminController::class, 'update'])->name('account.admin.update');
        Route::delete('/admin/{admin}', [AdminController::class, 'destroy'])->name('account.admin.destroy');

        Route::get('/customers', [UserController::class, 'index'])->name('account.user');
        Route::post('/customers', [UserController::class, 'store'])->name('account.user.store');
        Route::get('/customers/{user}/edit', [UserController::class, 'edit'])->name('account.user.edit');
        Route::put('/customers/{user}', [UserController::class, 'update'])->name('account.user.update');
        Route::delete('/customers/{user}', [UserController::class, 'destroy'])->name('account.user.destroy');
    });

    Route::view('/about', 'pages.about')->name('about');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
