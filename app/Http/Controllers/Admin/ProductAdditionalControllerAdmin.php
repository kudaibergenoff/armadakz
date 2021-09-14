<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAdditional;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductAdditionalControllerAdmin extends Controller
{

    public function index($product_id)
    {
        $product = Product::find($product_id);
        $additionals = ProductAdditional::where('product_id',$product_id)
            ->get();
        return view('admin.productAdditional.index',compact('product','additionals'));
    }

    public function create($product_id)
    {
        $product = Product::find($product_id);
        $sellerId = Store::find($product->store_id)->user_id;
        $storeIds = Store::where('user_id',$sellerId)
            ->pluck('id');
        $products = Product::whereIn('store_id',$storeIds)
            ->where('id','!=',$product_id)
            ->select('id','title','price')
            ->get();
        return view('admin.productAdditional.credit',compact('product','products'));
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
