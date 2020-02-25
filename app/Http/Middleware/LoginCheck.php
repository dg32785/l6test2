<?php

namespace App\Http\Middleware;

use Closure;

class LoginCheck
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
        $sessiondata = $request->session()->get('name');
        if(empty($sessiondata)){
            return redirect('/');
        }
        return $next($request);
    }
}
