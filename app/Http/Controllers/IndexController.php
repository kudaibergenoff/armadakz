<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Http\Services\Service;
use App\Mail\NewCallback;
use App\Models\Banner;
use App\Models\Callback;
use App\Models\Country;
use App\Models\Item;
use App\Models\Product;
use App\Models\ProductLike;
use App\Models\Store;
use App\Models\Subscription;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    protected $service;
    protected $productService;

    public function __construct(Service $service, ProductService $productService)
    {
        $this->service = $service;
        $this->productService = $productService;
    }

    public function searchGet()
    {
        $query = isset($_GET['q']) ? trim($_GET['q']) : null;

        $productsQuery = Product::active()
            ->where('products.title','LIKE','%'.$query.'%')
            ->select('id','title','images','slug','price','price_2','country_id','store_id','item_id');

        $storeIds = Product::active()
            ->where('products.title','LIKE','%'.$query.'%')
            ->pluck('store_id')->unique();
        $stores = Store::whereIn('id',$storeIds)->select('id','title')->get();
        $itemIds = Product::active()
            ->where('products.title','LIKE','%'.$query.'%')
            ->pluck('item_id')->unique();
        $items = Item::whereIn('id',$itemIds)->select('id','slug','title')->get();
        $countryIds = Product::active()
            ->where('products.title','LIKE','%'.$query.'%')
            ->pluck('country_id')->unique();
        $countries = Country::whereIn('id',$countryIds)->select('id','title_ru')->get();

        $minPrice = Product::active()
            ->where('products.title','LIKE','%'.$query.'%')
            ->min('price');
        $maxPrice = Product::active()
            ->where('products.title','LIKE','%'.$query.'%')
            ->max('price');
        $this->productService->filter($productsQuery);
        $this->productService->search($productsQuery);
        $this->productService->sort($productsQuery);
        $products = $productsQuery->with('store')->paginate(16);

        return view('pages.search.index',compact('products','stores','items','countries','minPrice','maxPrice'));
    }

    public function banner()
    {
        if(!isset($_GET['link']))
        {
            return back();
        }
        $banner = Banner::where('link',$_GET['link'])->first();
        $banner->clicks = $banner->getOriginal('clicks') + 1;
        $banner->save();

        return redirect()->to($banner->link);
    }

    public function callback(Request $request)
    {
        $callback = Callback::add($request->only('name','phone','product_id'));
        $callback->user_id = Auth::check() ? Auth::id() : null;
        $callback->save();

        if($callback->product_id != null)
        {
            $product = Product::find($callback->product_id);
            $store = $product != null
                ? $product->store
                : null;
            $user = $store != null
                ? $store->user
                : null;
            if($user != null and $user->email != null)
            {
                Mail::to($user->email)->send(new NewCallback($user));
            }
        }
        return back()->with('success','Спасибо! Мы перезвоним вам в ближайшее время.');
    }

    public function search(Request $request)
    {
        $query = !empty(trim($request->querys)) ? trim($request->querys) : null;
        $page = isset($request->page) ? $request->page : 1;

        $productsQuery = Product::active()
            ->where('products.title','LIKE','%'.$query.'%')
            ->select('id','title','images','slug','price','price_2','store_id','item_id');

        $storeIds = $productsQuery->pluck('store_id')->unique();
        $store = Store::whereIn('id',$storeIds)->select('id','title')->get();
        $itemIds = $productsQuery->pluck('item_id')->unique();
        $items = Item::whereIn('id',$itemIds)->select('id','slug','title')->get();

        $pageCount = ceil($productsQuery->count()/10);

        $products = $productsQuery
            ->latest()
            ->forPage($page, 10)
            ->get();

        $data = [$products,$store,$items,$pageCount];

        return response($data);
    }

    public function searchStore(Request $request)
    {
        $query = !empty(trim($request->querys)) ? trim($request->querys) : null;

        $storePage = isset($request->page) ? $request->page : 1;

        $storeSearch = Store::where('title','LIKE','%'.$query.'%')
                ->orWhere('title','LIKE','%'.$query.'%')
                ->orWhere('seo_title','LIKE','%'.$query.'%')
                ->orWhere('original_title','LIKE','%'.$query.'%')
                ->orWhere('description','LIKE','%'.$query.'%')
                ->orWhere('mini_description','LIKE','%'.$query.'%')
                ->orWhere('meta_description','LIKE','%'.$query.'%')
                ->orWhere('mini_desc','LIKE','%'.$query.'%')
                ->orWhere('search_tags','LIKE','%'.$query.'%')
                ->orWhere('search_map_tags','LIKE','%'.$query.'%')
                ->select('id','slug','title');

        $pageCount = $storeSearch != null
            ? ceil($storeSearch->count()/10)
            : null;

        $store = (Auth::check() and Auth::user()->role_id == UserRole::ADMIN)
            ? $storeSearch->forPage($storePage, 10)
                ->get()
            : null;

        $data = [$pageCount,$store];

        return response($data);
    }

    public function sellerLogin()
    {
        return view('auth.seller_login');
    }

    public function sellerRegister()
    {
        return view('auth.seller_register');
    }

    public function pay()
    {
        return view('pay');
    }

    public function payOk(Request $request)
    {
        $file = 'filex.txt';
//        $data = file_get_contents($file);
        $data = $_POST ;//. $_POST . '//////////////////'
        $filex = file_put_contents($file, $data );
//        file_put_contents('file.txt', $data );
        if($filex)
        {
            dd($filex);
        }
        else
        {
            dd(124);
        }
    }

    public function payError(Request $request)
    {
        dd(124);
    }

    public function subscription(Request $request)
    {
        Subscription::firstOrCreate(['email'=>$request->email]);

        return back()->with('success','Вы оформили подписку');
    }
}
