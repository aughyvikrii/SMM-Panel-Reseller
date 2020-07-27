<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$type=true)
    {
        $isLogin = Auth::check() ? 'true' : 'false';
        // return $next($request);
        if( $isLogin == $type ) {
            return $next($request);
        }
        else {
            return redirect('auth/login');
        }
    }
}
