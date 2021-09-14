<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifControllerAdmin extends Controller
{
    public function index()
    {
        $tarifs = Tarif::all();
        return view('admin.tarifs.index',compact('tarifs'));
    }

    public function create()
    {
        return view('admin.tarifs.credit');
    }

    public function store(Request $request)
    {
        $data = Tarif::add($request->all());
        $data->save();
        return redirect()->route('admin.tarifs.index')->with('success','Тариф добавлен');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Tarif::findOrFail($id);
        return view('admin.tarifs.credit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Tarif::find($id);
        $data->edit($request->all());
        $data->save();
        return redirect()->route('admin.tarifs.index')->with('success','Тариф изменён');
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
            $data = Tarif::find($item);
            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Тарифы удалены');
        } else {
            return back()->with('success','Тариф удалён');
        }
    }
}
