<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Mail\NewOrder;
use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductLike;
use App\Models\Store;
use App\Models\TypeDelivery;
use App\Models\TypeDopservice;
use App\Models\TypePay;
use App\Models\User;
use App\Models\UserLoyalty;
use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
//        dd(Cache::has('ARMADA_PRODUCT_*'));
//        $ordersId = UserOrder::where('user_id',Auth::id())
//            ->pluck('product_id');
//        $products = Product::where('status',1)
//            ->where('price','!=',0)
//            ->whereIn('id',$ordersId)
//            ->with('store')->get();

        $likeIds = ProductLike::where('user_id',Auth::id())
            ->pluck('product_id');
        $likeIds = $likeIds->toArray();

        $countries = Country::isActive()
            ->select('id','title_ru')
            ->orderBy('title_ru')
            ->get();
        $cities = City::isActive()
            ->select('id','title_ru')
            ->orderBy('title_ru')
            ->get();

        
        $dopServices = TypeDopservice::isActive()->get();
        $ordersQuery = Order::where('token',csrf_token());
        $ordersQuery = Auth::check() ? $ordersQuery->orWhere('user_id',Auth::id()) : $ordersQuery;
        $orders = $ordersQuery->where('status_id',OrderStatus::BASKET)
            ->with('product:id,title,slug,delivery_ids,pay_ids')->get();
    
        $typeDeliverys = TypeDelivery::isActive()->whereIn('id', $orders->pluck('product.delivery_ids')[0])->get();        
        $typePays = TypePay::isActive()->whereIn('id', $orders->pluck('product.pay_ids')[0])->get();

        

        $stores = Store::whereIn('id',$orders->pluck('store_id'))->select('id','slug','title','pay_id','delivery_id','dopservice_id')->get();

        $loyalties = [];
        if(Auth::check())
        {
            $storeIds = UserLoyalty::where('user_id',Auth::id())->whereIn('store_id',$stores->pluck('id'))->pluck('store_id');

            if($storeIds != null and $storeIds->count() > 0)
            {
                foreach ($storeIds as $storeId)
                {
                    $sum = UserLoyalty::where('user_id',Auth::id())->where('store_id',$storeId)->sum('amt');
                    $loyalties[$storeId] = round($sum,2);
                }
            }
        }
        return view('pages.orders.index',compact('likeIds','countries','cities','typeDeliverys','typePays','dopServices','orders','stores','loyalties'));
    }

