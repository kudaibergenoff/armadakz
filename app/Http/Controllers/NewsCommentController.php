<?php

namespace App\Http\Controllers;

use App\Models\NewsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsCommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = NewsComment::add($request->all());
        $data->user_id = Auth::check() ? Auth::id() : null;
        $data->save();
        return back()->with('success','Комментарий добавлен');
    }

    public function show(NewsComment $newsComment)
    {
        //
    }

    public function edit(NewsComment $newsComment)
    {
        //
    }

    public function update(Request $request, NewsComment $newsComment)
    {
        //
    }

    public function destroy(NewsComment $newsComment)
    {
        //
    }
}
