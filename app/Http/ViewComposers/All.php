<?php 
namespace App\Http\ViewComposers;
use App\Country ; 
use Illuminate\View\View;

class All { 

	public function compose(View $view)
	{
		if (auth()->check()){
			$displayName = auth()->user()->display_name ; 
			$user_id = auth()->user()->id ; 
		}
		else {
			$displayName = '';
			$user_id = null;
		}
		
		$view->with([
					'displayName'	=> $displayName ,
					'user_id'	=>  $user_id
		]);
	
	}
}
