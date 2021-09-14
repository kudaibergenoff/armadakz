<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControllerAdmin extends Controller
{
    public function index()
    {
        $users = User::where('role_id',User::USER)
            ->select('id','role_id','status_id','sname','name','mname','phones','avatar','email','created_at','updated_at')
            ->with('role:id,title','city:id,title_ru','status:id,color,title')
            ->withCount('orders')
            ->latest()
            ->get();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = UserRole::all();
        return view('admin.users.credit',compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->edit($request->only('role_id','email','sname','name','mname'));
        $user->uploadDataImages($request->avatar, $name = 'avatar');
        $user->isBoolean($request,'isActive');
        $user->status_id = $user->isActive == true
            ? UserStatus::ACTIVE
            : UserStatus::LOCKED;
        $user->password = $request->password != null
            ? Hash::make($request->password)
            : $user->getOriginal('password');
        $user->save();

        return redirect()->route('admin.users.index')->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
