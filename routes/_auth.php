<?php

use App\Http\Controllers\Pages\OrderController;
use App\Http\Controllers\Pages\ProductController;

Route::get('/selected-products',[ProductController::class,'selectedProducts'])
    ->middleware('auth')
    ->name('selectedProducts');

Route::get('/orders',[OrderController::class,'index'])
    ->middleware('auth')
    ->name('orders');
Route::post('/order-post',[OrderController::class,'orderPost'])
    ->middleware('auth')
    ->name('orderPost');
//        Route::post('/order-poster',[OrderController::class,'orderPoster'])
//            ->name('orderPoster');
Route::post('/order-confirm',[OrderController::class,'orderСonfirm'])
    ->middleware('auth')
    ->name('orderСonfirm');
