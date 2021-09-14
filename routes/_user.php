<?php

use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\LoyaltyControllerUser;

Route::group(['middleware' => ['auth'],'prefix' => 'user', 'as' => 'user.','namespace'=>'User'], function () { // ,'verified'

    Route::get('/',[IndexController::class,'home'])->name('home');
    Route::post('/personal-data',[IndexController::class,'personal'])->name('personal');
    Route::post('/contact',[IndexController::class,'contact'])->name('contact');
    Route::post('/address',[IndexController::class,'address'])->name('address');
    Route::post('/destroy',[IndexController::class,'destroy'])->name('destroy');

//    Route::get('/analytics', 'IndexController@analytics')->name('analytics');
    Route::get('/orders',[IndexController::class,'orders'])->name('orders');
    Route::get('/likes',[IndexController::class,'likes'])->name('likes');
    Route::post('/likes-delete',[IndexController::class,'likesDelete'])->name('likesDelete');
    Route::get('/vieweds',[IndexController::class,'vieweds'])->name('vieweds');
    Route::get('/loyalty',[LoyaltyControllerUser::class,'index'])->name('loyalty.index');
});
