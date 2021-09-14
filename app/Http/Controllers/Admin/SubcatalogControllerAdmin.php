<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Catalog;
use App\Models\Item;
use App\Models\Subcatalog;
use Illuminate\Http\Request;

class SubcatalogControllerAdmin extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $subcatalogsQuery = Subcatalog::select('id','slug','h1','isActive','is_popular','catalog_id','title','images','created_at','updated_at')->with('catalog','items');
        $subcatalogsQuery = $this->service->filterId($subcatalogsQuery,'catalog_id');
        $subcatalogs = $subcatalogsQuery->get();
        $catalogs = Catalog::select('id','title')->orderBy('title','asc')->get();
        return view('admin.subcatalogs.index',compact('subcatalogs','catalogs'));
    }

    public function create()
    {
        $catalogs = Catalog::select('id','title')->orderBy('title','asc')->get();

        return view('admin.subcatalogs.credit',compact('catalogs'));
    }

    public function store(Request $request)
    {
        $data = Subcatalog::add($request->all());
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->isBoolean($request,'is_popular');
        $data->save();

        $this->service->popular_items($data,'catalog'); // добавление в популярные разделы

        return redirect()->route('admin.subcatalogs.index')->with('success','Подкатегория добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Subcatalog::findOrFail($id);
        $catalogs = Catalog::select('id','title')->orderBy('title','asc')->get();
        $items = Item::where('subcatalog_id',$data->id)
            ->orderBy('title')
            ->pluck('title');

        return view('admin.subcatalogs.credit',compact('data','catalogs','items'));
    }

    public function update(Request $request, $id)
    {
        $data = Subcatalog::findOrFail($id);
        $data->edit($request->all());
        if ($request->images != null )
        {
            $data->uploadDataImages($request->images,'images');
        }
        $data->isBoolean($request,'isActive');
        $data->isBoolean($request,'is_popular');
        $data->save();

        $this->service->popular_items($data,'catalog'); // добавление в популярные разделы

        return redirect()->route('admin.subcatalogs.index')->with('success','Подкатегория изменена');
    }

    public function destroy($id)
    {
        //
    }
}
