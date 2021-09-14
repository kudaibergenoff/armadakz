<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Services\user\UserService;
use App\Models\Sex;
use App\Models\UserInfoSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoControllerSeller extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $user = Auth::user();
        $sexes = Sex::all();
        return view('sellers.personal_data.index',compact('user','sexes'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(UserInfoSeller $userInfo)
    {
        //
    }

    public function edit(UserInfoSeller $userInfo)
    {
        //
    }


    public function update(Request $request)
    {
        $data = Auth::user();
        $data->edit($request->all());

        if($request->has('images') and array_filter($request->images) != null)
        {
            $data->uploadDataImages($request->images,'avatar');
        }
        foreach (['phones','additional_phone','additional_phone_additional','additional_phone_comment','additional_social','additional_social_value'] as $name)
        {
            $data->$name = $this->userService->intoArray($request,$name);
        }

        if($request->has('email') and $request->email != Auth::user()->email)
        {
            $data->email = $request->email;
            // сделать отправку письма
        }
        $data->save();
        return back()->with('success','Информация изменена');
    }

    public function destroy(UserInfoSeller $userInfo)
    {
        //
    }
}
