<?php

namespace App\Http\Services;

use App\Mail\AddComment;
use App\Mail\AddNew;
use App\Mail\AddNnewComment;
use App\Mail\AddStore;
use App\Mail\EditStore;
use App\Mail\NewApplication;
use App\Mail\SubscriptionSendMail;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\PopularItem;
use App\Models\ProductLike;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Service
{
    public static function likeIds()
    {
        $likeIds = ProductLike::where('user_id',Auth::id())->pluck('product_id')->toArray();
        return $likeIds;
    }

    public static function likesCount()
    {
//        if(Auth::check())
//        {
//            $likesCount = ProductLike::where('user_id',Auth::id())->count();
//        }
//        else
//        {
////            dd(Cache::has('productLikes'));
//            $likesCount = Cache::has('productLikes') ? count(Cache::get('productLikes')) : null;
//        }
        $likesCount = ProductLike::where('user_id',Auth::id())->count();
        return $likesCount;
    }

    public function popular_items($data,$model)
    {
        if($data->is_popular == true)
        {
            $popular = PopularItem::firstOrNew(['model'=>$model,'model_id'=>$data->id]);
            $popular->title = $data->title;
            $popular->slug = $data->slug;
            $popular->images = $data->images;
            $popular->save();
        }
        else
        {
            $popular = PopularItem::where('model',$model)->where('model_id',$data->id)->first();
            if($popular != null)
            {
                $popular->delete();
            }
        }
    }

    public static function userBasket()
    {
        $userBasket = Auth::check()
            ? Order::where('user_id',Auth::id())
                    ->where('status_id',OrderStatus::BASKET)
                    ->select('product_id','title','image','articul','price','price_2','store_id','store_title','color','count')
                    ->get()
            : Order::where('status_id',1234567890)
                ->get();
        return $userBasket;
    }

    public function ifNotAdmin($data)
    {
        if($data->user_id == 0 and $data->store->user_id != Auth::id() and $data->user_id != Auth::id() and Auth::user()->role_id != User::ADMIN)
        {
            return back()->with('error','У Вас нет прав для редактирования данной записи')->send();
        }
    }

    public function filterId($data,$idName)
    {
        if(isset($_GET[$idName]) and is_numeric($_GET[$idName]))
        {
            $query = $data->where($idName,$_GET[$idName]);
        }

        return (isset($query) and $query->count() > 0) ? $query : $data;
    }

    public function filterParentId($data,$parent,$idParentName,$idName)
    {
        if(isset($_GET[$idParentName]) and is_numeric($_GET[$idParentName]))
        {
            $parentIds = $parent->where($idParentName,$_GET[$idParentName])->pluck('id');
            $query = $query = $data->whereIn($idName,$parentIds);
        }

        return (isset($query) and $query->count() > 0) ? $query : $data;
    }

    public function sendMail($data,$mailName,array $emails = null)
    {
        if (!App::environment('local'))
        {
            if($emails == null)
            {
                $emails = User::where('role_id',UserRole::ADMIN)->pluck('email');
            }

            foreach ($emails as $email)
            {
                if(Str::contains($email, '@'))
                {
                    switch ($mailName) {
                        case 'add':
                            Mail::to($email)->send(new AddStore($data));
                            break;
                        case 'edit':
                            Mail::to($email)->send(new EditStore($data));
                            break;
                        case 'newApplication':
                            Mail::to($email)->send(new NewApplication($data));
                            break;
                        case 'subscriptionSendMail':
                            Mail::to($email)->send(new SubscriptionSendMail($data));
                            break;
                        case 'newComment':
                            Mail::to($email)->send(new AddComment($data));
                            break;
                        case 'addNewComment':
                            Mail::to($email)->send(new AddNnewComment($data));
                            break;
                        case 'addNew':
                            Mail::to($email)->send(new AddNew($data));
                            break;
                    }
                }
            }
        }
    }

    public function loginUser()
    {
        if (Auth::check() and Auth::user()->role_id == User::ADMIN and isset($_GET['login'])) // вход под другим юзером
        {
            Auth::loginUsingId($_GET['login']);
        }
    }
}
