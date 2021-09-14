<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Mailing;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionControllerAdmin extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.index',compact('subscriptions'));
    }

    public function sendMail(Request $request)
    {
        $data = Mailing::add($request->all());
        $data->user_id = Auth::id();
        $data->save();

        $emails = Subscription::pluck('email')->toArray();

        $this->service->sendMail($data,'subscriptionSendMail',$emails);

        return back()->with('success','Сообщение отправлено');
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
