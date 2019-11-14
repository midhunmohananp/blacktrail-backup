<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Paypal\Api\Amount;
use \Paypal\Api\Details;
use \Paypal\Api\Item;
use \Paypal\Api\ItemList;
use \Paypal\Api\Payer;
use \Paypal\Api\Payment;
use \Paypal\Api\RedirectUrls;
use \Paypal\Api\WebProfile ; 
use \PayPal\Api\PaymentExecution;
use \PayPal\Api\Transaction;

class PaypalController extends Controller
{

	public function create_payment(){
// return "Create Payment working";
		$apiContext = new \PayPal\Rest\ApiContext(
			new \Paypal\Auth\OAuthTokenCredential(
// client_id
				'ASKgsenjMcu30HAZQM_IRrlaEXjEkD5iJQaCO095cO8cL714mr6aIcIJO-TZ9xDgd-50ViBkfryO1-Jw',
// client secret..
				'EChS5F-mlAInglMh5m01TzQTnSnZW-KkVt9QMMwG2Mvu1nvOAr8ls331TPWU9-BpGHcBMuoHnIUJQ0LQ')
		);


		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item1 = new Item();
		$item1->setName('Ground Coffee 40 oz')
		->setCurrency('USD')
		->setQuantity(1)
->setSku("123123") // Similar to `item_number` in Classic API
->setPrice(7.5);

$item2 = new Item();
$item2->setName('Granola bars')
->setCurrency('USD')
->setQuantity(5)
->setSku("321321") // Similar to `item_number` in Classic API
->setPrice(2);

$itemList = new ItemList();
$itemList->setItems(array($item1, $item2));

$details = new Details(); 
$details->setShipping(1.2)
->setTax(1.3)
->setSubTotal(17.50); 

$amount = new Amount();
$amount->setCurrency("USD")
->setTotal(20)
->setDetails($details);

$transaction = new Transaction();
$transaction->setAmount($amount)
->setItemList($itemList)
->setDescription("Payment description")
->setInvoiceNumber(uniqid());


$baseUrl = getBaseUrl();

$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("localhost:8004")
->setCancelUrl("localhost:8004");

$payment = new Payment();

$payment->setIntent("sale")
->setPayer($payer)
->setRedirectUrls($redirectUrls)
->setTransactions(array($transaction)); 

$request = clone $payment;

try {
	$payment->create($apiContext);
} catch (Exception $ex) {

	ResultPrinter::printError("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", null, $request, $ex);
	exit(1);
}

/*
$approvalUrl = $payment->getApprovalLink();

ResultPrinter::printResult("Created Payment Using PayPal. Please visit the URL to Approve.", "Payment", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $payment);
*/
return $payment;
}

/*
------------------------------------
Executing Payment
------------------------------------	
*/
public function execute_payment(){

	$api_context = new \PayPal\Rest\ApiContext(
		new \PayPal\Auth\OAuthTokenCredential(
'ASKgsenjMcu30HAZQM_IRrlaEXjEkD5iJQaCO095cO8cL714mr6aIcIJO-TZ9xDgd-50ViBkfryO1-Jw',     // ClientID
'mlAInglMh5m01TzQTnSnZW-KkVt9QMMwG2Mvu1nvOAr8ls331TPWU9-BpGHcBMuoHnIUJQ0LQ'      // ClientSecret
)
	);

	$payment_id = request('paymenId');

	$payment = Payment::get($payment_id, $api_context);

	$execution = new PaymentExecution(); 
	$execution->setPayerId(request('PayerID'));

	$transaction = new Transaction();
	$amount = new Amount();
	$details = new Details();

	$details->setShipping(2.2)
	->setTax(1.3)
	->setSubTotal(17.50); 

	$amount->setCurrency('USD') ;
	$amount->setTotal(20);


}

/*main paypal page.*/
public function main_paypal_page()
{
// echo "Paypal";

	return view("paypal");
}


}
