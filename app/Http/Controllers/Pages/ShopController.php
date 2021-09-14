<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Http\Services\ProductService;
use App\Http\Services\Service;
use App\Models\Catalog;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Item;
use App\Models\ItemProduct;
use App\Models\News;
use App\Models\NewStatus;
use App\Models\Product;
use App\Models\ProductLike;
use App\Models\Review;
use App\Models\ReviewStatus;
use App\Models\Store;
use App\Models\Subcatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    protected $service;
    protected $productService;

    public function __construct(Service $service,ProductService $productService)
    {
        $this->service = $service;
        $this->productService = $productService;
    }

    public function index()
    {
        $lettersEn = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
        $storeTitle = Store::where('status',1)->select('letter')->get();
        $enLetters = [];
        foreach ($lettersEn as $enLetter)
        {
            $storeEnLetter = $storeTitle->where('letter',$enLetter);
            if($storeEnLetter->count() > 0)
            {
                $enLetters[] = $enLetter;
            }
        }
        $lettersRu = ['А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Э','Ю','Я'];
        $ruLetters = [];
        foreach ($lettersRu as $ruLetter)
        {
            if($storeTitle->where('letter',$ruLetter)->count() > 0)
            {
                $ruLetters[] = $ruLetter;
            }
        }
        $items = Item::where('slug','!=',null)->select('subcatalog_id','title','slug')->get();
        $subcatalogIds = $items->pluck('subcatalog_id')->unique();
        $subcatalogs = Subcatalog::where('slug','!=',null)->whereIn('id',$subcatalogIds)->select('id','catalog_id','title','slug')->get();
        $catalogIds = $subcatalogs->pluck('catalog_id')->unique();
        $catalogs = Catalog::whereIn('id',$catalogIds)->select('id','title','slug','images')->get();

        $shopsQuery = Store::isActive();
        if(isset($_GET['letter']))
        {
            $letter = $_GET['letter'];
            $shopsQuery = $shopsQuery->where('title', 'like', "$letter%");
        }
        if(isset($_GET['category']))
        {
            $catalog = Catalog::where('slug',$_GET['category'])->firstOrFail();
            $subcatalogIds = Subcatalog::where('catalog_id',$catalog->id)->pluck('id');
            $itemIds = Item::where('subcatalog_id',$subcatalogIds)->pluck('id');
            $productIds = Product::whereIn('item_id',$itemIds)->pluck('store_id')->unique();
            $storeIds = Product::whereIn('id',$productIds)->pluck('store_id');
            $shopsQuery = $shopsQuery->whereIn('id',$storeIds);
        }
        if(isset($_GET['q']))
        {
            $shopsQuery = $shopsQuery->where(function ($query){
                $query->where('title','LIKE','%'.$_GET['q'].'%')
                    ->orWhere('seo_title','LIKE','%'.$_GET['q'].'%')
                    ->orWhere('original_title','LIKE','%'.$_GET['q'].'%')
                    ->orWhere('description','LIKE','%'.$_GET['q'].'%')
                    ->orWhere('mini_description','LIKE','%'.$_GET['q'].'%')
                    ->orWhere('meta_description','LIKE','%'.$_GET['q'].'%')
                    ->orWhere('mini_desc','LIKE','%'.$_GET['q'].'%')
                    ->orWhere('search_tags','LIKE','%'.$_GET['q'].'%')
                    ->orWhere('search_map_tags','LIKE','%'.$_GET['q'].'%')
                    ->select('id','slug','title');
                });
        }
        if(isset($_GET['credit']) and $_GET['credit'] == 'yes')
        {
            $shopsQuery = $shopsQuery->where('is_credit',true);
        }
        if(isset($_GET['is_Armada']) and $_GET['is_Armada'] == 'yes')
        {
            $shopsQuery = $shopsQuery->where('is_Armada',true);
        }
        if(isset($_GET['title']) and $_GET['title'] == 'az')
        {
            $shopsQuery = $shopsQuery->orderBy('title','asc');
        }
        if(isset($_GET['title']) and $_GET['title'] == 'za')
        {
            $shopsQuery = $shopsQuery->orderBy('title','desc');
        }

        $shops = $shopsQuery->paginate(9);
        return view('pages.shops.index',compact('catalogs','shops','lettersEn','lettersRu','enLetters','ruLetters'));
    }

//    public function shopComments(CommentRequest $request)
//    {
//        $comment = Comment::add($request->all());
//        $comment->is_active = true;
//        $comment->status = Comment::NEW;
//        $comment->user_id = Auth::check() ? Auth::id() : null;
//        $comment->save();
//
//        $store = Store::find($request->store_id);
//        if($store != null and $store->user->email != null)
//        {
//            Mail::to($store->user->email)->send(new AddComment($comment));
//        }
//
//
//        return back()->with('success','Сообщение отправлено!');
//    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $shop = Store::where('slug',$slug)->firstOrFail();
        $productsQuery = Product::active()
            ->where('slug','!=',null)
            ->where('store_id',$shop->id);

//        $storesId = $productsQuery->where('store_id','!=',null)->pluck('store_id')->unique();
//        $stores = Store::whereIn('id',$storesId)->select('id','title')->get();
        $countriesId = Product::active()
            ->where('slug','!=',null)
            ->where('store_id',$shop->id)
            ->where('country_id', '!=', null)
            ->pluck('country_id')
            ->unique();
        $countries = Country::whereIn('id',$countriesId)->select('id','title_ru')->orderBy('title_ru')->get();

        $itemsId = Product::active()
            ->where('slug','!=',null)
            ->where('store_id',$shop->id)
            ->where('item_id', '!=', null)
            ->pluck('item_id')
            ->unique();
        $items = Item::whereIn('id',$itemsId)->select('id','title')->orderBy('title')->get();
        $minPrice = Product::active()
            ->where('slug','!=',null)
            ->where('store_id',$shop->id)->min('price');
        $maxPrice = Product::active()
            ->where('slug','!=',null)
            ->where('store_id',$shop->id)->max('price');

        $this->productService->filter($productsQuery);
        $this->productService->search($productsQuery);
        $this->productService->sort($productsQuery);
        $products = $productsQuery
            ->latest()
            ->paginate(16);

        $news = News::isActive()
            ->where('status_id',NewStatus::APPROVED)
            ->where('store_id',$shop->id)
            ->latest()
            ->take(4)
            ->get();

        $reviews = Review::where('store_id',$shop->id)
            ->whereIn('status_id',[ReviewStatus::NEW,ReviewStatus::ACTIVE])
            ->latest()
            ->get();

        $views = $this->productService->views();
        $likeIds = $this->service->likeIds();

        return view('pages.shops.show',compact('shop','products','countries','items','minPrice','maxPrice','news','views','reviews','likeIds'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
