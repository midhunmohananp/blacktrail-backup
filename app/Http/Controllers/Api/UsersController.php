<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criminal ;
use App\User ; 	

class UsersController extends Controller
{
	public function getAllCommonUsers()
	{
		$criminal = User::admins()->get();
		return response()->json($criminal);
	}
	
	public function remove_user(){

	}

	public function get_messages_for($id)
	{

	}	
}
	