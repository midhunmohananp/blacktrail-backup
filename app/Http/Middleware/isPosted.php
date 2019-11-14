<?php
namespace App\Http\Middleware;
use Closure;

class isPosted
{
     
  	public function __construct(Auth $auth){
  		$this->auth = $auth ; 
  	}



    public function handle($request, Closure $next)
    {
    	$user = $request->user()  ;
    	$authUser = $this->auth->user()->id ; 
    }
}
