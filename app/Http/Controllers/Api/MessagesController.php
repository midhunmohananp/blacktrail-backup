<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message ; 
class MessagesController extends Controller
{

	public function fetch_messages(){
		$logged_user = auth()->id(); 
		$respondent_id = request("respondent_id");
		$message = Message::where('from',$logged_user)->orWhere('to',$logged_user)->orWherget();
		return response()->json($message);


		// /{respondent}
	}

	/*returns respondent_name , updated message from its body*/
		public function fetch_all_messages_of_the_currently_logged_on_user_to_a_its_respondent(){
		/*the user id or auth id*/
		$logged_user = request('user_id');
		
		$respondent_id = request("respondent_id");
		/*fetch all the messages of the user in the messages table of the currently logged on user*/
		$all_messages = Message::where('from',$logged_user)->orWhere('to',$logged_user)->with('owner')->orderBy('created_at','desc')->get();



		return response()->json($all_messages);

	}


}
