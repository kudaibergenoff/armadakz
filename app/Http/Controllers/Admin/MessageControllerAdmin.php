<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageControllerAdmin extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('admin.messages.index',compact('messages'));
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
            $data = Message::find($item);

            $data->delete();
        }

        if(count($id) > 1) {
            return redirect()->route('admin.messages.index')->with('success','Сообщения удалены');
        } else {
            return redirect()->route('admin.messages.index')->with('success','Сообщение удалено');
        }
    }
}
