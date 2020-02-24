<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criminal ; 
use App\Country ; 
use App\User ; 	


class DashboardController extends Controller {

	/*saving pictures to the server.*/
	public function savePicturesToTheServer()
	{	

		if ( request()->hasFile('photo')){
			print ("Has Photo..");
		}
		else { 
			print ("wth ??");
		}	
/*

		dd("Request Found:"+request()->all());

		if (request()->hasFile('photo')){ 
				
		}

*/

	}

	/*admin dashboard page..*/
	public function index()
	{
		$id = auth()->user()->role_id ;
		if ($id === 1 || $id === 2 ) { 
			$route = route('admin.dashboard');
		}
		else {
			$route =  route('index');
		}

		return view('admin.dashboard', [ 
			'route' => $route 
		]);
		
	}

	public function pending_users(){
		$pending_users = User::inactive()->thathasphonenumbers()->paginate(10);
		return view('admin.users.pending',compact('pending_users'));
	}

	/* Returns all posted criminals.. */
	public function postedCriminals($admin)
	{
		$criminals = Criminal::postedByLoggedOnUser()->with('crimes','profile')->paginate(5);	
		// dd($criminals);
		
		// $criminals = Criminal::paginate(5);

		// $criminals = Criminal::postedByUser($admin)
		// ->join("criminal_profiles","criminal_profiles.criminal_id","=","criminals.id")
		// ->join("crime_criminal","crime_criminal.criminal_id","=","criminals.id")
		// ->orderBy("full_name","asc")
		// ->distinct()
		// ->paginate(5);

		return view('admin.criminals.posted',compact('criminals'));
	}

	public function saveCriminals(Request $request)
	{
		
	}


	public function followedCriminals()
	{
		$admin = auth()->user()->id ; 
		$criminals = Criminal::followedBy($admin)->paginate(5);		
	}



	public function criminalsList()
	{
		$admin = auth()->user()->id ; 
		// $criminals = Criminal::paginate(5);
		$criminals = Criminal::notyetcaptured()->with('crimes','profile')->paginate(5);
		$countries = Country::all() ; 
		return view('admin.criminals-list',compact("criminals","countries"));
	}



	public function postCriminalsForm()
	{
		$countries = Country::select("name","id","currency_code","currency_symbol")->get();
		$admins = User::admins()->select("display_name","id")->get();
		
		return view('admin.criminals.create',[
			'countries' => $countries,
			'admins' => $admins
		]);
	}

	public function stats(){
		$statistics = User::all();
		return view('admin.stats',compact('statistics'));
	}

}
