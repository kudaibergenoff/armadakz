<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorControllerAdmin extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.colors.index',compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.credit');
    }

    public function store(Request $request)
    {
        $data = Color::add($request->all());
        $data->save();
        return redirect()->route('admin.colors.index')->with('success','Цвет добавлен');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Color::findOrFail($id);
        return view('admin.colors.credit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Color::find($id);
        $data->edit($request->all());
        $data->save();
        return redirect()->route('admin.colors.index')->with('success','Цвет изменён');
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
            $data = Color::find($item);
            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Цвета удалены');
        } else {
            return back()->with('success','Цвет удалён');
        }
    }
}
