<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ReviewStatus;
use App\Models\Store;
use Illuminate\Http\Request;

class ReviewControllerAdmin extends Controller
{
    public function index()
    {
        $reviews = Review::with('product','store','status')
            ->latest()
            ->get();

        $statuses = ReviewStatus::all();
        return view('admin.reviews.index',compact('reviews','statuses'));
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
        $review = Review::find($id);
        $review->update($request->all());
        $review->save();
        return back()->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
