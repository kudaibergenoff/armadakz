<?php

use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Seller\PayController;
use App\Http\Controllers\Seller\IndexControllerSeller;
//use App\Http\Controllers\Seller\NewsControllerSeller;
use App\Http\Controllers\Seller\ProductControllerSeller;
use App\Http\Controllers\Seller\ReviewControllerSeller;
use App\Http\Controllers\Seller\StoreControllerSeller;

//Route::get('/seller/login',[HomeController::class,'home'])
//    ->name('home');
Route::get('/seller/login','IndexController@sellerLogin')
    ->name('sellerLogin');
Route::get('/seller/register','IndexController@sellerRegister')
    ->name('sellerRegister');

Route::group(['middleware' => ['auth','isSeller'],'prefix' => 'seller', 'as' => 'seller.', 'namespace' => 'Seller',], function () {

    //export to xml
    Route::get('exportxmldata','ProductControllerSeller@exportxmldata')
        ->name('exportxmldata');
    //export to excel
    Route::get('exportexcel','ProductControllerSeller@exportExcel')
        ->name('exportexcel');
    //import from xml
    Route::get('importxmldata','ProductControllerSeller@importxmldata')
        ->name('importxmldata');
    Route::post('importxmldata','ProductControllerSeller@importxmldatapost')
        ->name('importxmldatapost');



    Route::get('/info','UserInfoControllerSeller@index')
        ->name('info');
    Route::post('/info','UserInfoControllerSeller@update')
        ->name('infoEdit');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/',[IndexControllerSeller::class,'home'])
            ->name('home');


        Route::resource('/products','ProductControllerSeller')
            ->parameters(['products' => 'id']);
        Route::post('/products-update/{id}',[ProductControllerSeller::class,'productUpdate'])
            ->name('productUpdate');

        Route::resource('/stores','StoreControllerSeller')
            ->parameters(['stores' => 'id']);
        Route::post('/stores-update/{id}',[StoreControllerSeller::class,'storeUpdate'])
            ->name('storeUpdate');
        Route::resource('/orders','OrderControllerSeller')
            ->parameters(['orders' => 'id']);
        Route::get('/analytics','AnalyticControllerSeller@index')->name('analytics');


        Route::post('select-subcatalogs',[ProductControllerSeller::class,'selectSubcatalogs'])->name('selectSubcatalogs');
        Route::post('select-items',[ProductControllerSeller::class,'selectItems'])->name('selectItems');
//        ->name('stores.index');
//    Route::get('/store/{id?}',[StoreControllerSeller::class,'edit'])
//        ->name('stores.StUp');
//    Route::get('/store/{id?}',[StoreControllerSeller::class,'edit'])
//        ->name('stores.edit');

        Route::resource('/news','NewsControllerSeller')
            ->parameters(['news' => 'id']);

        Route::resource('/reviews','ReviewControllerSeller')
            ->parameters(['reviews' => 'id']);
//        Route::get('/analytics',[IndexControllerSeller::class,'analytics'])->name('analytics');

        Route::resource('/callback','CallbackControllerSeller');

        Route::get('/pay', [PayController::class, 'pay'])->name('pay');
        Route::get('/paystore/{tarif}', [PayController::class, 'payStore'])->name('payStore');
    });

});
