<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Services\BannerService;
use App\Http\Services\ProductService;
use App\Http\Services\Service;
use App\Models\Banner;
use App\Models\BannerType;
use App\Models\Catalog;
use App\Models\Item;
use App\Models\PopularItem;
use App\Models\Product;
use App\Models\Store;
use App\Models\Subcatalog;
use App\Models\Video;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected $service;
    protected $bannerService;
    protected $productService;

    public function __construct(Service $service,BannerService $bannerService,ProductService $productService)
    {
        $this->service = $service;
        $this->bannerService = $bannerService;
        $this->productService = $productService;
    }

    public function home()
    {
        $banners = $this->bannerService->views(BannerType::HOME_SLIDER);
        $bannerTops = $this->bannerService->views(BannerType::HOME_TOP,2);
        $bannerBottom = $this->bannerService->views(BannerType::HOME_BOTTOM);
        $popupBanner = $this->bannerService->views(BannerType::POPUP);

        $recommends = $this->productService->recommends();
        $specials = $this->productService->specials();
        $recents = $this->productService->recents();
        $populars = $this->productService->populars();

        $videos = Video::where('is_active',true)
            ->latest()
            ->get();

        $views = $this->productService->views();
        $likeIds = $this->service->likeIds();

        return view('pages.home.index',compact('banners','bannerTops','bannerBottom', 'popupBanner', 'views','recommends','specials','recents','videos','populars','likeIds'));
    }
}
