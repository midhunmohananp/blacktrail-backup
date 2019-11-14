<?php

namespace App\Http\Middleware;

use Closure;

class Redirection
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
        $usersRole == auth()->user()->role_id;

        if ( $usersRole === 1 || $userRole === 2){

        }
    


    }



}
