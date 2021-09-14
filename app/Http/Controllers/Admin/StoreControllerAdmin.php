<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Http\Services\Service;
use App\Http\Services\StoreService;
use App\Models\Catalog;
use App\Models\Color;
use App\Models\Country;
use App\Models\Item;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Store;
use App\Models\Subcatalog;
use App\Models\Tarif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreControllerAdmin extends Controller
{
    protected $service;
    protected $storeService;

    public function __construct(Service $service, StoreService $storeService)
    {
        $this->service = $service;
        $this->storeService = $storeService;
    }

    public function index()
    {
        $storesQuery = Store::with('user');
        $this->storeService->adminFilter($storesQuery); // фильтр
        $stores = $storesQuery
            ->withCount('products')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.stores.index',compact('stores'));
    }

    public function create()
    {
        $tarifs = Tarif::all();
        return view('admin.stores.credit',compact('tarifs'));
    }

    public function store(StoreRequest $request)
    {
        $data = Store::add($request->all());
        DB::transaction(function () use ($data,$request) { // транзакции для совметного выполнения событий
            try {
                $data->edit($request->all()); // массовое добавление данных
                $data->user_id = Auth::id();
                $data->uploadDataImages($request->logo,'logo'); // добавление логотипа
                $data->uploadDataImages($request->mini_img,'mini_img');
                $data->uploadDataImages($request->background,'background');
                $data->isBoolean($request,'is_delivery'); // добавление свичей
                $data->isBoolean($request,'hot');
                $data->isBoolean($request,'is_credit');
                $data->isBoolean($request,'is_slug');
                $data->isBoolean($request,'is_Armada');
                $data->isBoolean($request,'is_import_csv');
                $data->isBoolean($request,'status');
                $data->letter = Str::limit($request->title,1,'');
                $data->work_times = $this->storeService->workTimes($request->only('day_start','day_end','time_start','time_end')); // преобразование данных рабочего времени
                $data->save();

                $this->service->sendMail($data,'add'); // отправка писем админам
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }, 5);

        return redirect()->route('admin.stores.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Store::find($id);
        $this->service->ifNotAdmin($data); // проверка прав доступа

        $tarifs = Tarif::all();
        $products = Product::where('store_id',$data->id)->select('id','slug','title','price')->get();
        return view('admin.stores.credit',compact('data','tarifs','products'));
    }

    public function update(StoreRequest $request, $id)
    {
        $data = Store::find($id);
        $this->service->ifNotAdmin($data); // проверка прав доступа

        DB::transaction(function () use ($data,$request) {
            $data->edit($request->all(),false);
            $data->phones = array_filter($request->phones);
            $data->uploadDataImages($request->logo,'logo');
            $data->uploadDataImages($request->mini_img,'mini_img');
            $data->uploadDataImages($request->background,'background');
            $data->isBoolean($request,'is_delivery');
            $data->isBoolean($request,'hot');
            $data->isBoolean($request,'is_credit');
            $data->isBoolean($request,'is_slug');
            $data->isBoolean($request,'status');
            $data->isBoolean($request,'is_Armada');
            $data->isBoolean($request,'is_import_csv');
            $data->letter = Str::limit($request->title,1,'');
            $data->work_times = $this->storeService->workTimes($request->only('day_start','day_end','time_start','time_end'));
            $data->save();

            $this->service->sendMail($data,'edit'); // отправка писем админам
        }, 5);

        return back()->with('success','Информация сохранена');//redirect()->route('admin.stores.index')
    }

    public function storeUpdate(Request $request,$id)
    {
        $data = Store::find($id);
        $this->service->ifNotAdmin($data); // проверка прав доступа
        $data->status = ($request->has('isActive') and $request->isActive == 'on') ? true : false ;
        $data->save();
        return redirect()->route('admin.stores.index')->with('success','Информация сохранена');
    }

    public function checkSlug(Request $request)
    {
        $slug = Str::slug($request->title);
        return response()->json(['slug' => $slug]);
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
            $this->service->ifNotAdmin($data);

            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Магазины удалены');
        } else {
            return back()->with('success','Магазин удалён');
        }
    }
}
