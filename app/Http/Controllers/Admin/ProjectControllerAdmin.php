<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectControllerAdmin extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view('admin.pages.projects.index',compact('projects'));
    }

    public function create()
    {
        return view('admin.pages.projects.credit');
    }

    public function store(Request $request)
    {
        $data = Project::add($request->all());
        $data->user_id = Auth::id();
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->save();

        return redirect()->route('admin.projects.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Project::findOrFail($id);
        return view('admin.pages.projects.credit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Project::find($id);
        $data->edit($request->all());
        $data->uploadDataImages($request->images,'images');
        $data->isBoolean($request,'isActive');
        $data->save();

        return redirect()->route('admin.projects.index')->with('success','Информация сохранена');
    }

    public function destroy($id)
    {
        //
    }
}
