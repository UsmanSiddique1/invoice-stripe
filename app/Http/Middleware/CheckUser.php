<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
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

        $CheckUser = Auth::user()->role;
       
        if ($CheckUser == 'admin') {

            return redirect('/admin-dashboard');
            
        }
        else{

            return redirect('/team-dashboard');
        }

        abort(403, 'Access denied');
    }
}