//    public function orderPost(Request $request)
//    {
//        $data = '$request->products';
//        return response(123);
//    }

    public function create()
    {
        //
    }

    public function orderСonfirm(Request $request)
    {
        if($request->has('vip') and $request->vip == "on" and Auth::user()->vip == 0)
        {
            $user = Auth::user();
            $user->vip = User::VIP_SILVER;
            $user->save();
        }
        if($request->has('orders')) {
            $orders = json_decode($request->orders);

            $order_id = uniqid();
            foreach ($orders as $orderData)
            {
                $data = collect($orderData);
                $order = Order::firstOrNew(['user_id'=>Auth::id(),'status_id'=>OrderStatus::BASKET,'product_id'=>$data['id']]);//'token_stat'=>$data['token'],

                $order->edit(collect($data)->all());
                $order->order_id = $order_id;
//                $order->token_stat = $data['token'];///
                $pay_result[] = isset($data['pay_result']) ? $data['pay_result'] : null;
                $order->status_id = (is_array($pay_result) and array_filter($pay_result) != null)
                    ? OrderStatus::PAID
                    : OrderStatus::EXPECT;
                $order->pay_result = $pay_result;
//                $order->is_callback = $request->has('is_callback')
//                if($data['dop_services_id'] != null)
//                {
//                    $order->dop_services_id = implode(',',$data['dop_services_id']);
//                }
                $order->user_id = Auth::check() ? Auth::id() : $order->getOriginal('user_id');
                $order->created_at = now();
                $order->save();

                if(Auth::check() and Auth::user()->vip != 0)
                {
                    if(Auth::user()->vip == User::VIP_SILVER)
                    {
                        $discount = 3;
                        $addMonth = 12;
                    }
                    elseif(Auth::user()->vip == User::VIP_GOLD)
                    {
                        $discount = 5;
                        $addMonth = 18;
                    }
                    elseif(Auth::user()->vip == User::VIP_PLATINUM)
                    {
                        $discount = 8;
                        $addMonth = 120;
                    }
                    else
                    {
                        $discount = 0;
                        $addMonth = 0;
                    }
                    $loyalty = UserLoyalty::add([],false);
                    $loyalty->user_id = Auth::id();
                    $loyalty->type = UserLoyalty::INCOME;
                    $loyalty->order_id = $order->id;
                    $loyalty->store_id = $order->store_id;
                    $loyalty->discount = round($discount,2);
                    $loyalty->amt = round($order->price*$discount/100,2);
                    $loyalty->data_end = now()->addMonth($addMonth);
                    $loyalty->save();
                }

                if(isset($order) and $order !=null)
                {
                    $product = Product::find($order->product_id);
                    $store = $product != null ? Store::find($product->store_id) : null;
                    $user = $store != null ? User::find($store->user_id) : null;

                    if($user != null and $user->email != null)
                    {
                        Mail::to($user->email)->send(new NewOrder($order,$orders,$user,$store));
                    }
                }

            }
        }

        $data = [
            'answer' => 'success',
            'message' => 'Заказ успешно принят'
        ];
        return response($data);
    }

    public function orderPost(Request $request)
    {
        if($request->has('deleteAll') and $request->deleteAll === 'true')
        {
            $orders = Order::where('user_id',Auth::id())->where('status_id',OrderStatus::BASKET)->get();
            foreach($orders as $order)
            {
                $order = Order::where('user_id',Auth::id())->where('product_id',$order->product_id)->first();
                $order->delete();
            }
        }
        elseif($request->has('orders')) {
            $uniqid = uniqid();//$uuid = Str::uuid();
            $orders = $request->orders;//json_decode();
            $oldProductIds = Order::where('user_id',Auth::id())->pluck('product_id');
            $diff = $oldProductIds->diff(collect($orders)->pluck('id'));

            $this->diff_orders($diff);

            foreach ($orders as $orderData)
            {
                $order = Order::firstOrNew(['status_id'=>OrderStatus::BASKET,'user_id'=>Auth::id(),'product_id'=>$orderData['id']]);
                if($order != null)
                {
                    $order->edit(collect($orderData)->all());
                    $order->status_id = $order->status_id != null ? $order->status_id : OrderStatus::BASKET;
                    $order->order_id = $uniqid;//$uuid;
                    $order->user_id = Auth::check() ? Auth::id() : null;
                    $order->email = Auth::check() ? Auth::user()->email : null;
                    $order->save();
                }
            }
        }
        return response('success');
    }

    public function store(Request $request)
    {
        dd($request);
        if($request->has('products'))
        {
            $uniqid = uniqid();//$uuid = Str::uuid();
            $products = json_decode($request->products);
            $token = $request->_token;//$products[0]->token
            $oldProductIds = Order::where('token',$token)->pluck('product_id');
            $diff = $oldProductIds->diff(collect($products)->pluck('id'));

            if($diff != null and $diff->count() > 0)
            {
                foreach($diff as $orderDel)
                {
                    $order = Order::where('token',$token)->where('product_id',$orderDel)->first();
                    $order->delete();
                }
            }

            foreach ($products as $product)
            {
                $order = Order::firstOrNew(['token'=>$token,'product_id'=>$product->id]);
                $order->edit(collect($product)->all());
                $order->status_id = OrderStatus::BASKET;
                $order->order_id = $uniqid;//$uuid;
                $order->token = $token;
                $order->user_id = Auth::check() ? Auth::id() : null;
                $order->product_id = $product->id;
//                $order->title = $product->title;
//                $order->product_slug = $product->slug;
//                $order->image = $product->image;
//                $order->articul = $product->articul;
//                $order->price = $product->price;
//                $order->price_2 = $product->price_2;
                $order->count = $product->count;
                $order->store_title = $product->store_title;
                $order->store_id = $product->store_id;
                $order->save();
            }
        }

        return redirect()->route('orders');
    }

    public function show($id)
    {
        //
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

    //
    public function diff_orders($diff)
    {
        if($diff != null and $diff->count() > 0)
        {
            foreach($diff as $orderDel)
            {
                $order = Order::where('user_id',Auth::id())->where('status_id',OrderStatus::BASKET)->where('product_id',$orderDel)->first();
                if($order != null)
                {
                    $order->delete();
                }
            }
        }
    }
}
