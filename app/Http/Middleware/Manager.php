<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (\Auth::user()->role != 'manager' && \Auth::user()->role != 'Owner') {
            return Redirect::back()->withErrors(['You are not authorize']);
        }

        return $next($request);
    }
}
