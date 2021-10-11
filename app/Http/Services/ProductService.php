<?php

namespace App\Http\Services;

use App\Models\Catalog;
use App\Models\Color;
use App\Models\Country;
use App\Models\Discount;
use App\Models\Item;
use App\Models\PopularItem;
use App\Models\Presence;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\Store;
use App\Models\Subcatalog;
use App\Models\Tarif;
use App\Models\TypeDelivery;
use App\Models\TypePay;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class ProductService
{
    public function ifNotStore($stores)
    {
        if(Auth::user()->role_id != UserRole::ADMIN and ($stores == null or $stores->count() == 0))
        {
            return redirect()->route('seller.stores.index')->with('error','У Вас ещё не создано ни одно магазина')->send();
        }
    }

    public function ifNotTarif($store_id)
    {

//        $store = Store::find($store_id);
//        $productCount = Product::where('store_id',$store->id)->count();
//        $tarif = Tarif::find($store->tarif_id);
//        $tarifCount = $tarif ? $tarif->limit_store_products : null;
//        if($tarifCount == null)
//        {
//            return redirect()
//                ->route('seller.products.index')
//                ->with('error','У Вашего магазина не установлен тарифный план. Пожалуйста, обратитесь к администратору')
//                ->send();
//            exit('123456');
//        }
//        if($productCount >= $tarifCount)
//        {
//            return redirect()
//                ->route('seller.products.index')
//                ->with('error','Ваш тариф не позволяет создавать больше товаров')
//                ->send();
//            exit('123456');
//        }
        $store = Store::find($store_id);
        $productCount = Product::where('store_id',$store->id)->count();
        $tarif = Tarif::find($store->tarif_id);
        $tarifCount = $tarif ? $tarif->limit_store_products : null;


        $message = $tarifCount == null
            ? 'У Вашего магазина не установлен тарифный план. Пожалуйста, обратитесь к администратору'
            : ($productCount >= $tarifCount ? 'Ваш тариф не позволяет создавать больше товаров' : null);
        return $message;
    }

    public function filter($productsQuery)
    {

        if(isset($_GET['store']))
        {
            if(is_array($_GET['store']))
            {
                $store_ids = $_GET['store'];
            }
            else
            {
                $store_ids[] = $_GET['store'];
            }
            $productsQuery = $productsQuery->whereIn('store_id',$store_ids);
        }
        if(isset($_GET['country']) and $_GET['country'] != 'all')
        {

            $productsQuery = is_array($_GET['country'])
                ? $productsQuery->whereIn('country_id',$_GET['country'])
                : $productsQuery->where('country_id',$_GET['country']);
        }
        if(isset($_GET['item']) and $_GET['item'] != 'all')
        {
            if(is_array($_GET['item']))
            {
                $item_ids = $_GET['item'];
            }
            else
            {
                $item_ids[] = $_GET['item'];
            }
            $productsQuery = $productsQuery->whereIn('item_id',$item_ids);
        }
        if(isset($_GET['price_min']) and is_numeric($_GET['price_min']))
        {
            $productsQuery = $productsQuery->where('price','>=',$_GET['price_min']);

        }
        if(isset($_GET['price_max']) and is_numeric($_GET['price_max']))
        {
            $productsQuery = $productsQuery->where('price','<=',$_GET['price_max']);
        }

        if(isset($_GET['color']))
        {
            // if(is_array($_GET['color']))
            // {
            //     $colors = $_GET['color'];
            // }
            // else
            // {
            //     $colors[] = $_GET['color'];
            // }
            // $productsQuery = $productsQuery->when($colors, function($q) use($colors) {
            //     $q->whereJsonContains('colors',$colors);
            // });
            $productsQuery = is_array($_GET['color'])
                ? $productsQuery->whereJsonContains('colors',$_GET['color'])
                : $productsQuery->where('colors',$_GET['color']);
        }

        if(isset($_GET['material']))
        {
            $productsQuery = is_array($_GET['material'])
                ? $productsQuery->whereIn('material',$_GET['material'])
                : $productsQuery->where('material',$_GET['material']);
        }

        return $productsQuery;
    }

    public function search($productsQuery)
    {
        if(isset($_GET['q']) and $_GET['q'] != null)
        {
            $productsQuery = $productsQuery->where('title','LIKE','%'.$_GET['q'].'%');
        }

        return $productsQuery;
    }

//    public function isGet($productsQuery)
//    {
//        if(isset($_GET['store']))
//        {
//            $storeId = Store::where('slug',$_GET['store'])
//                ->first();
//            $productsQuery = $storeId != null ? $productsQuery->where('store_id',$storeId) : $productsQuery;
//        }
//        if(isset($_GET['country']) and is_numeric($_GET['country']))
//        {
//            $productsQuery = $productsQuery->where('country_id',$_GET['country']);
//        }
//        if(isset($_GET['price_min']) and is_numeric($_GET['price_min']))
//        {
//            $productsQuery = $productsQuery->where('price','>=',$_GET['price_min']);
//        }
//        if(isset($_GET['price_min']) and is_numeric($_GET['price_min']))
//        {
//            $productsQuery = $productsQuery->where('price','<=',$_GET['price_max']);
//        }
//        return $productsQuery;
//    }

    public function sort($productsQuery)
    {
        if(isset($_GET['price']))
        {
            if($_GET['price'] == 'up')
            {
                $productsQuery = $productsQuery->orderBy('price','asc');
            }
            if($_GET['price'] == 'down')
            {
                $productsQuery = $productsQuery->orderBy('price','desc');
            }
        }

        return $productsQuery;
    }

    public function views($productId = null)
    {
        if(Auth::check())
        {
            $viewsQuery = ProductView::where('user_id',Auth::id())
                ->with('product.store');

            if($productId != null)
            {
                $view = ProductView::firstOrNew(['user_id'=>Auth::id(),'product_id'=>$productId]);
                $view->created_at = now();
                $view->save();
                $viewsQuery = $viewsQuery->where('product_id','!=',$view->product_id);
            }


            $viewsQuery = $viewsQuery->whereHas('product', function($q){
                $q->active();
            })->latest();

            $views = Route::is('user.*')
                ? $viewsQuery->paginate(12)
                : $viewsQuery->take(12)->get();
        }
        else
        {
            $views = collect();
//            if(Cache::has('productsViews'))
//            {
//                $productsId =  Cache::get('productsViews');
//            }
//
//            $productsId[] = $productId;
//
//            Cache::put('productsViews', $productsId, 3600);
//
//            if(count($productsId) > 1)
//            {
//                $productsId = array_diff($productsId, array('', NULL, false));
//                $views = Product::whereIn('id',$productsId)
//                    ->where('id','!=',$productId)
//                    ->latest()
//                    ->with('store')
//                    ->get();
//            }
//            else
//            {
//                $views = null;
//            }
        }

        return $views;
    }

    // GET_FOR
    public function getForIndex_products()
    {
        $productsQuery = Product::where('store_id','!=',null)
            ->orderBy('created_at', 'desc')
            ->with('item','item.subcatalog','item.subcatalog.catalog','store')
            ->withCount('additional');

        $products = (isset($_GET['store']) or isset($_GET['item']))
            ? $this->filter($productsQuery)
                ->get()
            : $productsQuery
                ->where('created_at', null)
                ->get(); // выдать пустую коллекцию
        return $products;
    }

    public function getForIndex_allStores()
    {
        $storeIds = Product::orderBy('store_id')
            ->pluck('store_id')
            ->unique();
        $stores = Store::whereIn('id',$storeIds)
            ->select('id','title')
            ->orderBy('title')
            ->withCount('products')
            ->get();
        return $stores;
    }

//    public function getForIndex_allCatalogs()
//    {
//        $catalogs = Catalog::select('id','title')
//            ->orderBy('title')
//            ->get();
//        return $catalogs;
//    }
//
//    public function getForIndex_allSubcatalogs()
//    {
//        $subcatalogs = Subcatalog::select('id','catalog_id','title')
//            ->orderBy('title')
//            ->get();
//        return $subcatalogs;
//    }

    public function getForIndex_allItems()
    {
        $items = Item::select('id','subcatalog_id','title')
            ->orderBy('title')
            ->with('subcatalog:id,catalog_id,title','subcatalog.catalog:id,title',)
            ->get();
        return $items;
    }

    public function getForIndex_allCountries()
    {
        $countriesId = Product::where('country_id', '!=', null)
            ->pluck('country_id')
            ->unique();
        $countries = Country::whereIn('id',$countriesId)
            ->select('id','title_ru')
            ->orderBy('title_ru')
            ->get();
        return $countries;
    }

    public function getForCredit_stores()
    {
        $storesQuery = Store::orderBy('title')
            ->select('id','title');
        $storesQuery = (Auth::user()->role_id == UserRole::ADMIN and Route::is('admin.*'))
            ? $storesQuery
            : $storesQuery->where('user_id',Auth::id());
        $stores = $storesQuery->get();
        return $stores;
    }

    public function getForCredit_items()
    {
        $items = Item::select('id','title','subcatalog_id')
            ->orderBy('title')->where('isActive', 1)
            ->get();
        return $items;
    }

    public function getForCredit_subcatalogs($items)
    {
        $subcatalogs = Subcatalog::whereIn('id',$items->pluck('subcatalog_id')->unique())
            ->orderBy('title')
            ->select('id','catalog_id','title')
            ->with('catalog:title')
            ->where('isActive', 1)
            ->get();
        return $subcatalogs;
    }

    public function getForCredit_catalogs($subcatalogs)
    {
        $catalogs = Catalog::whereIn('id',$subcatalogs->pluck('catalog_id')->unique())
            ->where('isActive',1)
            ->orderBy('title')
            ->select('id','title', 'onlyAdmins')
            ->get();
        return $catalogs;
    }

    public function getForCredit_countries()
    {
        $countries = Country::where('isActive',1)
            ->orderBy('title_ru')
            ->select('id','title_ru')
            ->get();
        return $countries;
    }

    public function getForCredit_colors()
    {
        $colors = Color::all();
        return $colors;
    }

    public function getForCredit_presences()
    {
        $presences = Presence::where('is_active',true)
            ->get();
        return $presences;
    }

    public function getForCredit_discounts()
    {
        $discounts = Discount::get();
        return $discounts;
    }

    public function getForCredit_deliveries()
    {
        $deliveries = TypeDelivery::isActive()
            ->select('id','title')
            ->get();
        return $deliveries;
    }

    public function getForCredit_pays()
    {
        $pays = TypePay::isActive()
            ->select('id','title')
            ->get();
        return $pays;
    }

    public function recommends()
    {
        $hotStoreIds = Store::where('status',true)
            ->where('hot',true)
            ->where('hot_end_date','>',now())
            ->pluck('id');
        $recommends = Product::active()
            ->where(function ($q) use ($hotStoreIds) {
                $q->whereIn('store_id', $hotStoreIds)
                    ->orwhere('is_hot', true);
            })
            ->inRandomOrder()
            ->select('id','store_id','item_id','slug','title','price','price_2','articul','images')
            ->take(10)
            ->with('store:id,title,slug')
            ->get();
        return $recommends;
    }

    public function specials()
    {
        $specials = Product::active()
            ->inRandomOrder()
            ->where('discount','!=',null)
            ->where('is_discount','!=',0)
            ->select('id','store_id','item_id','slug','title','price','price_2','articul','images', 'discount')
            ->take(10)
            ->with('store:id,title,slug')
            ->get();
        return $specials;
    }

    public function recents()
    {
        $recents = Product::active()
            ->select('id','store_id','item_id','slug','title','price','price_2','articul','images')
            ->latest()
            ->take(10)
            ->with('store:id,title,slug')
            ->get();
        return $recents;
    }

    public function populars()
    {
        $populars = PopularItem::where('model','!=',null)
            ->where('title','!=',null)
            ->where('slug','!=',null)
            ->where('images','!=',null)
            ->select('model','title','slug','images')
            ->inRandomOrder()
            ->take(18)
            ->get();
        return $populars;
    }
}
