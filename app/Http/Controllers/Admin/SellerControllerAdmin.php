<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserInfoSeller;
use App\Models\UserRole;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellerControllerAdmin extends Controller
{
    public function index()
    {
//        $users = User::all();
//        foreach ($users as $user)
//        {
//            if(UserInfoSeller::where('user_id',$user->id)->count() > 0)
//            {
//                $info = UserInfoSeller::where('user_id',$user->id)->first();
//                $user->phones = $info->phones;
//                $user->additional_phone = $info->additional_phone;
//                $user->additional_phone_additional = $info->additional_phone_additional;
//                $user->additional_phone_comment = $info->additional_phone_comment;
//                $user->additional_social = $info->additional_social;
//                $user->additional_social_value = $info->additional_social_value;
//                $user->save();
//            }
//        }

        $users = User::where('role_id',User::SELLER)
            ->select('id','role_id','status_id','email','company','sname','name','mname','phones','avatar','last_login_date','ip_address','seller_device_info','created_at','updated_at')
            ->with('role:id,title','stores:id,user_id,slug,title','status:id,color,title')
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.sellers.index',compact('users'));
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
        $stores = Store::where('user_id',$user->id)->select('id','slug','title')->get();
        return view('admin.sellers.credit',compact('user','roles','stores'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->edit($request->only('role_id','email','sname','name','mname','hcb_link'));
        $user->uploadDataImages($request->avatar, $name = 'avatar');
        $user->isBoolean($request,'isActive');
        $user->status_id = $user->isActive == true
            ? UserStatus::ACTIVE
            : UserStatus::LOCKED;
        $user->password = $request->password != null
            ? Hash::make($request->password)
            : $user->getOriginal('password');
        $user->save();

        return redirect()->route('admin.sellers.index')->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
