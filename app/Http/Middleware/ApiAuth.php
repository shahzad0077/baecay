<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {   
        if (Auth::guard('api')->check()) 
        {
            return $next($request);
        } else {

            return response()->json(['status' => false, "errors" => "Permission Denied"], 401);
        }

       // return $next($request);
    }
}
