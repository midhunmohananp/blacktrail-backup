<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criminal ;
 
class CriminalsController extends Controller
{
	public function getById($criminal)
	{
		$criminal = Criminal::find($criminal)->first();
		return response()->json($criminal);
	}
}
