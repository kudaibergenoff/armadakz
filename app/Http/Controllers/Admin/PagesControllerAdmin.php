<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PagesControllerAdmin extends Controller
{

    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.index',compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.credit');
    }

    public function store(Request $request)
    {
        $data = Page::add($request->all());
        $data->isBoolean($request,'isActive');
        $data->isBoolean($request,'is_banner');
        $data->save();

        return redirect()->route('admin.pages.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($slug)
    {
        $data = Page::where('slug',$slug)->first();

        return view('admin.pages.credit',compact('data'));
    }

    public function update(Request $request, $slug)
    {
        $data = Page::find($slug);
        $data->edit($request->all());
        $data->isBoolean($request,'isActive');
        $data->isBoolean($request,'is_banner');
        $data->save();

        return redirect()->route('admin.pages.index')->with('success','Информация сохранена');
    }

    public function destroy($id)
    {
        //
    }
}
