<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Catalog;
use App\Models\Item;
use App\Models\News;
use App\Models\NewStatus;
use App\Models\NewType;
use App\Models\Store;
use App\Models\Subcatalog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsControllerAdmin extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $news = News::where('store_id',null)
            ->with('status','type')
            ->latest()
            ->get();
        return view('admin.pages.news.index',compact('news'));
    }

    public function create()
    {
        $types = NewType::select('id','title')->get();
//        $items = Item::select('id','title','subcatalog_id')
//            ->orderBy('title')
//            ->get();
//        $subcatalogs = Subcatalog::whereIn('id',$items->pluck('subcatalog_id')->unique())
//            ->orderBy('title')
//            ->select('id','catalog_id','title')
//            ->with('catalog:title')
//            ->get();
//        $catalogs = Catalog::whereIn('id',$subcatalogs->pluck('catalog_id')->unique())
//            ->where('isActive',1)
//            ->orderBy('title')
//            ->select('id','title')
//            ->get();
        $statuses = NewStatus::select('id','title')->get();
        return view('admin.pages.news.credit',compact('types','statuses'));
    }

    public function store(Request $request)
    {
        $data = News::add($request->all());
        $data->user_id = Auth::id();
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->isBoolean($request,'is_slug');
        $data->save();
        $data->setItem($request->items);

        return redirect()->route('admin.news.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = News::findOrFail($id);
        $types = NewType::select('id','title')->get();
//        $items = Item::select('id','title','subcatalog_id')
//            ->orderBy('title')
//            ->get();
//        $subcatalogs = Subcatalog::whereIn('id',$items->pluck('subcatalog_id')->unique())
//            ->orderBy('title')
//            ->select('id','catalog_id','title')
//            ->with('catalog:title')
//            ->get();
//        $catalogs = Catalog::whereIn('id',$subcatalogs->pluck('catalog_id')->unique())
//            ->where('isActive',1)
//            ->orderBy('title')
//            ->select('id','title')
//            ->get();
        $statuses = NewStatus::select('id','title')->get();
        return view('admin.pages.news.credit',compact('data','types','statuses'));
    }

    public function update(Request $request, $id)
    {
        $data = News::find($id);
        $data->edit($request->all());
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->isBoolean($request,'is_slug');
        $data->save();
        $data->setItem($request->items);

        return redirect()->route('admin.news.index')->with('success','Информация сохранена');
    }

    public function newsUpdate(Request $request,$id)
    {
        $data = News::find($id);
        $data->isActive = ($request->has('isActive') and $request->isActive == 'on') ? true : false ;
        $data->save();
        return redirect()->route('admin.news.index')->with('success','Информация сохранена');
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

            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Новости удалены');
        } else {
            return back()->with('success','Новость удалёна');
        }
    }
}
