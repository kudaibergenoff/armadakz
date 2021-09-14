<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityControllerAdmin extends Controller
{
    public function index()
    {
        $cities = City::with('country')
            ->orderBy('title_ru')
            ->get();
        return view('admin.cities.index',compact('cities'));
    }

    public function create()
    {
        $countries = Country::isActive()
            ->orderBy('title_ru')
            ->get();
        return view('admin.cities.credit',compact('countries'));
    }

    public function store(Request $request)
    {
        $data = City::add($request->all());
        $data->save();
        return redirect()->route('admin.cities.index')->with('success','Город добавлен');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $countries = Country::isActive()
            ->orderBy('title_ru')
            ->get();
        $data = City::findOrFail($id);
        return view('admin.cities.credit',compact('countries','data'));
    }

    public function update(Request $request, $id)
    {
        $data = City::find($id);
        $data->edit($request->all());
        $data->save();
        return redirect()->route('admin.cities.index')->with('success','Город изменён');
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
            $data = City::find($item);
            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Города удалены');
        } else {
            return back()->with('success','Город удалён');
        }
    }
}
