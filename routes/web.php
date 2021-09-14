<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Pages\FaqController;
use App\Http\Controllers\Pages\AboutController;
use App\Http\Controllers\Pages\AdvertiserController;
use App\Http\Controllers\Pages\CatalogController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\DeliveryController;
use App\Http\Controllers\Pages\FurnitureCareController;
use App\Http\Controllers\Pages\HowToBuyController;
use App\Http\Controllers\Pages\ForSellerController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\IdeaCareController;
use App\Http\Controllers\Pages\NewsController;
use App\Http\Controllers\Pages\PaymentController;
use App\Http\Controllers\Pages\ProjectController;
use App\Http\Controllers\Pages\SchemeController;
use App\Http\Controllers\Pages\ServiceController;
use App\Http\Controllers\Pages\ShopController;
use App\Http\Controllers\Pages\ProductController;
use App\Http\Controllers\Pages\TenantController;
use App\Http\Controllers\Pages\TourController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// ,'middleware' => 'throttle:10|60,1'
Route::group(['prefix' => App\Http\Middleware\Locale::getLocale()],// максимум 10 запросов в минуту для гостей и 60 для пользователей
    function () {

        Auth::routes();

        require('_auth.php');
        require('_user.php');
        require('_seller.php');
        require('_admin.php');
//        require('_general.php');

//        Route::post('/payment',[NewsCommentController::class,'store'])
//            ->name('newsComments.store'); // ?????

        Route::view('/clear','clear');
        Route::get('/pay',[IndexController::class,'pay'])
            ->name('pay');
        Route::post('/pay-ok',[IndexController::class,'payOk'])
            ->name('payOk');
        Route::post('/pay-error',[IndexController::class,'payError'])
            ->name('payError');

        Route::post('/subscription',[IndexController::class,'subscription'])
            ->name('subscription');

        Route::get('/catalogs/{slug}',[CatalogController::class,'index'])
            ->name('catalogs');
        Route::get('/catalog/{slug}',[CatalogController::class,'show'])
            ->name('catalog');
        Route::get('/subcatalog/{slug}',[CatalogController::class,'subcatalogShow'])
            ->name('subcatalog');
        Route::get('/item/{slug}',[CatalogController::class,'itemShow'])
            ->name('item');

        Route::get('/product/{id}-{slug}',[ProductController::class,'product'])
            ->name('product');
        Route::post('/product-like',[ProductController::class,'productLike'])
            ->name('productLike');
        Route::post('/product-review',[ProductController::class,'productReview'])
            ->name('productReview');

        Route::get('/',[HomeController::class,'home'])
            ->name('home');
        Route::get('/banner',[IndexController::class,'banner'])
            ->name('banner');
        Route::post('/callback',[IndexController::class,'callback'])
            ->name('callback');
        Route::get('/search',[IndexController::class,'searchGet'])
            ->name('searchGet');
        Route::post('/search',[IndexController::class,'search'])
            ->name('search');
        Route::post('/search-store',[IndexController::class,'searchStore'])
            ->name('searchStore');
        // Статические страницы
        Route::get('/payment',[PaymentController::class,'index']) //
            ->name('payment');
        Route::get('/tenants',[TenantController::class,'index']) //
            ->name('tenants');
        Route::get('/about',[AboutController::class,'index']) //
            ->name('about');
        Route::get('/faqs',[FaqController::class,'index']) //
            ->name('faqs');

        Route::get('/delivery',[DeliveryController::class,'index'])
            ->name('delivery');

        Route::get('/projects',[ProjectController::class,'index']) //+-
            ->name('projects');
        Route::get('/promoters',[AdvertiserController::class,'index'])
            ->name('advertisers');
        Route::post('/application-post',[ApplicationController::class,'store'])
            ->name('applicationPost');

        Route::get('/contacts',[ContactController::class,'index'])
            ->name('contacts');
        Route::post('/contacts-post',[ContactController::class,'store'])
            ->name('contactsPost');

        Route::get('/furniture-care',[FurnitureCareController::class,'index'])
            ->name('furnitureCare');
        Route::get('/how-to-buy',[HowToBuyController::class,'index'])
            ->name('howToBuy');
        Route::get('/for-seller',[ForSellerController::class,'index'])
            ->name('forSeller');
        Route::get('/ideas',[IdeaCareController::class,'index'])
            ->name('ideas');
        Route::get('/scheme',[SchemeController::class,'index'])
            ->name('scheme');
        Route::get('/scheme-search',[SchemeController::class,'search'])
            ->name('scheme-search');
        Route::get('/services',[ServiceController::class,'index'])
            ->name('services');

        Route::get('/tour',[TourController::class,'index'])
            ->name('tour');

        Route::group(['namespace' => 'Pages'], function () {
            Route::get('/sitemap', 'SitemapController@index')
                ->name('sitemap');
        });

        Route::get('/news',[NewsController::class,'index'])
            ->name('news.index');
        Route::get('/news/{slug}',[NewsController::class,'show'])
            ->name('news.show');
        Route::post('/news-comments',[NewsController::class,'newsComments'])
            ->name('newsComments.store');

        Route::get('/prodavcy',[ShopController::class,'index'])
            ->name('shops');
        Route::get('/prodavcy/{slug}',[ShopController::class,'show'])
            ->name('shop');
        Route::post('/prodavcy-comments',[ShopController::class,'shopComments'])
            ->name('shopComments');


        // Route::get('/test-a-test', function() {
        //     $data = \App\Models\Store::select('id','title')->chunk(50, function($stores){
        //         foreach($stores as $n => $store)
        //         {
        //             \App\Models\Store::where('id', $store->id)->update(['tarif_end_date' => now()->addDays(60)->format('Y-m-d')]);
        //             echo $store->title." - ".now()->addDays(60)->format('Y-m-d')." - success";
        //             echo "<br />";
        //         }
        //     });
        // });

        // mb_substr($store->title, 0, 1)

        Route::get('/pay/success', function() {
            //file_put_contents('file.txt', $request->all());
            return request()->all();
        });

        // Route::post('/pay/success', function(Request $request) {
        //     //file_put_contents('file.txt', $request->all());
        //     return $request->all();
        // });
    });

//Переключение языков
//require('_setlocale.php');
