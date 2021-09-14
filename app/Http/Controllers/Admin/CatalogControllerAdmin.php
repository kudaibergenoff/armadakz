<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Catalog;
use App\Models\PopularItem;
use App\Models\Subcatalog;
use Illuminate\Http\Request;

class CatalogControllerAdmin extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $catalogs = Catalog::with('subcatalogs')->get();
        return view('admin.catalogs.index',compact('catalogs'));
    }

    public function create()
    {
        return view('admin.catalogs.credit');
    }

    public function store(Request $request)
    {
        $data = Catalog::add($request->all());
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->status = $data->isActive;
        $data->isBoolean($request,'is_popular');
        $data->isBoolean($request,'is_menu');
        $data->isBoolean($request,'onlyAdmins');
        $data->save();

        $this->service->popular_items($data,'catalogs'); // добавление в популярные разделы

        return redirect()->route('admin.catalogs.index')->with('success','Категория добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Catalog::findOrFail($id);
        $subcatalogs = Subcatalog::where('catalog_id',$data->id)
            ->orderBy('title')
            ->select('id','title')
            ->withCount('items')
            ->get();
        return view('admin.catalogs.credit',compact('data','subcatalogs'));
    }

    public function update(Request $request, $id)
    {
        $data = Catalog::findOrFail($id);
        $data->edit($request->all());
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->status = $data->isActive;
        $data->isBoolean($request,'is_popular');
        $data->isBoolean($request,'is_menu');
        $data->isBoolean($request,'onlyAdmins');
        $data->save();

        $this->service->popular_items($data,'catalogs'); // добавление в популярные разделы

        return redirect()->route('admin.catalogs.index')->with('success','Категория изменена');
    }

    public function destroy($id)
    {
        //
    }
}
