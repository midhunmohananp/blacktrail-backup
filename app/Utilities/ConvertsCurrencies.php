<?php 
namespace App\Utilities ; 
use App\CriminalInfo;
use DB ; 


trait ConvertsCurrencies { 

	public function testing_convert_currency($amount, $criminal_id, $to_currency){
		$criminal_info = CriminalInfo::findOrFailById($criminal_id);
		$criminal_info->bounty += $amount; 
		$criminal->save();
			// return $criminal_info ; 
	}

	protected function fixerApiKey(){
		return 'afe7604860ac85fdd8bd7296a4d808dd';
	}

	public function testConvert(){
		echo $this->convertCurrency(10,'USD','PHP');
	}				

	protected function currencyApiKey(){
		return "215b7d3ba79929490e93"; 
	}

	public function convert_currency_to_usd()
	{
		$apiKey 		=	$this->currencyApiKey() ; 
		$to_currency_code = request("to_currency_code");
		$toCurrency   	= 	urlencode("USD");
		$query 		 	= 	str_replace('"','',$fromCurrency)."_".str_replace('"','',$toCurrency);

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
		}

		return $total ; 

	}


	public function update_bounty_from_usd_to_original_currency($amount, $criminal_id, $to_currency){
	
	}
/*converting currency with curren*/
	public function convertCurrencyWithCurrencyLayer($amount){
		// / set API Endpoint, access key, required parameters
		$endpoint = 'convert';
		
		$access_key = env('API_CURRENCY_LAYER');
		
		$from = 'USD';	
		$to = 'EUR';
		$amount = 10;
// initialize CURL:
		$ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');   
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// get the (still encoded) JSON data:
		$json = curl_exec($ch);
		curl_close($ch);
// Decode JSON response:
		$conversionResult = json_decode($json, true);
// access the conversion result
		echo $conversionResult['result'];

	}




	public function accessRealTimeExchangeRates()
	{

// set API Endpoint and access key (and any options of your choice)
		$endpoint = 'live';
		$access_key = 'YOUR_ACCESS_KEY';
// Initialize CURL:
		$ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'');

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
		$json = curl_exec($ch);
		curl_close($ch);

// Decode JSON response:
		$exchangeRates = json_decode($json, true);

// Access the exchange rate values, e.g. GBP:
		echo $exchangeRates['quotes']['USDGBP'];

	}

	public function convert_currency_in_usd($offer_bounty, $from_currency, $to_currency){
		$apiKey 		=	$this->currencyApiKey() ; 
		$fromCurrency 	=	urlencode($from_currency);
		$toCurrency   	= 	urlencode($to_currency);
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
		}

		return $total ; 

	}


// https://free.currencyconverterapi.com/api/v6/convert?q=USD_EUR,EUR_USD&compact=ultra&apiKey=215b7d3ba79929490e93
	public function convertCurrency($amount,$fromCurrency,$toCurrency){
		$apiKey 		=	$this->currencyApiKey() ; 
		$fromCurrency 	=	urlencode($fromCurrency);
		$toCurrency   	= 	urlencode($toCurrency);
		$query 		 	= 	str_replace('"','',$fromCurrency)."_".str_replace('"','',$toCurrency);
// dd($query);

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
		}

		return $total ; 

		
		// return response($response);
		// print_r($total);



		// dd($response);


		// curl_close($ch) ;


		// $response = json_decode($response, true);
		// $rate = $response[$string];
		
		// $total = $rate * $amount ; 


		// print_r($total);
		// $response = json_decode($response,true) ;
		
		// $rate  = $response[$string];
		
		// $total = $rate * $amount ; 

		// echo "$amount $from  = $total $to";

		// print_r($response);


		// return $query ; 

		// $json = urlencode("https://free.currencyconverterapi.com/api/v6/convert?q={$query}&compact=ultra&apiKey={$apiKey}");
		
		// $obj = json_decode($json, true);

		// $val = floatval($obj["$query"]);
		
		// $total = $val * $amount;
		
		// return number_format($total, 2, '.', '');
		
	}



	
/*
================================================================================================
PHP (cURL)
Real-time rates: Find below a simple PHP example for getting exchange rate data via the Fixer API's latest endpoint.
================================================================================================
*/
public function fixerInit(){
	// set API Endpoint and API key 
	$endpoint = 'latest';

	$access_key = 'afe7604860ac85fdd8bd7296a4d808dd';

	// Initialize CURL:
	$ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// Store the data:
	$json = curl_exec($ch);

	curl_close($ch);

	// Decode JSON response:
	$exchangeRates = json_decode($json, true);

	// Access the exchange rate values, e.g. GBP:
	echo $exchangeRates['rates']['GBP'];
}
	/*
	================================================
	using currencyLayerApi .. (NOT WORKING)
	-> Access Restricted - Your current Subscription Plan does not support this API Function."
	================================================
	*/
	public function convertCurrencyUsingCurrencyLayerApi()
	{
		// / set API Endpoint, access key, required parameters
		$endpoint = 'convert';
		$access_key = "de916c87b1d9ec8bbae03b7d6ca2b682";

		$data = collect([
			'from' => request()->input("form.currencyCode"),
			'to' => request()->input("form.toCurrencyCode"),
			'amount'  => request()->input("form.offerBounty")
		]);

		$from = $data->get("from");
		$to = $data->get("to");
		$amount = $data->get("amount");

	// initialize CURL:
		$ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');   
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// get the (still encoded) JSON data:
		$json = curl_exec($ch);
		curl_close($ch);

	// Decode JSON response:
		$conversionResult = json_decode($json, true);

	// access the conversion result
		if ( is_null($conversionResult)){
			echo $conversionResult[0];
		}
		else  { 
			dd($conversionResult);
		}

	}

	/*
	================================================
	using fixer api.. (NOT WORKING)
	-> Access Restricted - Your current Subscription Plan does not support this API Function."
	===============================================
	*/
	public function convertCurrencyUsingFixer()
	{	
	// set API Endpoint, access key, required parameters
		$endpoint = 'convert';
		$access_key = $this->fixerApiKey() ;

		$data = collect([
			'from' => request()->input("form.currencyCode"),
			'to' => request()->input("form.toCurrencyCode"),
			'amount'  => request()->input("form.offerBounty")
		]);

		$from = $data->get("from");
		$to = $data->get("to");
		$amount = $data->get("amount");


	// initialize CURL:
		$ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'&from='.$from.'&to='.$to.'&amount='.$amount.'');  

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	// get the JSON data:
		$responseData = curl_exec($ch);

		curl_close($ch);

	// Decode JSON response:
		$conversionResult = json_decode($responseData, true);
	// dd($conversionResult);

	// access the conversion result if there is 
		if ( is_null($conversionResult)){
			echo $conversionResult[0];
		}
		else  { 
			dd($conversionResult);
		}

	}

}
