<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminControllerAdmin extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:browse_admins', ['only' => ['index']]);
    }

    public function index()
    {
        $users = User::where('role_id',User::ADMIN)
            ->select('id','role_id','status_id','lang_id','sname','name','mname','avatar','email','created_at','updated_at')
            ->with('role:id,title','lang:id,slug,title_ru')
            ->get();
        return view('admin.admins.index',compact('users'));
    }

    public function create()
    {
        $langs = Lang::select('id','title_ru')->get();
        $roles = UserRole::all();
        return view('admin.admins.credit',compact('langs','roles'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($admin_id)
    {
        $user = User::find($admin_id);
        $langs = Lang::select('id','slug','title_ru')->orderBy('title_ru')->get();
        $roles = UserRole::all();
        return view('admin.admins.credit',compact('user','langs','roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->edit($request->only('role_id','email','sname','name','mname','lang_id'));
        $user->uploadDataImages($request->avatar, $name = 'avatar');
        $user->isBoolean($request,'isActive');
        $user->status_id = $user->isActive == true
            ? UserStatus::ACTIVE
            : UserStatus::LOCKED;
        $user->password = $request->password != null
            ? Hash::make($request->password)
            : $user->getOriginal('password');
        $user->save();

        return redirect()->route('admin.admins.index')->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
