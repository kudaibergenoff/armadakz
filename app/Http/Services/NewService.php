<?php


namespace App\Http\Services;


use App\Models\Catalog;
use App\Models\Item;
use App\Models\News;
use App\Models\NewStatus;
use App\Models\NewType;
use App\Models\Store;
use App\Models\Subcatalog;
use App\Models\UserRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class NewService
{
    public function getNews($store_ids = [])
    {
        $news = News::whereIn('store_id',$store_ids)
            ->with('status','type')
            ->latest()
            ->get();
        return $news;
    }

    public function getStores()
    {
        $storeQuery = (Auth::user()->role_id == UserRole::ADMIN and Route::is('admin.*'))
            ? Store::select('id','title')
            : Store::where('user_id',Auth::id())
                ->select('id','title');
        $stores = $storeQuery->get();
        return $stores;
    }

    public function getItems()
    {
        $items = Item::select('id','title','subcatalog_id')
            ->orderBy('title')
            ->get();
        return $items;
    }

    public function getSubcatalogs($item_ids)
    {
        $subcatalogs = Subcatalog::whereIn('id',$item_ids)
            ->orderBy('title')
            ->select('id','catalog_id','title')
            ->with('catalog:title')
            ->get();
        return $subcatalogs;
    }

    public function getCatalogs($subcatalogs)
    {
        $catalogs = Catalog::whereIn('id',$subcatalogs)
            ->where('isActive',1)
            ->orderBy('title')
            ->select('id','title')
            ->get();
        return $catalogs;
    }

    public function getTypes()
    {
        $types = NewType::where('is_active',true)
            ->select('id','title')
            ->get();
        return $types;
    }

    public function getStatus()
    {
        $status_ids = Auth::user()->role_id = UserRole::ADMIN
            ? NewStatus::pluck('id')
            : [NewStatus::MODERATION,NewStatus::DRAFT];
        $statuses = NewStatus::where('is_active',true)
            ->whereIn('id',$status_ids)
            ->select('id','title')
            ->get();
        return $statuses;
    }
}
