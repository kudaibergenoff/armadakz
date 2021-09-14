<?php

use App\Http\Controllers\Admin\AnalyticControllerAdmin;
use App\Http\Controllers\Admin\HomeControllerAdmin;
use App\Http\Controllers\Admin\NewsControllerAdmin;
use App\Http\Controllers\Admin\StoreControllerAdmin;
use App\Http\Controllers\Admin\SubscriptionControllerAdmin;
use App\Http\Controllers\Admin\VideoControllerAdmin;
use App\Http\Controllers\Admin\PermissionControllerAdmin;

Route::group(['middleware' => ['auth','isAdmin'], 'prefix' => 'adminex', 'as' => 'admin.','namespace'=>'Admin'], function () {

    //export to xml
    Route::get('exportxmldata','ProductControllerAdmin@exportxmldata')
        ->name('exportxmldata');
    //import from xml
    Route::get('importxmldata','ProductControllerAdmin@importxmldata')
        ->name('importxmldata');
    Route::post('importxmldata','ProductControllerAdmin@importxmldatapost')
        ->name('importxmldatapost');


    Route::get('/',[HomeControllerAdmin::class,'home'])
        ->name('home');

    Route::resource('/profile','ProfileControllerAdmin')
        ->parameters(['profile' => 'id']);

    Route::resource('/products','ProductControllerAdmin');
    Route::resource('/product/{product_id}/additional','ProductAdditionalControllerAdmin')
        ->names('additional');

    Route::resource('/stores','StoreControllerAdmin');
    Route::post('/stores-update/{id}',[StoreControllerAdmin::class,'storeUpdate'])
        ->name('storeUpdate');
    Route::get('/stores-check-slug',[StoreControllerAdmin::class,'checkSlug'])
        ->name('checkSlug');

    Route::resource('/users','UserControllerAdmin');
    Route::resource('/sellers','SellerControllerAdmin');
    Route::resource('/orders','OrderControllerAdmin');

    Route::resource('/catalogs','CatalogControllerAdmin');
    Route::resource('/subcatalogs','SubcatalogControllerAdmin');
    Route::resource('/items','ItemControllerAdmin');

    Route::resource('/maps','MapControllerAdmin');

    Route::resource('/admins','AdminControllerAdmin');
    Route::resource('/banners','BannerControllerAdmin');
    Route::resource('/blogs','BlogControllerAdmin'); // ????????????
    Route::resource('/colors','ColorControllerAdmin');
    Route::resource('/countries','CountryControllerAdmin');
    Route::resource('/cities','CityControllerAdmin');


    Route::resource('/reviews','ReviewControllerAdmin');
    Route::resource('/news-reviews','NewsReviewControllerAdmin');
    Route::resource('/applications','ApplicationControllerAdmin');

    Route::resource('/subscriptions','SubscriptionControllerAdmin');
    Route::post('/send-mail',[SubscriptionControllerAdmin::class,'sendMail'])
        ->name('subscriptions.sendMail');

    Route::resource('/pages','PagesControllerAdmin');
    Route::resource('/projects','ProjectControllerAdmin');
    Route::resource('/news','NewsControllerAdmin');
    Route::post('/news-update/{id}',[NewsControllerAdmin::class,'newsUpdate'])
        ->name('newsUpdate');

    Route::resource('/videos','VideoControllerAdmin');
    Route::post('/videos-update/{id}',[VideoControllerAdmin::class,'videosUpdate'])
        ->name('videosUpdate');

    Route::resource('/tarifs','TarifControllerAdmin');
    Route::resource('/roles','RoleControllerAdmin');

    Route::resource('/permissions','PermissionControllerAdmin');

    Route::resource('/faqs','FaqControllerAdmin');

    Route::resource('/publications','PublicationControllerAdmin');

    Route::resource('/callback','CallbackControllerAdmin');
    Route::resource('/messages','MessageControllerAdmin');


    Route::get('/analytics',[AnalyticControllerAdmin::class,'index'])->name('analytics');
});
