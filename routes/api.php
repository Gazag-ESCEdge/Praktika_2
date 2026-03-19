<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\AuthController;

Route::get('/test', function () {
    return response()->json([
        'message' => 'API работает'
    ]);
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{article}', [ProductController::class, 'show']);

Route::get('/cart/{user}', [CartController::class, 'index']);
Route::post('/cart/add', [CartController::class, 'add']);
Route::delete('/cart/{id}', [CartController::class, 'remove']);

Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{user}', [OrderController::class, 'userOrders']);
Route::put('/orders/{id}', [OrderController::class, 'updateStatus']);

Route::post('/reviews', [ReviewController::class, 'store']);
Route::get('/reviews/{article}', [ReviewController::class, 'productReviews']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);