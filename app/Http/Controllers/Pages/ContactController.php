<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Message;
use App\Models\ProductLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class ContactController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('pages.contacts.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = Message::add($request->all());
        $data->user_id = Auth::check() ? Auth::id() : null;
        $data->save();
        return back()->with('success','Спасибо! Мы перезвоним вам в ближайшее время.');
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
