<?php

namespace App\Http\Middleware;

use Closure;

class UserAuth
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
        if (\Auth::check()) {
            if(\Auth::user()->isDonatur() || \Auth::user()->isYayasan()){
                return $next($request);
            }
        }
        return redirect()->route('login')
                        ->with('alert-class', 'alert-danger')
                        ->with('flash_message','Login terlebih dahulu untuk mengakses halaman tersebut');
    }
}
