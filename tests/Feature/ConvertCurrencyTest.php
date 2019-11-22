<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Country ; 
use App\Utilities\ConvertsCurrencies ; 

class ConvertCurrencyTest extends TestCase
{

    use ConvertsCurrencies; 

	/** @test */
	public function an_amount_of_currency_can_be_converted(){
		// we have 5 euros for example
		$value = 10 ; 
		
		$mainCurrency = 'USD';
		
		$targetCurrency = 'PHP';

		$totalAmount = $this->convertCurrency($value,$mainCurrency,$targetCurrency);

		$this->assertEquals(500, actual, 'message');

	}


}
