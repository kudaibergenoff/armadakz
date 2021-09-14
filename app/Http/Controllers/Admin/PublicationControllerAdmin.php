<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\NewService;
use App\Http\Services\Service;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicationControllerAdmin extends Controller
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
        $news = News::where('store_id','!=',null)
            ->with('status','type','store')
            ->latest()
            ->get();
        return view('admin.publications.index',compact('news'));
    }

    public function create()
    {
        $stores = $this->newService->getStores();
        $items = $this->newService->getItems();
        $subcatalogs = $this->newService->getSubcatalogs($items->pluck('subcatalog_id')->unique());
        $catalogs = $this->newService->getCatalogs($subcatalogs->pluck('catalog_id')->unique());
        $types = $this->newService->getTypes();
        $statuses = $this->newService->getStatus();
        return view('admin.publications.credit',compact('stores','items','subcatalogs','catalogs','types','statuses'));
    }

    public function store(Request $request)
    {
        $data = News::add($request->all());
        $data->user_id = Auth::id();
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->save();
        $data->setItem($request->items);

        return redirect()->route('admin.publications.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = News::findOrFail($id);

        $stores = $this->newService->getStores();

        $items = $this->newService->getItems();
        $subcatalogs = $this->newService->getSubcatalogs($items->pluck('subcatalog_id')->unique());
        $catalogs = $this->newService->getCatalogs($subcatalogs->pluck('catalog_id')->unique());
        $types = $this->newService->getTypes();
        $statuses = $this->newService->getStatus();

        return view('admin.publications.credit',compact('data','stores','items','subcatalogs','catalogs','types','statuses'));
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

        return redirect()->route('admin.publications.index')->with('success','Информация сохранена');
    }

    public function newsUpdate(Request $request,$id)
    {
        $data = News::find($id);
        $this->service->ifNotAdmin($data);
        $data->isActive = ($request->has('isActive') and $request->isActive == 'on') ? true : false ;
        $data->save();
        return redirect()->route('admin.publications.index')->with('success','Информация сохранена');
    }

    public function destroy($id)
    {
        //
    }
}
