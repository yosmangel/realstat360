<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Demanda
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
        if (Auth::user()->demanda() == 2) {
            return $next($request);
        }else{
            abort(401); 
        }
    }
}
