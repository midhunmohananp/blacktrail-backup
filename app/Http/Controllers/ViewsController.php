<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\UserRegistered; 
use App\User ; 

class ViewsController extends Controller
{
	public function index()
	{
		if (!auth()->check()){
			return view("index");
		}

		else {
			if (!auth()->user()->isAdmin()){ 
				return view('index');
			}
			else { 
				return redirect()->route("admin.dashboard");
			}	
		}
		
	}


	function slots()
	{
		return view('slots');
	}

	function registrationSuccess()
	{
		return view('pages.registration-success');		
	}

	public function test_mailable(){
		$user = User::find(1);
		return new UserRegistered($user);
	}
}
