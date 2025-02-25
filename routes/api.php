<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\StickerController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [RegisterController::class, 'store']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/me', [UserController::class, 'get']);

    Route::get('/stickers', [StickerController::class, 'get']);

    Route::get('/orders', [OrderController::class, 'get']);
    Route::post('/order', [OrderController::class, 'store']);
    Route::post('/order/{order:order_id}/cancel', [OrderController::class, 'cancel']);

    Route::put('/account', [UserController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
