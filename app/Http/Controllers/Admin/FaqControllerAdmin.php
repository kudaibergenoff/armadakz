<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqControllerAdmin extends Controller
{

    public function index()
    {
        $faqs = Faq::all();
        return view('admin.pages.faqs.index',compact('faqs'));
    }

    public function create()
    {
        return view('admin.pages.faqs.credit');
    }

    public function store(Request $request)
    {
        $data = Faq::add($request->all());
        $data->isBoolean($request,'isActive');
        $data->save();
        return redirect()->route('admin.faqs.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Faq::findOrFail($id);
        return view('admin.pages.faqs.credit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Faq::find($id);
        $data->edit($request->all());
        $data->isBoolean($request,'isActive');
        $data->save();

        return redirect()->route('admin.faqs.index')->with('success','Информация сохранена');
    }

    public function destroy($id)
    {
        //
    }
}
