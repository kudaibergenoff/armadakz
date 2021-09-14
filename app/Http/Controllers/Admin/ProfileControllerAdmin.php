<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\user\UserService;
use App\Models\Lang;
use App\Models\Sex;
use App\Models\UserInfoSeller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileControllerAdmin extends Controller
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
        $langs = Lang::select('id','slug','title_ru')
            ->orderBy('title_ru')
            ->get();
        return view('admin.profile.index',compact('user','sexes','langs'));
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
        //
    }

    public function update(Request $request, $id)
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
            $user = Auth::user();
            $user->email = $request->email;
            $user->save();
            // сделать отправку письма
        }
        $data->save();
        return back()->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
