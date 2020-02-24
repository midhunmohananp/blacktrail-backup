<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User ; 
use App\Message;
use DB ; 

class ContactsController extends Controller
{

	public function fetch_all_contacts(){
		$contacts = User::with('messages')->where(['messages']); 
		return response()->json($contacts);
	}

	/*Getting Messages for the specific user*/
	public function getMessagesFor($user){
		$user = request()->input("user");
		
		$messages = DB::table('messages')->where("from",$user)->orWhere("to",$user)->get();
	
		return response()->json($messages);
	}

	public function send()
	{
	    $message = Message::create([
	    	'from' => auth()->id() , 
	    	'to' => request('to'),
	    	'text' => request('text')
	    ]);

	    broadcast(new NewMessage($message));

	}

}
