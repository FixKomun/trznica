<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ForgotController;
use Illuminate\Support\Facades\Route;


//USER
Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::post('/edit-user', [UserController::class, 'editUser']);
});

//PRODUCT
Route::prefix('product')->group(function () {
    Route::post('/upload-product', [ProductController::class, 'uploadProduct']);
    Route::post('/upload-image', [ProductController::class, 'uploadImage']);
    Route::post('/delete-image', [ProductController::class, 'deleteImage']);
    Route::post('/edit-product', [ProductController::class, 'editProduct']);
});

//ORDER
Route::prefix('order')->group(function () {
    Route::post('/validate-user', [OrderController::class, 'validateUser']);
    Route::post('/validate-delivery', [OrderController::class, 'validateDelivery']);
    Route::post('/upload', [OrderController::class, 'uploadOrder']);
});

//PAYMENT
Route::prefix('payment')->group(function () {
    Route::post('store-card', [PaymentController::class, 'storeCard']);
});

//GET
Route::get('/get-category', [ProductController::class, 'getCategory']);
Route::get('/get-product', [ProductController::class, 'getProduct']);
Route::get('/get-product/{id}', [ProductController::class, 'getProductSingle']);
Route::get('/get-user-products/{id}', [ProductController::class, 'userProducts']);
Route::get('/get-user', [UserController::class, 'getUser']);
Route::get('/get-user/{id}', [UserController::class, 'getUserSingle']);

//FORGOT AND RESET PASSWORD
Route::post('/forgot', [ForgotController::class, 'forgot']);
Route::post('/reset', [ForgotController::class, 'reset']);

//MAIN
Route::get('/', [UserController::class, 'index']);
Route::any('{slug}', [UserController::class, 'index']);
