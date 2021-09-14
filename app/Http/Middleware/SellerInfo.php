<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class SellerInfo
{
    public function handle($request, Closure $next)
    {

        if((Auth::user()->role_id == User::ADMIN) or (Auth::user()->name != null and Auth::user()->sname != null and Auth::user()->phones != null))
        {
            return $next($request);
        }

        return  redirect()->route('seller.info')->withInput()->with('error','Для продолжения работы Вам необходимо заполнить профиль');
    }
}
