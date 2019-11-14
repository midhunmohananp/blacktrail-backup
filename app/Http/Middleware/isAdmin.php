<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class isAdmin
{

    /*Constructor...*/
    
    public function __construct(Guard $auth) {
        $this->auth = $auth;
    }

    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
    public function handle($request, Closure $next)
    {

        $user = auth()->user();

        if (auth()->check() && $user->isAdmin()){
            return $next($request);
        }

        abort(403, 'You do not have permission to perform this action.');

    }

}
