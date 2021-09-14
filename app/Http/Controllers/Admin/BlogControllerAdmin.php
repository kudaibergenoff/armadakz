<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogControllerAdmin extends Controller
{

    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.index',compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.credit');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($blog_id)
    {
        $blog = Blog::find($blog_id);
        return view('admin.blogs.credit',compact('blog'));
    }

    public function update(Request $request, $blog_id)
    {
        //
    }

    public function destroy($blog_id)
    {
        //
    }
}
