<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Map;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\Application;
use App\Models\Banner;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeControllerAdmin extends Controller
{
    public function home()
    {
        if (Auth::check() and Auth::user()->role_id == User::ADMIN and isset($_GET['login'])) // вход под другим юзером
        {
            Auth::loginUsingId($_GET['login']);
        }

        $adminsCount = User::where('role_id',User::ADMIN)->count();
        $sellersCount = User::where('role_id',User::SELLER)->count();
        $usersCount = User::where('role_id',User::USER)->count();
        $productsCount = Product::count();
        $reviewsCount = Review::count();
        $applicationsCount = Application::count();
        $bannersCount = Banner::count();
        $ordersCount = Order::count();
        $newsCount = News::count();
        $mapsCount = Map::count();

        return view('admin.home.index',compact('adminsCount','sellersCount','applicationsCount','reviewsCount','usersCount','bannersCount',
            'productsCount','ordersCount','newsCount','mapsCount'));
    }
}
