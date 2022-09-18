<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class PerssionMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            if (Auth::guard('web')->user()->user_role_id == 1 || Auth::guard('web')->user()->user_role_id == 2|| Auth::guard('web')->user()->user_role_id == 3){
                return $next($request);
            }
        }
        return redirect()->route('admin.dashboard')->with('error',"You don't have access to that section"); 
    }

}
