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
        if(!session()->has('user_id')){
            if($request->ajax())
                returnJson(302,'登录超时');
            else
                header('Location:/login');
            exit;
        }
        else
            return $next($request);
    }

}
