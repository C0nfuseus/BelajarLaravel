<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsTataUsaha
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
        if('LoggedUser' !== '2'){
            abort(403);
        }
        
        return $next($request);
    }
}
