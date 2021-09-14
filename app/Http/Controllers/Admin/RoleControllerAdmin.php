<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\UserRole;
use Illuminate\Http\Request;

class RoleControllerAdmin extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:browse_roles', ['only' => ['index']]);
    }
    public function index()
    {
        $roles = UserRole::all();
        return view('admin.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::orderBy('group_name')->get()->groupBy('group_name');
        return view('admin.roles.credit', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = UserRole::add($request->all());
        $data->save();
        $data->permissions()->sync($request->input('permissions', []));
        return redirect()->route('admin.roles.index')->with('success','Роль добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = UserRole::with('permissions')->where('id', $id)->first();
        $permissions = Permission::orderBy('group_name')->get()->groupBy('group_name');
        return view('admin.roles.credit',compact('data', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $data = UserRole::find($id);
        $data->edit($request->all());
        $data->save();
        $data->permissions()->sync($request->input('permissions', []));
        return redirect()->route('admin.roles.index')->with('success','Роль добавлена');
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
            $data = UserRole::find($item);
            $data->permissions()->detach();
            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Роли удалены');
        } else {
            return back()->with('success','Роль удалёна');
        }
    }
}
