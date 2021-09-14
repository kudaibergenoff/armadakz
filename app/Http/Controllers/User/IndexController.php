<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\RegisterRequest;
use App\Http\Services\ProductService;
use App\Http\Services\Service;
use App\Http\Services\user\OrderService;
use App\Http\Services\user\UserService;
use App\Models\City;
use App\Models\Country;
use App\Models\Lang;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductLike;
use App\Models\ProductView;
use App\Models\Sex;
use App\Models\UserOrder;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class IndexController extends Controller
{
    protected $service;
    protected $orderService;
    protected $userService;
    protected $productService;

    public function __construct(Service $service,OrderService $orderService,UserService $userService,ProductService $productService)
    {
        $this->service = $service;
        $this->orderService = $orderService;
        $this->userService = $userService;
        $this->productService = $productService;
    }

    public function home()
    {
        $user = Auth::user();
        $langs = Lang::isActive(1)->get(['id','title_ru']);// !!!!!!!!!!!!!
        $sexes = Sex::all();
        $countries = Country::all();
        $cities = City::where('country_id',1)->get();

        $ordersId = UserOrder::where('user_id',Auth::id())->pluck('product_id');
        $orders = Product::active()
            ->whereIn('id',$ordersId)
            ->with('store')->get();

        return view('users.info.index',compact('user','langs','sexes','countries','cities','orders'));
    }

    public function personal(Request $request)
    {
        $data = Auth::user();
        $data->edit($request->only('lang_id','sname','name','mname','sex_id','dob'));
        $data->save();
        return back()->with('success','Информация изменена');
    }

    public function contact(Request $request)
    {
        $data = Auth::user();
        $data->phones = $this->userService->phones($request);

        if($request->has('email') and $request->email != Auth::user()->email)
        {
            $user = Auth::user();
            $user->email = $request->email;
            $user->save();
            // сделать отправку письма
        }
        $data->save();
        return back()->with('success','Информация изменена');
    }

    public function address(Request $request)
    {
        $data = User::find(Auth::id());
        $data->edit($request->only('city_id','address'));
        $data->save();
        return back()->with('success','Информация изменена');
    }

    public function orders()
    {
        $info = Auth::user();
        $ordersQuery = Order::where('token',csrf_token())->orWhere('user_id',Auth::id())->with('userInfo','product','store','orderStatus');

        $ordersQuery = $this->orderService->filters($ordersQuery);
        $ordersCount = $ordersQuery->count();
        $orders = $ordersQuery->orderByDesc('id')->get();//paginate(10);

        return view('users.orders.index',compact('info','ordersCount','orders'));
    }

    public function likes()
    {
        $info = Auth::user();
        $likeIds = ProductLike::where('user_id',Auth::id())->pluck('product_id');
        $likesQuery = Product::whereIn('id',$likeIds)->with('store');

        $likesQuery = $this->orderService->filters($likesQuery);
        $likesCount = $likesQuery->count();
        $likesSumPrice = $likesQuery->sum('price');

        $likes = $likesQuery->get();//paginate(6);

        $likeIds = $likeIds->toArray();

        return view('users.likes.index',compact('info','likesCount','likesSumPrice','likes','likeIds'));
    }

    public function likesDelete(Request $request,$id = null)
    {
        $productIds = $id != null ? explode(',',$id) : explode(',',$request->id);
        foreach ($productIds as $productId)
        {
            if($productId != null)
            {
                $like = ProductLike::where('user_id',Auth::id())->where('product_id',$productId)->first();
                if($like)
                {
                    $like->delete();
                }
            }
        }

        return back();
    }

    public function vieweds()
    {
        $info = Auth::user();
        if(Auth::check())
        {
            $views = $this->productService->views();
        }
//        else
//        {
//            if(Cache::has('productsViews'))
//            {
//                $productsId =  Cache::get('productsViews');
//                $views = Product::whereIn('id',$productsId)->paginate(6);
//            }
//            else
//            {
//                $views = null;
//            }
//        }
        $likeIds = ProductLike::where('user_id',Auth::id())->pluck('product_id');
        $likeIds = $likeIds->toArray();

        return view('users.vieweds.index',compact('info','views','likeIds'));
    }



    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home')->with('success','Ваш аккаунт успешно удалён');
    }
}
