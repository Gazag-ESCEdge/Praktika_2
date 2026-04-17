<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ArticleController;

// Пользователи
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->put('/user', [AuthController::class, 'update']);

// Товары
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/hit_limit', [ProductController::class, 'hit_limit']);
Route::get('/products/sale_limit', [ProductController::class, 'sale_limit']);
Route::get('/products/{article}', [ProductController::class, 'show']);

// Статьи
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles/{id}', [ArticleController::class, 'show']);

// Услуги
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services_cat', [ServiceController::class, 'get_categories']);

// ЗАЩИЩЁННЫЕ РОУТЫ
Route::middleware('auth:sanctum')->group(function () {

    // корзина
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::delete('/cart/{id}', [CartController::class, 'remove']);

    // заказы
    Route::post('/orders', [OrderController::class, 'store']);
    Route::get('/orders', [OrderController::class, 'userOrders']);

    // отзывы
    Route::post('/feedbacks', [FeedbackController::class, 'store']);
});

// публичные отзывы
Route::get('/feedbacks/{article}', [FeedbackController::class, 'productReviews']);