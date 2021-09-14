<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Services\NewService;
use App\Http\Services\Service;
use App\Models\Catalog;
use App\Models\Item;
use App\Models\News;
use App\Models\NewStatus;
use App\Models\Store;
use App\Models\Subcatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsControllerSeller extends Controller
{
    protected $service;
    protected $newService;

    public function __construct(Service $service,NewService $newService)
    {
        $this->service = $service;
        $this->newService = $newService;
    }

    public function index()
    {
        $store_ids = Store::where('user_id',Auth::id())->pluck('id');
        $news = $this->newService->getNews($store_ids);

        return view('sellers.news.index',compact('news'));
    }

    public function create()
    {
        $stores =$this->newService->getStores();

        if($stores->count() == 0)
        {
            return redirect()->route('seller.stores.create')->with('error','У Вас не создано ни одного магазина. Создайте его!');
        }

        $items = $this->newService->getItems();
        $subcatalogs = $this->newService->getSubcatalogs($items->pluck('subcatalog_id')->unique());
        $catalogs = $this->newService->getCatalogs($subcatalogs->pluck('catalog_id')->unique());
        $types = $this->newService->getTypes();
        $statuses = $this->newService->getStatus();
        return view('sellers.news.credit',compact('stores','items','subcatalogs','catalogs','types','statuses'));
    }

    public function store(Request $request)
    {
        $data = News::add($request->all());
        $data->user_id = Auth::id();
        $data->status_id = NewStatus::APPROVED;
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->save();
        $data->setItem($request->items);

        $this->service->sendMail($data,'addNew'); // отправка писем админам

        return redirect()->route('seller.news.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = News::findOrFail($id);
        $this->service->ifNotAdmin($data);

        $stores =$this->newService->getStores();
        if($stores->count() == 0)
        {
            return redirect()->route('seller.stores.create')->with('error','У Вас не создано ни одного магазина. Создайте его!');
        }

        $items = $this->newService->getItems();
        $subcatalogs = $this->newService->getSubcatalogs($items->pluck('subcatalog_id')->unique());
        $catalogs = $this->newService->getCatalogs($subcatalogs->pluck('catalog_id')->unique());
        $types = $this->newService->getTypes();
        $statuses = $this->newService->getStatus();

        return view('sellers.news.credit',compact('data','stores','items','subcatalogs','catalogs','types','statuses'));
    }

    public function update(Request $request, $id)
    {
        $data = News::find($id);
        $this->service->ifNotAdmin($data);
        $data->edit($request->all());
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->save();
        $data->setItem($request->items);

        return redirect()->route('seller.news.index')->with('success','Информация сохранена');
    }

    public function newsUpdate(Request $request,$id)
    {
        $data = News::find($id);
        $this->service->ifNotAdmin($data);
        $data->isActive = ($request->has('isActive') and $request->isActive == 'on') ? true : false ;
        $data->save();
        return redirect()->route('seller.news.index')->with('success','Информация сохранена');
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
            $data = News::find($item);
            $this->service->ifNotAdmin($data);
            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Товары удалены');
        } else {
            return back()->with('success','Товар удалён');
        }
    }
}
