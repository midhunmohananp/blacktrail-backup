<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User ; 
use App\Criminal ; 
class ChatController extends Controller
{
	
	public function __construct(){
		return $this->middleware('auth');
	}

	public function send_chat($criminal_id){
		$id = request()->get("criminal_id");
		$user = Criminal::where('id','=',$criminal_id)->with('respondent')->get();
		return view('chat',compact('user'));
		// return response()->json(['user' => $user]);		
	}

	public function fetch_respondent(){
		$id = request()->get("criminal_id");
		$criminal_poster = Criminal::where('criminal_id','=',$criminal_id)->pluck('posted_by');
		dd($criminal_poster);
	// return view('chat',compact('user'));
		// return response()->json(['user' => $user]);		
	}

	public function index()
	{
		return view('chat');
	}

}
