<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class manager_encoder
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check())
        {
            if(auth()->user()->role== 'encoder' || auth()->user()->role== 'manager'){
                return $next($request);
            }
            abort(403,"Sorry!! Access denied");
        }
        abort(403,"Sorry!! You need to log in in order to access this page.");
    }
}
