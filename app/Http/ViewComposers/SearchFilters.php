<?php 
namespace App\Http\ViewComposers;
use App\Country ; 
use Illuminate\View\View;

class SearchFilters { 

	public function compose(View $view)
	{
		$countries = Country::select("name","id")->get();
		$view->with(['countries' => $countries]);
	}

}
