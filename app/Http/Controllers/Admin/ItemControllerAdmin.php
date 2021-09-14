<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Catalog;
use App\Models\Item;
use App\Models\Subcatalog;
use Illuminate\Http\Request;

class ItemControllerAdmin extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $itemsQuery = Item::select('id','isActive','is_popular','is_menu','subcatalog_id','slug','h1','title','images','created_at','updated_at')
            ->with('subcatalog','subcatalog.catalog');
        $itemsQuery = $this->service->filterId($itemsQuery,'subcatalog_id');
        $itemsQuery = $this->service->filterParentId($itemsQuery,Subcatalog::all(),'catalog_id','subcatalog_id');
        $items = $itemsQuery->get();
        $subcatalogs = Subcatalog::select('id','title')->orderBy('title','asc')->get();
        $catalogs = Catalog::select('id','title')->orderBy('title','asc')->get();

        return view('admin.items.index',compact('items','subcatalogs','catalogs'));
    }

    public function create()
    {
        $subcatalogs = Subcatalog::select('id','catalog_id','title')->orderBy('title','asc')->get();
        $catalogs = Catalog::select('id','title')->orderBy('title','asc')->get();

        return view('admin.items.credit',compact('subcatalogs','catalogs'));
    }

    public function store(Request $request)
    {
        $data = Item::add($request->all());
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->isBoolean($request,'is_popular');
        $data->isBoolean($request,'is_menu');
        $data->save();

        $this->service->popular_items($data,'item'); // добавление в популярные разделы

        return redirect()->route('admin.items.index')->with('success','Раздел добавлен');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Item::findOrFail($id);
        $subcatalogs = Subcatalog::select('id','catalog_id','title')->orderBy('title','asc')->get();
        $catalogs = Catalog::select('id','title')->orderBy('title','asc')->get();

        return view('admin.items.credit',compact('data','subcatalogs','catalogs'));
    }

    public function update(Request $request, $id)
    {
        $data = Item::findOrFail($id);
        $data->edit($request->all());
        if ($request->images != null)
        {
            $data->uploadDataImages($request->images,'images');
        }
        $data->isBoolean($request,'isActive');
        $data->isBoolean($request,'is_popular');
        $data->isBoolean($request,'is_menu');
        $data->save();

        $this->service->popular_items($data,'item'); // добавление в популярные разделы

        return redirect()->route('admin.items.index')->with('success','Раздел изменен');
    }

    public function destroy($id)
    {
        //
    }
}
