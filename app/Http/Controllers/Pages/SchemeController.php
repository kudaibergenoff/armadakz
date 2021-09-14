<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Services\Service;
use App\Models\Map;
use App\Models\ProductLike;
use App\Models\Store;
use Faker\Calculator\Ean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;

class SchemeController extends Controller
{
    protected $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $stores = Store::select('id','slug','title','mini_img','logo','phones','work_times')->get();
        $maps = Map::select('store_id','map_id')->get();
        return view('pages.scheme.index',compact('stores','maps'));
    }

    public function search(Request $request)
    {
        if($request->get('s')) {
            $stores = Store::where('isActive', 1)->where('search_tags', 'LIKE', '%'.$request->get('s').'%')->orWhere('search_map_tags', 'LIKE', '%'.$request->get('s').'%')->orWhere('title', 'LIKE', '%'.$request->get('s').'%')->select('id','slug','title','mini_img','mini_desc','logo','phones','work_times')->get();
            return response()->json(['stores' => $stores]);
        }
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
        //
    }
}
