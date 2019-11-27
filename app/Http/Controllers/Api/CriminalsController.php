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
		$criminal_poster = Criminal::where('id','=',$id)->with('respondent')->get();
		
		return response()->json(['user' => $criminal_poster]);
	}

	public function chats_for_a_specific_criminal($criminal){

	}


}
