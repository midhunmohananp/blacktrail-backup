<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Criminal ;
use App\Utilities\ConvertsCurrencies ;


class CurrencyController extends Controller
{
	use ConvertsCurrencies;

	/*passed already*/
	public function currencyConvert()
	{
		$this->validate(request(), [ 	
			'form.criminal_id' => 'required|numeric',		
			'form.amount' => 'required|numeric',	
			'form.fromCurrency' => 'required',	
			'form.toCurrency' => 'required'			
		]);

		$fromCurrency = request()->input("form.fromCurrency");
		$toCurrency = request()->input("form.toCurrency");
		$amount = request()->input("form.amount");

		abort_if($fromCurrency === $toCurrency, 403);

		$totalAmount =  $this->convertCurrency($amount,$fromCurrency,$toCurrency);
		
		return $totalAmount ;

	}

	protected function currencyApiKey(){
		return "215b7d3ba79929490e93"; 
	}

	/*
    	returns value in USD..
	*/
    	public function convert_currency_to_usd()
    	{
    		$apiKey 	  		 =	  $this->currencyApiKey() ; 
    		$offer_bounty  		 =    request("offer_bounty");
			$from_currency_code  =    request("from_currency_code"); // PHP
			$to_currency_code    =    request("to_currency_code"); //  PHP  / TTD 
			$criminal_id 		 = 	  request('criminal_id');

		// if not equal ang duha ka currency.
		if ( $from_currency_code != $to_currency_code){
		// then convert the currency to US Dollars..
			$apiKey 				=			$this->currencyApiKey() ; 
			$from_currency 			=			urlencode($from_currency_code);
			$to_currency   	        = 			urlencode($to_currency_code);
			$payment_currency   	= 			urlencode("USD");
			$query 		 			= 			str_replace('"','',$from_currency)."_".str_replace('"','',$payment_currency);


			$ch = curl_init();

			$options = [
				CURLOPT_URL => "https://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=ultra&apiKey=$apiKey",
				CURLOPT_RETURNTRANSFER => true
			]; 

			curl_setopt_array($ch, $options);

			$response =	curl_exec($ch) ;

			$info = json_decode($response);
			$rate = $info->$query ;	
			$total = $rate * $offer_bounty ; 

			if (request()->wantsJson()){
				return response()->json([201,'The Total Amount from '.$offer_bounty." ".$from_currency_code . " would be :".$total." ".$to_currency_code]); 
			}

			return $total ; 
		}

		else {
			$amount_in_usd = $offer_bounty ; 
			return $amount_in_usd ; 
		}

		// $this->convert_usd_to_the_currency_used_for_the_criminal($from_currency, $total, $criminal_id); 


/*
		$amount = $offer_bounty ; 
		$ch       =  curl_init();

		$options = [
			CURLOPT_URL => "https://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=ultra&apiKey=$apiKey",
			CURLOPT_RETURNTRANSFER => true
		]; 

		curl_setopt_array($ch, $options);

		$response =	curl_exec($ch) ;
		$info = json_decode($response);
		$rate = $info->$query ;
		$total = $rate * $amount ; 

		if ( request()->wantsJson() ){
			return response()->json([201,'The Total Amount from '.$amount." ".$fromCurrency . " would be :".$total." ".$toCurrency]); 
		}*/



		// abort_if($from_currency === $to_currency, 403);
		// $amount_in_usd = $this->convert_currency_in_usd($offer_bounty, $from_currency, $to_currency);
		
		// dd($amount_in_usd);	

	}

	public function convert_usd_to_the_currency_used_for_the_criminal($from_currency, $to_currency,  $amount_val, $criminal_id){
		
		$criminal = Criminal::findOrFail($criminal_id); 

		// $this->convert_usd_to_the_currency_used($);
		// dd($criminal);


	}

	public function convertCurrencyPage()
	{
		$currencies = \App\Country::select("id","name","currency_code","currency","currency_symbol")
		->distinct("currency_code")
		->get();

		$criminal = Criminal::with("profile")->pluck('id')->first();

		return view('convert-currency',[
			'currencies' => $currencies,
			'criminal' => $criminal
		]);
	}






}
