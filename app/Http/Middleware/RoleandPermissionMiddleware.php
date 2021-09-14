<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleandPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission = null)
    {
        // if(!auth()->user()->hasRole($role)) {
        //     abort(404);
        // }
        if($permission !== null && !auth()->user()->permission($permission)) {
            abort(404);
        }
        return $next($request);
    }
}
