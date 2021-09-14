<?php


namespace App\Http\Services;


use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;

class AnalyticService
{
    public function start()
    {
        if(isset($_GET['start']))
        {
            $arrStart = explode('.',$_GET['start']);
            $start = $arrStart[2].'.'.$arrStart[0].'.'.$arrStart[1].' 00:00:00';
        }
        else
        {
            $start = now()->addMonth(-1);
        }
        return $start;
    }

    public function dataStart()
    {
        if(isset($_GET['start']))
        {
            $arrStart = explode('.',$_GET['start']);
            $dataStart = '20'.$arrStart[2].'-'.$arrStart[0].'-'.$arrStart[1];
        }
        else
        {
            $start = now()->addMonth(-1);
            $dataStart = $start->format('Y-m-d');
        }
        return $dataStart;
    }

    public function end()
    {
        if(isset($_GET['end']))
        {
            $arrEnd = explode('.',$_GET['end']);
            $end = $arrEnd[2].'.'.$arrEnd[0].'.'.$arrEnd[1].' 00:00:00';
        }
        else
        {
            $end = now();
        }
        return $end;
    }

    public function dataEnd()
    {
        if(isset($_GET['end']))
        {
            $arrEnd = explode('.',$_GET['end']);
            $dataEnd = '20'.$arrEnd[2].'-'.$arrEnd[0].'-'.$arrEnd[1];
        }
        else
        {
            $end = now()->addDay(1);
            $dataEnd = $end->format('Y-m-d');
        }
        return $dataEnd;
    }

    public function productActiveCount()
    {
        if(isset($_GET['store']))
        {
            $productActiveCount = Product::isActive(1)
                ->where('store_id',$_GET['store'])
                ->count();
        }
        else
        {
            $productActiveCount = Product::isActive(1)->count();
        }
        return $productActiveCount;
    }

    public function productNotActiveCount()
    {
        if(isset($_GET['store']))
        {
            $productNotActiveCount = Product::where('presence_id',4)
                ->where('store_id',$_GET['store'])
                ->count();
        }
        else
        {
            $productNotActiveCount = Product::isActive(0)->count();
        }
        return $productNotActiveCount;
    }

    public function allSalesCount()
    {
        if(isset($_GET['store']))
        {
            $allSalesCount = Order::where('status_id',[OrderStatus::COMPLETED])
                ->where('store_id',$_GET['store'])
                ->count();
        }
        else
        {
            $allSalesCount = Order::where('status_id',[OrderStatus::COMPLETED])
                ->count();
        }
        return $allSalesCount;
    }

    public function allOrdersActiveCount()
    {
        if(isset($_GET['store']))
        {
            $allOrdersActiveCount = Order::where('status_id',[OrderStatus::EXPECT])
                ->where('store_id',$_GET['store'])
                ->count();
        }
        else
        {
            $allOrdersActiveCount = Order::where('status_id',[OrderStatus::EXPECT])
                ->count();
        }
        return $allOrdersActiveCount;
    }

    public function salesCount()
    {
        if(isset($_GET['store']))
        {
            $salesCount = Order::where('status_id',[OrderStatus::COMPLETED])
                ->where('store_id',$_GET['store'])
                ->count();
        }
        else
        {
            $salesCount = Order::where('status_id',[OrderStatus::COMPLETED])
                ->count();
        }
        return $salesCount;
    }

    public function salesCanceledCount($start,$end)
    {
        if(isset($_GET['store']))
        {
            $salesCanceledCount = Order::whereBetween('updated_at',[$start,$end])
                ->where('status_id',[OrderStatus::CANCELED])
                ->where('store_id',$_GET['store'])
                ->count();
        }
        else
        {
            $salesCanceledCount = Order::whereBetween('updated_at',[$start,$end])
                ->where('status_id',[OrderStatus::CANCELED])
                ->count();
        }
        return $salesCanceledCount;
    }

    public function oderUserIds($start,$end)
    {
        if(isset($_GET['store']))
        {
            $oderUserIds = Order::whereBetween('updated_at',[$start,$end])
                ->where('user_id','!=',null)
                ->where('store_id',$_GET['store'])
                ->pluck('user_id');
        }
        else
        {
            $oderUserIds = Order::whereBetween('updated_at',[$start,$end])
                ->where('user_id','!=',null)
                ->pluck('user_id');
        }
        return $oderUserIds;
    }

    public function orders($value)
    {
        if(isset($_GET['store']))
        {
            $orders = Order::where('status_id',OrderStatus::COMPLETED)
                ->where('store_id',$_GET['store'])
                ->whereDate('created_at',$value)
                ->count();
        }
        else
        {
            $orders = Order::where('status_id',OrderStatus::COMPLETED)
                ->whereDate('created_at',$value)->count();
        }
        return $orders;
    }
}
