<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Services\OrderService;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Store;
use App\Models\TypeDelivery;
use App\Models\TypePay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderControllerSeller extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $storeIds = Store::where('user_id',Auth::id())->pluck('id');

        $ordersQuery = Order::whereIn('store_id',$storeIds)
            ->with('store','product','product.item','product.item.subcatalog','product.item.subcatalog.catalog','orderStatus','country','city','userInfo');
        $this->orderService->filter($ordersQuery,$request);

        $orders = $ordersQuery->latest()->get();

        $statuses = OrderStatus::select('id','title_ru')->get();

        return view('sellers.orders.index',compact('orders','statuses','request'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Order::find($id);
        $product = Product::with('store')->find($data->product_id);
        $cities = City::isActive()->get();
        $deliveryTypes = TypeDelivery::isActive()->select('id','title')->get();
        $payTypes = TypePay::isActive()->select('id','title')->get();
        $statuses = OrderStatus::select('id','title_ru')->get();

        return view('admin.orders.credit',compact('data','product','cities','deliveryTypes','payTypes','statuses'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        $order->save();
        return back()->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
