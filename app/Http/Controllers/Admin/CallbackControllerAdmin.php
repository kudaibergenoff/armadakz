<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Callback;
use Illuminate\Http\Request;

class CallbackControllerAdmin extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $callbacks = Callback::with('product:id,slug,title')
            ->latest()->get();
        return view('admin.callback.index',compact('callbacks'));
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
        $id = explode(',', $id);

        if(!is_array($id))
        {
            $id[] = $id;
        }

        foreach ($id as $item)
        {
            $data = Callback::find($item);

            $data->delete();
        }

        if(count($id) > 1) {
            return redirect()->route('admin.callback.index')->with('success','Обращения удалены');
        } else {
            return redirect()->route('admin.callback.index')->with('success','Обращение удалено');
        }
    }
}
