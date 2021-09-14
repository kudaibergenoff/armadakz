<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Review;
use App\Models\Store;
use App\Models\UserInfo;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexControllerSeller extends Controller
{


    public function home()
    {
        $storeIds = Store::where('user_id',Auth::id())->pluck('id');
        $productsCount = Product::whereIn('store_id',$storeIds)->count();
        $storesCount = Store::where('user_id',Auth::id())->count();
        $ordersCount = Order::whereIn('store_id',$storeIds)->count();
        $reviewsCount = Review::whereIn('store_id',$storeIds)->count();
        return view('sellers.home.index',compact('productsCount','storesCount','ordersCount','reviewsCount'));
    }

//    public function analytics()
//    {
//        $storeIds = Store::where('user_id',Auth::id())->pluck('id');
//        $productActiveCount = Product::whereIn('store_id',$storeIds)->isActive(1)->count();
//        $productNotActiveCount = Product::whereIn('store_id',$storeIds)->isActive(0)->count();
//
//        $allSalesCount = Order::whereIn('store_id',$storeIds)
//            ->where('status_id',[OrderStatus::COMPLETED])
//            ->count();
//        $allOrdersActiveCount = Order::whereIn('store_id',$storeIds)
//            ->where('status_id',[OrderStatus::EXPECT])
//            ->count();
//        $salesCount = Order::whereIn('store_id',$storeIds)
//            ->where('status_id',[OrderStatus::COMPLETED])
//            ->count();
//
//        if(isset($_GET['start']))
//        {
//            $arrStart = explode('.',$_GET['start']);
//            $start = $arrStart[2].'.'.$arrStart[0].'.'.$arrStart[1].' 00:00:00';
//            $dataStart = '20'.$arrStart[2].'-'.$arrStart[0].'-'.$arrStart[1];
//        }
//        else
//        {
//            $start = now()->addMonth(-1);
//            $dataStart = $start->format('Y-m-d');
//        }
//        if(isset($_GET['end']))
//        {
//            $arrEnd = explode('.',$_GET['end']);
//            $end = $arrEnd[2].'.'.$arrEnd[0].'.'.$arrEnd[1].' 00:00:00';
//            $dataEnd = '20'.$arrEnd[2].'-'.$arrEnd[0].'-'.$arrEnd[1];
//        }
//        else
//        {
//            $end = now();
//            $dataEnd = $end->format('Y-m-d');
//        }
//
//        $salesCanceledCount = Order::whereIn('store_id',$storeIds)
//            ->whereBetween('updated_at',[$start,$end])
//            ->where('status_id',[OrderStatus::CANCELED])
//            ->count();
//
//        $allCount = ($salesCount + $salesCanceledCount) > 0 ? ($salesCount + $salesCanceledCount) : 1;
//        $percent = $salesCount/$allCount*100;
//
//        $oderUserIds = Order::whereIn('store_id',$storeIds)
//            ->whereBetween('updated_at',[$start,$end])
//            ->where('user_id','!=',null)
//            ->pluck('user_id');
//
//        $users = UserInfo::whereIn('user_id',$oderUserIds)
//            ->with('city')
//            ->get();
//
//        $period = new DatePeriod(
//            new DateTime($dataStart),
//            new DateInterval('P1D'),
//            new DateTime($dataEnd)
//        );
//
//        foreach ($period as $key => $value) {
//            $labels[] = $value->format('d.m.y');
//            $ordersCount[] = Order::whereIn('store_id',$storeIds)
//                ->where('status_id',OrderStatus::COMPLETED)
//                ->whereDate('created_at',$value)->count();
//        }
//
//        return view('sellers.analytics.index',compact('productActiveCount','productNotActiveCount','allSalesCount','salesCount','allOrdersActiveCount',
//            'salesCanceledCount','percent','users','labels','ordersCount'));
//    }
}
