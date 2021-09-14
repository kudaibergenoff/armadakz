<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\AnalyticService;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Store;
use App\Models\UserInfo;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;

class AnalyticControllerAdmin extends Controller
{
    protected $analyticService;

    public function __construct(AnalyticService $analyticService)
    {
        $this->analyticService = $analyticService;
    }


    public function index()
    {
        $start = $this->analyticService->start();
        $dataStart = $this->analyticService->dataStart();
        $end = $this->analyticService->end();
        $dataEnd = $this->analyticService->dataEnd();
        $productActiveCount = $this->analyticService->productActiveCount();
        $productNotActiveCount = $this->analyticService->productNotActiveCount();
        $allSalesCount = $this->analyticService->allSalesCount();
        $allOrdersActiveCount = $this->analyticService->allOrdersActiveCount();
        $salesCount = $this->analyticService->salesCount();

        $salesCanceledCount = $this->analyticService->salesCanceledCount($start,$end);

        $allCount = ($salesCount + $salesCanceledCount) > 0 ? ($salesCount + $salesCanceledCount) : 1;
        $percent = $salesCount/$allCount*100;

        $oderUserIds = $this->analyticService->oderUserIds($start,$end);
        $users = UserInfo::whereIn('user_id',$oderUserIds)
            ->with('city')
            ->get();

        $period = new DatePeriod(
            new DateTime($dataStart),
            new DateInterval('P1D'),
            new DateTime($dataEnd)
        );

        foreach ($period as $key => $value) {
            $labels[] = $value->format('d.m.y');
            $ordersCount[] = $this->analyticService->orders($value);
        }

        $stores = Store::select('id','title')->get();

        return view('admin.analytics.index',compact('productActiveCount','productNotActiveCount','allSalesCount','salesCount','allOrdersActiveCount',
            'salesCanceledCount','percent','users','labels','ordersCount','stores'));
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
