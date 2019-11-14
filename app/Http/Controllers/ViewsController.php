<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\UserRegistered; 
use App\User ; 
class ViewsController extends Controller
{
	public function index()
	{
		return view('index');
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
