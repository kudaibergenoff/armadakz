<?php

namespace App\Providers;

use App\Http\Services\BannerService;
use App\Models\BannerType;
use App\Models\Item;
use App\Models\ProductLike;
use App\Models\Subcatalog;
use App\Models\Catalog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        Schema::defaultStringLength(191);

        $menuItems = Item::where('isActive',true)
            ->where('slug','!=',null)
            //->whereHas('products')
            ->select('is_menu','subcatalog_id','title','menu_title','slug')
            ->orderBy('index')
            ->get();
        $menuSubcatalogIds = $menuItems->pluck('subcatalog_id')->unique();
        $menuSubcatalogs = Subcatalog::where('isActive',true)
            ->where('slug','!=',null)
            //->whereIn('id',$menuSubcatalogIds)
            ->select('id','catalog_id','title','slug')
            ->orderBy('index')
            ->get();
        $menuCatalogIds = $menuSubcatalogs->pluck('catalog_id')->unique();
        $menuCatalogs = Catalog::where('isActive',true)
            //->whereIn('id',$menuCatalogIds)
            ->select('id','is_menu','title','menu_title','slug','svg')
            ->orderBy('index')
            ->get();

        $wideTopBanners = BannerService::views(BannerType::WIDE_TOP, 1);

        View::share(['menuCatalogs'=>$menuCatalogs,'menuSubcatalogs'=>$menuSubcatalogs,'menuItems'=>$menuItems, 'wideTopBanners' => $wideTopBanners]);
    }
}
