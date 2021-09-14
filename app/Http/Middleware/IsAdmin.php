<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if(Auth::user() !== null and Auth::user()->role_id == User::ADMIN)
        {
            return $next($request);
        }
        return  back()->withInput();
    }
}
