<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\UserLoyalty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoyaltyControllerUser extends Controller
{
    protected $service;
    protected $orderService;
    protected $userService;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $loyalties = UserLoyalty::where('user_id',Auth::id())->latest()->get();
        $storeIds = UserLoyalty::where('user_id',Auth::id())->select('store_id')->get()->unique('store_id');
        return view('users.loyalty.index',compact('loyalties','storeIds'));
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
