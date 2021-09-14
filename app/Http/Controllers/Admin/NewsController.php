<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(25);

        return view('admin.news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = News::add($request->all());
        $news->uploadImage($request->file('image'));
        $news->save();

        return redirect()->route('admin.news.index')->with('success','Новину збережено');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news = News::where('id',$news->id)->first();
        //dd($request->file('image'));
        $news->update($request->all());
        $news->uploadImage($request->file('image'));
        $news->save();

        return redirect()->route('admin.news.index')->with('success','Новость сохранена');
    }

    public function quickUpdate(Request $request,$id)
    {
        $news = News::where('id',$id->id)->first();
        $news->update($request->all());
        $news->save();

        return redirect()->route('admin.news.index')->with('success','Новость сохранена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        News::find($news->id)->delete();
        return redirect()->route('admin.news.index')->with('success','Новину видалено');
    }
}
