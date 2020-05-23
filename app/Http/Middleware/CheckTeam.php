<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckTeam
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
         $checkadmin = Auth::user()->role;
        if ($checkadmin == 'team') {
            
            return $next($request);
        }

       return abort(401);
    }
}
