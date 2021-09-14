<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsVendor
{
    public function handle($request, Closure $next)
    {
        if(Auth::user() !== null and Auth::user()->role_id != 1)
        {
            return $next($request);
        }
        return  back()->withInput();
    }
}
