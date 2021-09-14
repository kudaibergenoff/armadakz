<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Services\Service;
use App\Http\Services\StoreService;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreControllerSeller extends Controller
{
    protected $service;
    protected $storeService;

    public function __construct(Service $service,StoreService $storeService)
    {
        $this->service = $service;
        $this->storeService = $storeService;
    }

    public function index()
    {
        $stores = Store::where('user_id',Auth::id())
            ->select('id','status','title','description','phones','address','logo','block','intersection','butik','created_at','updated_at','slug')
            ->with('products')
            ->get();
        return view('sellers.stores.index',compact('stores'));
    }

    public function create()
    {
        return view('sellers.stores.credit');
    }

    public function store(StoreRequest $request)
    {
        $data = Store::add($request->all());
        DB::transaction(function () use ($data,$request) {
            try {
                $data->edit($request->all());
                $data->user_id = Auth::id();
                $data->phones = array_filter($request->phones);
                $data->uploadDataImages($request->logo,'logo');
                $data->uploadDataImages($request->mini_img,'mini_img');
                $data->uploadDataImages($request->background,'background');
                $data->isBoolean($request,'hot');
                $data->isBoolean($request,'is_delivery');
                $data->isBoolean($request,'is_credit');
                $data->isBoolean($request,'status');
                $data->work_times = $this->storeService->workTimes($request->only('day_start','day_end','time_start','time_end'));
                $data->letter = Str::limit($request->title,1,'');
                $data->save();

                $this->service->sendMail($data,'add'); // отправка писем админам
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }, 5);

        return redirect()->route('seller.stores.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit(Store $store,$id)
    {
        $data = Store::find($id);
        $this->service->ifNotAdmin($data);

        $products = Product::where('store_id',$data->id)->select('id','slug','title','price')->get();
        return view('sellers.stores.credit',compact('data', 'products'));
    }

    public function update(StoreRequest $request, Store $store, $id)
    {
        $data = Store::find($id);
        $this->service->ifNotAdmin($data); // проверка прав доступа

        DB::transaction(function () use ($data,$request) {
            $data->edit($request->all());
            $data->phones = array_filter($request->phones);
            $data->uploadDataImages($request->logo,'logo');
            $data->uploadDataImages($request->mini_img,'mini_img');
            $data->uploadDataImages($request->background,'background');
            $data->isBoolean($request,'hot');
            $data->isBoolean($request,'is_delivery');
            $data->isBoolean($request,'is_credit');
            $data->isBoolean($request,'status');
            $data->letter = Str::limit($request->title,1,'');
            $data->work_times = $this->storeService->workTimes($request->only('day_start','day_end','time_start','time_end'));
            $data->save();

            $this->service->sendMail($data,'edit'); // отправка писем админам
        }, 5);

        if($data->work_times == null)
        {
            return back()->with('error','Не введено время работы');
        }

        return redirect()->route('seller.stores.index')->with('success','Информация сохранена');
    }

    public function storeUpdate(Request $request,$id)
    {
        $data = Store::find($id);
        $this->service->ifNotAdmin($data); // проверка прав доступа
        $data->status = ($request->has('isActive') and $request->isActive == 'on') ? true : false ;
        $data->save();
        return redirect()->route('seller.stores.index')->with('success','Информация сохранена');
    }

    public function destroy($id)
    {
        $id = explode(',', $id);

        if(!is_array($id))
        {
            $id[] = $id;
        }

        foreach ($id as $item)
        {
            $data = Store::find($item);
            $this->service->ifNotAdmin($data); // проверка прав доступа
            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Магазины удалены');
        } else {
            return back()->with('success','Магазин удалён');
        }
    }
}
