<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\Store;
use Illuminate\Http\Request;

class MapControllerAdmin extends Controller
{

    public function index()
    {
        $maps = Map::with('store')->get();
        $stores = Store::select('id','title')->get();
        return view('admin.maps.index',compact('maps','stores'));
    }

    public function create()
    {
        $maps = Map::with('store')->get();
        $stores = Store::select('id','title')->get();
        return view('admin.maps.credit',compact('maps','stores'));
    }

    public function store(Request $request)
    {
        $data = Map::add($request->all());
        $data->map_id = $request->input('map-code');
        $data->save();

        return redirect()->route('admin.maps.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Map::find($id);
        $maps = Map::with('store')->get();
        $stores = Store::select('id','title')->get();
        return view('admin.maps.credit',compact('data','maps','stores'));
    }

    public function update(Request $request, $id)
    {
        $data = Map::find($id);
        $data->edit($request->all());
        $data->map_id = $request->input('map-code');
        $data->save();

        return redirect()->route('admin.maps.index')->with('success','Информация сохранена');
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
            $data = Map::find($item);
            $this->service->ifNotAdmin($data);

            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Картаы удалены');
        } else {
            return back()->with('success','Карта удалёна');
        }
    }
}
