<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criminal ;
use App\User ; 
class CriminalsController extends Controller
{
	public function getById($criminal)
	{
		$criminal = Criminal::find($criminal)->first();
		return response()->json($criminal);
	}

	public function fetch_respondent(){
		$id = request()->get("criminal_id");
		$user = User::where('id','=',$id)->get();
		return response()->json(['user' => $user]);
	}
}
