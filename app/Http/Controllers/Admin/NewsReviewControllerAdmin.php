<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\NewsComment;
use App\Models\ReviewStatus;
use Illuminate\Http\Request;

class NewsReviewControllerAdmin extends Controller
{
    public function index()
    {
        $reviews = NewsComment::with('news', 'status')
            ->latest()
            ->get();

        $statuses = ReviewStatus::where('id','!=',ReviewStatus::NEW)->get();
        return view('admin.reviews_news.index', compact('reviews', 'statuses'));
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
        $review = NewsComment::find($id);
        $review->update($request->all());
        $review->save();
        return back()->with('success', 'Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
