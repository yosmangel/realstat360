<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Profesionales
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
        if (Auth::user()->profesional() == 1) {
            return $next($request);
        }else{
            abort(401);
        }
    }
}
