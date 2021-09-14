<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\ReviewStatus;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewControllerSeller extends Controller
{

    public function index()
    {
        $storeIds = Store::where('user_id',Auth::id())->pluck('id');
        $reviews = Review::whereIn('store_id',$storeIds)
            ->with('product','store','status')
//            ->orderBy('status_id')
            ->latest()
            ->get();

        $statuses = ReviewStatus::all();
        return view('sellers.reviews.index',compact('reviews','statuses'));
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
