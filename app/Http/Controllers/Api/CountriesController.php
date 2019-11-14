<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilities\ConvertsCurrencies ;
use App\Country ; 

class CountriesController extends Controller
{

	use ConvertsCurrencies ; 
	
	public function getAllCurrencies(){
		$currencies = Country::select("id","name","currency_code","currency","currency_symbol")->get();

		return $currencies->toArray(); 
	}

	public function convert_currency_to_usd(){
		$this->validate(request(), [ 
			'form.amount' => 'required|numeric',	
			'form.from_currency' => 'required',	
			'form.to_currency' => 'required'			
		]);

	}


	public function getCountryById($id)
	{
		
	}

}
