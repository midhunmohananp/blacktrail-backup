<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criminal ;
use App\User ; 	
use DB ; 

class UsersController extends Controller
{
	public function getAllCommonUsers(){
		$criminal = User::admins()->get();
		return response()->json($criminal);
	}
	
	/*delete user*/
	public function delete_user(){
		$user_id = intval(request('user_id'));
		$user = DB::table('users')->where('id', '=', $user_id)->delete();
		return response()->json($user);
	}

	public function activate_user(){
		$user_id = intval(request('user_id'));
		$user = DB::table('users')->where('id', '=', $user_id)->update(['status' => '1']);
		return response()->json($user);
	}


	public function update_profile_of_the_user()
	{
		return response()->json(request());
	}	
}
	