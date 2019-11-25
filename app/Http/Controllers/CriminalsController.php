<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Criminal ; 
use App\User ; 
use App\Exceptions\UserRegistrationException; 
use Rule ; 
use App\Country ; 
class CriminalsController extends Controller
{

	public function index()
	{
		/*when status is at large and the rank is based on the most wanted*/
		// $criminals = Criminal::atlarge()->mostwanted()->get();

		$criminals = Criminal::notyetcaptured()
		->with('profile','crimes')
		->paginate(5) ; 

		$countries = Country::all();

		return view('criminals',compact('criminals','countries'));
	}

	

	/*Maka add na ta but what lacks is that dli ta kadawat og pictures. */
	public function storeCriminal(User $user)
	{
		/*If user is not logged on. or that he's not an adminstrator to the app*/
		if (auth()->check() === false || $user->isAdmin() === false) {
			abort(401, 'Unauthorized.');
				// return response('You are not authorized', 401);
		}

		/*validate the request if the criminals' input is validated.. or just fine..*/
		// dd(request()->all());
		
		$this->validate(request(), [
			'criminals_name'            => 'required|string',
			'alias'                  	=> 'required|string',
			'contact_person'            => 'required|numeric',
			'contact_number'            => 'required|string',
			'last_seen'            		=> 'required|string',
			'status'            		=> 'required|numeric',
			'country_id'            	=> 'required|numeric',
			'body'      				=> 'required'
		]);

		try { 
			$criminal = Criminal::create([
				'full_name'  		 =>				request()->input("criminals_name"),
				'alias' 			 =>				request()->input("alias"),
				'posted_by'			 => 			request()->input("contact_person"),
				'contact_number' 	 => 			request()->input("contact_number"),
				'status' 			 =>				request()->input("status"),
				'country_id'		 =>				request()->input("country_id"),
			])->profile()->create([
				'country_last_seen'		  =>  	request()->input("last_seen"),
				'bounty' 				  => 	request()->input("bounty"),
				'complete_description' 	  =>  	request()->input("body")
			]);

			if (request()->wantsJson()) {
				return response()->json($criminal, 201);
			}
		} 
		catch(UserRegistrationException $ex){
			return response([],503);
		}

/*

		return redirect($criminal->path())
		->with('flash', 'Your thread has been published!');

*/


		// return response()->json(request()->all());


	}


	public function searchForCriminals($countryId, $sortBy, $state)
	{
		return Criminal::with('criminal_profiles')->get();
	}

	/*working

	updating posted_by column
*/

/*
To rank the criminals by their criminality_level ->  points  => 100
->  reward /bounty => 300,000 $ or 	
*/
public function show($criminal)
{
		// $user = Criminal::findOrFail($criminal)->with('profile','crimes','country')->get();
	$criminal = Criminal::with('profile','crimes','country')->findOrFail($criminal);
		// dd($criminal);
	return view("criminals.show",['criminal' => $criminal]) ; 
}

}
