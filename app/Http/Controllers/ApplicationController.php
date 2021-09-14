<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Services\Service;
use App\Models\Application;
use App\Models\ProductLike;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class ApplicationController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;

        $likesCount = Auth::check()
            ? ProductLike::where('user_id',Auth::id())
                ->count()
            : (Cache::has('productLikes')
                ? count(Cache::get('productLikes'))
                    ->count()
                : null);

        View::share(['likesCount'=>$likesCount]);
    }
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(ApplicationRequest $request)
    {
        $data = Application::add($request->all());
        $data->isBoolean($request,'ad_type1');
        $data->isBoolean($request,'ad_type2');
        $data->isBoolean($request,'ad_type3');
        $data->save();

        //$this->service->sendMail($data,'newApplication'); // отправка писем админам

        return back()->with('success',$request->ad_type1.'|'.$request->ad_type2.'|'.$request->ad_type3.'|'.'Заявка подана. Мы с Вами свяжемся');
    }

    public function show(Application $application)
    {
        //
    }

    public function edit(Application $application)
    {
        //
    }

    public function update(Request $request, Application $application)
    {
        //
    }

    public function destroy(Application $application)
    {
        //
    }
}
