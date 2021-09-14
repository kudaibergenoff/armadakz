<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\BannerService;
use App\Http\Services\Service;
use App\Models\Banner;
use App\Models\BannerType;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerControllerAdmin extends Controller
{
    protected $service;
    protected $bannerService;

    public function __construct(Service $service,BannerService $bannerService)
    {
        $this->service = $service;
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        $banners = Banner::with('type')->get();
        return view('admin.banners.index',compact('banners'));
    }

    public function create()
    {
        $stores = Store::whereNotNull('title')
            ->select('id','title')
            ->orderBy('title')
            ->get();

        $storesArray = [];

        foreach ($stores as $store) {
            $storesArray[$store->id] = $store->title;
        }

        $types = BannerType::isActive()->get();
        return view('admin.banners.credit',compact('types','storesArray'));
    }

    public function store(Request $request)
    {
        $data = Banner::add($request->all());
        $data->start_at = Str::before($request->period, ' - ');//$this->bannerService->dateStart($request->period);
        $data->end_at = Str::after($request->period, ' - ');
        $data->uploadDataImage($request->images_1920x550, 'images_1920x550','jpeg','banners');
        $data->uploadDataImage($request->images_1580x550, 'images_1580x550','jpeg','banners');
        $data->uploadDataImage($request->images_1280x450, 'images_1280x450','jpeg','banners');
        $data->uploadDataImage($request->images_1024x450, 'images_1024x450','jpeg','banners');
        $data->uploadDataImage($request->images_768x495, 'images_768x495','jpeg','banners');
        $data->uploadDataImage($request->images_576x350, 'images_576x350','jpeg','banners');
        $data->isBoolean($request,'archive');
        $data->isBoolean($request,'pause');
//        dd(123);
        $data->save();

        return redirect()->route('admin.banners.index')->with('success','Информация сохранена');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = Banner::find($id);
        $types = BannerType::isActive()->get();
        $stores = Store::whereNotNull('title')
            ->select('id','title')
            ->orderBy('title')
            ->get();

        $storesArray = [];

        foreach ($stores as $store) {
            $storesArray[$store->id] = $store->title;
        }

        return view('admin.banners.credit',compact('data','types', 'storesArray'));
    }

    public function update(Request $request, $id)
    {
        $data = Banner::find($id);
        $data->edit($request->all());
        $data->start_at = $this->bannerService->dateStart($data,$request->period);
        $data->end_at = $this->bannerService->dateend($data,$request->period);
        $data->uploadDataImage($request->images_1920x550, 'images_1920x550','jpeg','banners');
        $data->uploadDataImage($request->images_1580x550, 'images_1580x550','jpeg','banners');
        $data->uploadDataImage($request->images_1280x450, 'images_1280x450','jpeg','banners');
        $data->uploadDataImage($request->images_1024x450, 'images_1024x450','jpeg','banners');
        $data->uploadDataImage($request->images_768x495, 'images_768x495','jpeg','banners');
        $data->uploadDataImage($request->images_576x350, 'images_576x350','jpeg','banners');
        $data->isBoolean($request,'archive');
        $data->isBoolean($request,'pause');
        $data->save();

        return redirect()->route('admin.banners.index')->with('success','Информация сохранена');
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
            $data = Banner::find($item);

            $data->delete();
        }

        if(count($id) > 1) {
            return back()->with('success','Банера удалены');
        } else {
            return back()->with('success','Банер удалён');
        }
    }
}
