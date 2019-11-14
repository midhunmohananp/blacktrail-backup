<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User  ;

class VerificationController extends Controller
{

	public function confirm_email($token){
		$user = User::findOrFailByToken($token);
		$user->confirm();

		return redirect()->route('login')->with(['confirmation_success_message' => 'You can now login with those credentials...']);
		
		/*
		DB::table('users')->where('id', $user)->update([
			'confirmed_at' => Carbon::now(),
			'confirmation_code' => null	
		]);
		*/
			/*try
			 {
				DB::table('users')->where('email', $email)->update([
					'confirmed_at' => Carbon::now(),
					'confirmation_code' => null	
				]);
				return redirect()->route('registrationSuccess');
			} catch(VerifyAccountException $verify){
				return response([],503);
			}		
		*/
	}

	function verify_email()
	{
		try {
			$reservation = $concert->reserveTickets(request('ticket_quantity'), request('email'));

			$order = $reservation->complete($this->paymentGateway, request('payment_token'), $concert->user->stripe_account_id);

			Mail::to($order->email)->send(new OrderConfirmationEmail($order));

			return response()->json($order, 201);
		} catch(PaymentFailedException $e) {
			$reservation->cancel();
			return response(['Damn'], 422);
		} catch (NotEnoughTicketsRemainException $e) {
			return response([], 422);
		}

	}

}
