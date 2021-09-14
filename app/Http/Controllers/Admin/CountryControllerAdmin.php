<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Http\Request;

class CountryControllerAdmin extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('title_ru')
            ->get();
        return view('admin.countries.index',compact('countries'));
    }

    public function create()
    {
        return view('admin.countries.credit');
    }

    public function store(Request $request)
    {
        $data = Country::add($request->all());
        $data->save();
        return redirect()->route('admin.countries.index')->with('success','Страна добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Country::findOrFail($id);
        return view('admin.countries.credit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Country::find($id);
        $data->edit($request->all());
        $data->save();
        return redirect()->route('admin.countries.index')->with('success','Страна изменёна');
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
            $data = Country::find($item);
            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Страны удалены');
        } else {
            return back()->with('success','Страна удалёна');
        }
    }
}
