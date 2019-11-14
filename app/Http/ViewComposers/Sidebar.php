<?php 

namespace App\Http\ViewComposers;

use App\Country ; 

use Illuminate\View\View;

class Sidebar { 

	public function compose(View $view)
	{
		if (auth()->check()){
			$displayName = auth()->user()->display_name ; 
		}
		else {
			$displayName = '';
		}	
		$view->with(['displayName'=> $displayName ]);
	}



}
