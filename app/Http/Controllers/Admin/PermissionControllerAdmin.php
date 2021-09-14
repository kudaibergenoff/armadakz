<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionControllerAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $permissions = Permission::select('id', 'group_name', 'display_name')->orderBy('group_name')->get();

        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.credit');
    }

    public function store(Request $request)
    {
        $permission = Permission::create($request->all());

        return redirect()->route('admin.permissions.index')->with('success','Разрешение добавлена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Permission::findOrFail($id);
        return view('admin.permissions.credit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Permission::find($id);
        $data->fill($request->all());
        $data->save();
        return redirect()->route('admin.permissions.index')->with('success','Разрешение добавлена');
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
            $data = Permission::find($item);
            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Разрешения удалены');
        } else {
            return back()->with('success','Разрешение удалёна');
        }
    }
}
