<?php

namespace App\Http\Middleware;

use Closure;
use illuminate\Support\Facades\Auth;

class ControlAcceso
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
        $user = Auth::user();

        if (!Auth::guest()) {
            if (Auth::user()->rol == 2) {

                return redirect('/');
            }
            return $next($request);
        } else {
            return redirect('/login');
        }
    }
}