<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Http\Services\Service;
use App\Mail\AddComment;
use App\Mail\AddReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use App\Models\{ProductLike,
    ProductView,
    Review,
    ReviewStatus,
    Store,
    Product,
    Catalog,
    Subcatalog,
    Item,
    TypeDelivery,
    TypePay};
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProductController extends Controller
{
    protected $service;
    protected $productService;

    public function __construct(Service $service,ProductService $productService)
    {
        $this->service = $service;
        $this->productService = $productService;
    }

    public function product($id)
    {
        $product = Product::with('catalog', 'subcatalog', 'store')
            ->active()
            ->where('id', $id)
            ->firstOrFail();
        $others = Product::active()
            ->where('store_id',$product->store_id)
            ->inRandomOrder()
            ->take(10)
            ->with('store')
            ->get();
        $collections = Product::active()
            ->where('item_id',$product->item_id)
            ->inRandomOrder()
            ->take(10)
            ->with('store')
            ->get();

        $rating = Review::where('product_id',$product->id)->avg('rating');

        $views = $this->productService->views($product->id);

        $reviews = Review::where('product_id',$product->id)
            ->whereIn('status_id',[ReviewStatus::NEW,ReviewStatus::ACTIVE])
            ->latest()
            ->paginate(10);

        $deliveries = TypeDelivery::isActive()
            ->select('id','title')
            ->get();
        $pays = TypePay::isActive()
            ->select('id','title')
            ->get();
        $likeIds = $this->service->likeIds();

        return view('pages.products.show',compact('product','others','collections','views','reviews','rating','deliveries','pays','likeIds'));
    }

    public function selectedProducts()
    {
        $likeIds = $this->service->likeIds();
        $products = Product::whereIn('id',$likeIds)->get();

        return view('pages.selectedProducts.index',compact('products'));
    }

    public function productLike(Request $request)
    {
        $status = 1;
        if(Auth::check())
        {
            $like = ProductLike::where('user_id',Auth::id())->where('product_id',$request->product_id)->first();

            if(isset($like) and $like->count() > 0)
            {
                $like->delete();
                $status = 0;
            }
            else
            {
                $like = ProductLike::add($request->all());
                $like->user_id = Auth::id();
                $like->save();
            }
            $countLike = ProductLike::where('user_id',Auth::id())->count();
        }
        else
        {
            if(Cache::has('productLikes'))
            {
                if(in_array($request->product_id,Cache::get('productLikes')))
                {
                    $likeIds = Cache::get('productLikes');
                    $likeIds = array_diff($likeIds,[$request->product_id]);
                    Cache::pull('productLikes',$request->product_id);
                    $status = 0;
                }
                else
                {
                    $likeIds =  Cache::get('productLikes');
                    $likeIds[] = $request->product_id;
                }
            }
            else
            {
                $likeIds = Cache::get('productLikes');
                $likeIds[] = $request->product_id;
            }
            Cache::put('productLikes', $likeIds, 3600);
            $countLike = count(Cache::get('productLikes'));
        }
        return response()->json(['status'=>$status,'countLike'=>$countLike]);
    }

    public function productReview(Request $request)
    {
        $review = Review::add($request->all(),false);
        $review->user_id = Auth::check() ? Auth::id() : null;
        $review->save();

        $store = Store::find($request->store_id);

        if($store != null and $store->user->email != null)
        {
            Mail::to($store->user->email)->send(new AddReview($review));
        }

        return back()->with('success','Отзыв добавлен');
    }


    /////////////////////

    public function index()
    {
        $catalogs = Catalog::with('subcatalogs.items')->get();
        return $catalogs;
    }



    // public function show($id)
    // {
    //     $catalogs = $this->index();
    //     $products = Product::where('id', $id)->get();
    //     foreach($products as $product){
    //         json_encode($product);
    //     }
    //     $store = Store::where('id', $product->store_id)->get();
    //     $category = Catalog::where('id', $product->catalog_id)->first();
    //     $subcategory = Subcatalog::where('id', $product->subcatalog_id)->first();

    //     foreach($store as $curr_store)
    //     {
    //         \json_encode($curr_store);
    //     }
    //     $all_products = $store->products()->get();

    //     return view('desktop.cardtovars', compact('catalogs', 'products', 'store', 'all_products', 'category', 'subcategory'));
    // }


    /**Show Product method */
    public function newshow($id, $slug)
    {
        $agent = new Agent();
        $catalogs = $this->index();
        $product = Product::with('store','catalog', 'subcatalog', 'item')
            ->where('id', $id)
            ->whereHas('store', function($q){
                $q->with('seller');
                $q->where('status', 1);
            })->first();
        Product::find($id)->increment('hits', 1);
        $products = Product::where('store_id', $product->store->id)->where('status', 1);

        if(is_null($product->item))
        {
            $pohojie = Product::where('subcatalog_id', $product->subcatalog->id)->where('status', 1)->whereHas('store', function($q){
                $q->where('status', true);
            })->inRandomOrder()->take(10)->get();
            $all_products = $products->where('subcatalog_id', $product->subcatalog->id)->get();
        }else{
            $pohojie = Product::where('item_id', $product->item->id)->where('status', 1)->whereHas('store', function($q){
                $q->where('status', true);
            })->inRandomOrder()->take(10)->get();
            $all_products = $products->where('item_id', $product->item->id)->get();
        }

        if($agent->isDesktop()){
            return view('desktop.newcardtovars', compact('catalogs', 'product', 'all_products', 'pohojie'));
        }
        elseif($agent->isTablet()){
            return view('desktop.newcardtovars', compact('catalogs', 'product', 'all_products', 'pohojie'));
        }
        else{
            return view('mobile.newcardtovars', compact('catalogs', 'product', 'all_products', 'pohojie'));
        }

    }
    /**End Show */


    public function test()
    {
        $products =  Product::take(15)->get();
        return response()->json(compact('products'));
    }
    public function test2()
    {
        $products =  DB::table('products')->take(10)->get();
        dd($products);
    }

    public function store(Request $request)
    {
        $products = Product::create($request->all());

    }
    public function showToAdmin(Request $request)
    {
        $title = 'Товары';
        $products = Product::orderBy('created_at', 'desc')->paginate(25);
        $catalogs = Catalog::all();
        $stores = $this->getStores();
        $month = Carbon::now()->englishMonth;
        $year = Carbon::now()->year;
        return view('admin.products.create', compact('title', 'products', 'catalogs', 'month', 'year','stores'));

    }

    public function fetchSubcat(Request $request)
    {
        $catalog_id = $request->get('catalog_id');
        $subcatalogs = Subcatalog::where('catalog_id', $catalog_id)->where('visible', 1)->get();
        return response()->json(compact('subcatalogs'));
    }

    public function fetchItem(Request $request)
    {
        $subcatalog_id = $request->get('subcatalog_id');

        $items = Item::where('subcatalog_id', $subcatalog_id)->get();
        return response()->json(compact('items'));
    }
    private function getStores()
    {
        $stores = Store::all();
        return $stores;
    }
}
