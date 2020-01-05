<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Criminal ;
use App\User ; 	
use Hash ;
use Validator; 
use Storage ; 
use \Image ; 	
use Illuminate\Validation\Rule;
use DB ; 
use App\Http\Requests\CreateProfileRequest; 
use App\Http\Requests\UpdateProfileRequest; 

class UsersController extends Controller
{
	public function getAllCommonUsers(){
		$criminal = User::admins()->get();
		return response()->json($criminal);
	}

	/*delete user*/
	public function delete_user(){
		$user_id = intval(request('user_id'));
		dd($user_id);
		$user = DB::table('users')->where('id', '=', $user_id)->delete();
		return response()->json($user);
	}

	public function activate_user(){
		$user_id = intval(request('user_id'));
		$user = DB::table('users')->where('id', '=', $user_id)->update(['status' => '1']);
		return response()->json($user);
	}

// UpdateProfileRequest 
// public function update_profile_of_the_user(CreateProfileRequest $request)
	public function update_profile_of_the_user(Request $request)
	{	
// the id of the user
		$id = request()->input('form.id');
		
		$user = User::where('id',$id)->pluck('password');
		$logged_on_users_password = $user[0];
		$password = request()->input('form.password');
		$confirm_password = request()->input('form.confirm_password');

		if (is_null($password) || is_null($confirm_password)) {
			return response()->json(['error' => 'Then no need to setup'], 401);
		}

		/*if the two passwords don't match then issue a response*/
		if ( $password !=  $confirm_password) {
			return response()->json(['error' => 'Your Passwords do not match, try to fix it out'], 401);
		}
		// if the passwords match 
		else { 

			if(Hash::check($password, $logged_on_users_password)) {
				return response()->json(['error' => 'Try using a different password since you have the same inputted password'], 401);
			} else { 
				
				$validator = Validator::make($request->input('form'), [
					'display_name' => 'required|min:3|max:100',
					'username' => 'required|unique:users|min:4|max:15',
					'email' 	   => 'required|email|unique:users',
					'phone_number' => 'required|min:3',
					'password' 	   => 'min:6',
					'country_id' => 'required|integer',
					'avatar' => 'required'
				]);

				if(request()->input('form.avatar')){

					$image = request()->input('form.avatar');

					$photo = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
					\Image::make(request()->input('form.avatar'))->resize(100,100)->save(public_path('avatars\users').$photo);

				}

			// return response(request()->all());

				$user = User::findOrFail($id)->update([
					'username' => request()->input('form.username'),
					'email' => request()->input('form.email'),
					'display_name' => request()->input('form.display_name'),
					'password' => bcrypt($password),
					'phone_number' =>  request()->input('form.phone_number'),
					'country_id' =>  intval(request()->input('form.country_id')),
					'avatar' => $photo,
				]);

				return response()->json(['success' => 'You have successfully updated your profile'], 200);	
			}
		/*	else { 
				return response()->json(['error' => 'Your Password is incorrect and does not match with the current logged on user, try to fix it out'], 401);
			}*/
		}
		/*}*/
	}
}
/*
if ($validator->fails()) {
	dd("validator fails");
	return redirect()->back()->withErrors($validator)->withInput();
}
else { 
	// Storage::disk('public')->delete(auth()->user()->getOriginal('avatar'));	
*/


/*
auth()->user()->update([
'username' => request()->input('form.username'),
'email' => request()->input('form.email'),
'display_name' => request()->input('form.username'),
'phone_number' =>  request()->input('form.phone_number'),
'country_id' =>  request()->input('form.country_id'),
'avatar' => $name,
])->where("id",$id);
*/







		// then start validating
		/*request()->validate([
			'avatar' => ['nullable', 'image', Rule::dimensions()->minWidth(400)->ratio(8.5/11)],
			'display_name' => 'required|min:3|max:100',
			'role_id' 	   => 'required|integer',
			'username' => 'required|unique:users|min:4|max:15',
			'email' 	   => 'required|email|unique:users',
			'phone_number' => 'required|min:3',
			'password' 	   => 'required|min:6',
			'country_id' => 'required|integer'
		]);*/

		


	/*	request()->validate([
			'avatar' => 'required|image',
			'form.display_name' => 'required|min:3|max:100',
			'form.role_id' 	   => 'required|integer',
			'form.username' => 'required|unique:users|min:4|max:15',
			'form.email' 	   => 'required|email|unique:users',
			'form.phone_number' => 'required|min:3',
			'form.password' 	   => 'required|min:6',
			'form.country_id' => 'required|integer'
		]);*/


	// return response()->json(request()->input('form.username'));

	// 2. if the password matches to the ones of the logged on user start valiadting	



	/*$this->validate(request(),[
		'form.display_name' => 'required|min:3|max:100',
		'form.role_id' 	   => 'required|integer',
		'form.username' => 'required|unique:users|min:4|max:15',
		'form.email' 	   => 'required|email|unique:users',
		'form.phone_number' => 'required|min:3',
		'form.password' 	   => 'required|min:6',
		'form.country_id' => 'required|integer'
	]);*/
	
	
/*		
$user = User::findOrFail($id);

	$user->update([
		'display_name'       => request('form.display_name'),
		'role_id'   		 => request('form.role_id'),
		'email'    			 => request('form.email'),
		'password'    			 => request('form.password'),
		''
	]);
*/

	// return response()->json(request()->get('form.display_name'));
/*	$image = request()->get('params[0].form.display_name');
dd($image);*/

	/*
	$this->validate(request(), [
		'image' => 'required'
	]);
*/


/*
	if($request->get('image'))
	{
		$image = $request->get('image');
		$name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
		\Image::make($request->get('image'))->save(public_path('images/').$name);
	}

	$image= new FileUpload();
	$image->image_name = $name;
	$image->save();

	return response()->json(['success' => 'You have successfully uploaded an image'], 200);

	return response()->json(request());*/
