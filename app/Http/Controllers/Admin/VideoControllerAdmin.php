<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Catalog;
use App\Models\Item;
use App\Models\News;
use App\Models\NewType;
use App\Models\Subcatalog;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VideoControllerAdmin extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $videos = Video::latest()
            ->get();
        return view('admin.videos.index',compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.credit');
    }

    public function store(Request $request)
    {
        $data = Video::add($request->all());
        $data->user_id = Auth::id();
        $data->isBoolean($request,'is_active');
        $data->img = Str::after($request->url, '?v=');
        $data->save();

        return redirect()->route('admin.videos.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Video::findOrFail($id);

        return view('admin.videos.credit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Video::find($id);
        $data->edit($request->all());
        $data->user_id = Auth::id();
        $data->isBoolean($request,'is_active');
        $data->img = Str::after($request->url, '?v=');
        $data->save();

        return redirect()->route('admin.videos.index')->with('success','Информация сохранена');
    }

    public function videosUpdate(Request $request,$id)
    {
        $data = Video::find($id);
        $data->isActive = ($request->has('isActive') and $request->isActive == 'on') ? true : false ;
        $data->save();
        return redirect()->route('admin.videos.index')->with('success','Информация сохранена');
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
            $data = Video::find($item);

            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Новости удалены');
        } else {
            return back()->with('success','Новость удалёна');
        }
    }
}
