<?php

use App\Http\Controllers\Vendor\IndexControllerVendor;
use App\Http\Controllers\Vendor\ProductControllerVendor;
use App\Http\Controllers\Vendor\ReviewControllerVendor;
use App\Http\Controllers\Vendor\StoreControllerVendor;

Route::group(['middleware' => ['auth','isVendor'],'prefix' => 'seller', 'as' => 'vendor.', 'namespace' => 'Vendor',], function () { // ,'verified'

    Route::get('/',[IndexControllerVendor::class,'home'])
        ->name('home');

    Route::resource('/products','ProductControllerVendor')
        ->parameters(['products' => 'id']);

    Route::resource('/stores','StoreControllerVendor')
        ->parameters(['stores' => 'id']);
    Route::resource('/orders','OrderControllerVendor')
        ->parameters(['orders' => 'id']);
    Route::get('/analytics','AnalyticControllerVendor@index')->name('analytics');


    Route::post('select-subcatalogs',[ProductControllerVendor::class,'selectSubcatalogs'])->name('selectSubcatalogs');
    Route::post('select-items',[ProductControllerVendor::class,'selectItems'])->name('selectItems');
//        ->name('stores.index');
//    Route::get('/store/{id?}',[StoreControllerVendor::class,'edit'])
//        ->name('stores.StUp');
//    Route::get('/store/{id?}',[StoreControllerVendor::class,'edit'])
//        ->name('stores.edit');

    Route::get('/reviews',[ReviewControllerVendor::class,'index'])
        ->name('reviews.index');
//    Route::get('/analytics', 'IndexController@analytics')->name('analytics');
});
