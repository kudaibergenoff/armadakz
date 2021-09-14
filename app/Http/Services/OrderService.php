<?php

namespace App\Http\Services;

use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductView;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OrderService
{
    public function filter($ordersQuery,$request)
    {
        if(isset($_GET['start']) or isset($_GET['end']))
        {
            if(isset($_GET['start']))
            {
                $arrStart = explode('.',$_GET['start']);
                $dataStart = '20'.$arrStart[2].'-'.$arrStart[0].'-'.$arrStart[1].' 00:00:00';
                $ordersQuery = $ordersQuery->where('created_at','>',$dataStart);
            }
            if(isset($_GET['end']))
            {
                $arrEnd = explode('.',$_GET['end']);
                $dataEnd = '20'.$arrEnd[2].'-'.$arrEnd[0].'-'.$arrEnd[1].' 00:00:00';
                $ordersQuery = $ordersQuery->where('created_at','<',$dataEnd);
            }
        }
        else
        {
            $ordersQuery = $ordersQuery->where('created_at','>',now()->addMonth(-1));
        }

        if($request->has('status_id'))
        {
            $ordersQuery = $ordersQuery->whereIn('status_id',$request->status_id);
        }
        else
        {
            $ordersQuery = $ordersQuery->whereIn('status_id',[OrderStatus::EXPECT,OrderStatus::PAID]);
        }

        return $ordersQuery;
    }

}
