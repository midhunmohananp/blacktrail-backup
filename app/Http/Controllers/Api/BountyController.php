<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utilities\ConvertsCurrencies ;
use App\Criminal ; 
use DB ; 
use App\CriminalInfo ;

class BountyController extends Controller
{
		use ConvertsCurrencies;
		/*** Used for updating the bounty of the criminal based from USD
		*/

		public function update_the_bounty_of_the_criminal(){
		/*
		array:1 [
		"params" => array:3 [
		"total_amount" => "2.37"
		"criminal_id" => 3
		"used_currency" => "YER"
		]
		]	
		*/


			$items = collect(request()->all());
			$amount = floatval($items->get('params')['total_amount']);
			$criminal_id = intval($items->get('params')['criminal_id']);
			$to_currency = $items->get('params')['used_currency'];	
			
			$apiKey 					=			$this->currencyApiKey() ; 
			$payment_currency   		= 			urlencode("USD");
			$to_currency_code  	        = 			urlencode($to_currency);
			
			// /*this one's going fine..*/
			if ( $to_currency == "USD"){
				// update it right away..

				$criminal = DB::table('criminal_profiles')->where('criminal_id',$criminal_id)->increment('bounty', $amount);
	
				return response()->json([
					'criminal' => $criminal_id ,
					'amount' => $amount,
					'currency' => "USD"
				]); 


		/*	// return response("It's a USD");
			$criminal = \App\CriminalInfo::findOrFailById($criminal_id); 	
			$criminal->bounty += $amount ;
			$criminal->save();*/
			// return response()->json($criminal);

			/*dump("Criminals...");
			dd($criminal);*/

		}
		else {
			// dump("non usd..");
			// dd(request()->all());

			$query 	=  str_replace('"','',$payment_currency)."_".str_replace('"','',$to_currency_code);
			$ch = curl_init();

			$options = [
				CURLOPT_URL => "https://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=ultra&apiKey=$apiKey",
				CURLOPT_RETURNTRANSFER => true
			]; 

			curl_setopt_array($ch, $options);
			
			$response =	curl_exec($ch) ;
			
			$info = json_decode($response);
			
			$rate = $info->$query ;
				
			$total = $rate * $amount ;
			// return response($total) ; 

			$criminal = DB::table('criminal_profiles')->where('criminal_id',$criminal_id)->increment('bounty', $total);

			return response()->json([
				'criminal_id' => $criminal_id,
				'criminal' => $criminal ,
				'total_amount' => $total
			]); 

		}

		// DB::table("criminal_profiles")


		/*if (request()->wantsJson()){
			return response()->json([201,'The Total Amount from '.$amount." ".$payment_currency . " would be :".$total." ".$to_currency_code]); 
		}*/
		// return response()->json($value);

		/*some of the params are in here..*/
	
		/*
			$criminal_info = CriminalInfo::findOrFailById($criminal_id) ;
			$criminal_info->bounty += $amo
		*/
	}



	public function test(){
		$amount = 10 ; 
		$criminal_id = 3 ; 
		$from_currency = "USD";
		$val = $this->testing_convert_currency($amount, $criminal_id, $from_currency);
		dd($val);
	}


	/*
	================================================
	Used for updating criminal bounty
	using FREE_CURRENCY_CONVERTER API
	-> works fine..
	================================================
	*/
	public function updateCriminalBounty()
	{	
		$this->validate(request(), [ 
			'form.offerBounty'			=>  'required|numeric',
			'form.currencyCode'		    =>  'required|string',
			'form.toCurrencyCode'   	=>  'required|string',
			'form.criminalId' 			=>  'required|numeric',
		]);

		// convert the offerBounty amount to like 100$ USD to EUR / toCurrency variable

		$amount  = request()->input("form.offerBounty");
		$currencyCode = request()->input("form.currencyCode");
		$toCurrency = request()->input("form.toCurrencyCode");
		
		$criminal_id = request()->input("form.criminalId");

		// if aren't of the same currency
		if ( $currencyCode != $toCurrency){
			$totalValue =  $this->convertCurrency($amount, $currencyCode, $toCurrency);
		}
		
		else { 
			$totalValue = $amount ; 	
		}

		$responseVal = 'The Total Amount from '.$amount." ".$currencyCode.'would be : '.$totalValue." ".$toCurrency; 
		
		
		if (request()->wantsJson()) {
			return response($responseVal,201);
		}

		// return $responseVal ; 

		// $criminal = Criminal::with('profile')->findOrFail($criminal_id);

		// $criminal = Criminal::with('profile')->find($criminal_id); 


		// $criminal->profile()->update([
		// 	'bounty' => $criminal->profile->bounty + $totalValue
		// ]);

/*		$criminal->profile->bounty += $totalValue ; 
		$criminal->profile->save();
*/
		// $criminal->profile->update([
		// 	'bounty' => $criminal->profile->bounty + $totalValue
		// ]);

		// DB::table('criminal_profiles')
		// ->where('criminal_id', )
		// ->update(['options->enabled' => true]);


		// $criminal->save();


		if (request()->wantsJson()){
			return response()->json([$totalValue,$criminal]) ;
		}

	}






		// $totalValue += 

			// returns the amount representation of the response..


		// find the criminal who has the criminalId of like $criminal_id 

/*

	if ( request()->wantsJson()){
		return response()->json($totalValue);
	}
*/

		// storing in array
		// $formField = [ 
		// 	'amount' 		 => $amount,
		// 	'currency_code ' => $currencyCode,
		// 	'toCurrency '    => $toCurrency,
		// 	'criminal_id'    => $criminal_id
		// ]; 

		// $response = json_encode($formField);

		// $criminal = Criminal::findOrFail($criminal_id);

		// $criminal->profile->bounty += 

		// $criminal->profile()->update([
		// 	'bounty' => 
		// ]);
}
