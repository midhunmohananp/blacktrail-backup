<?php
namespace App\Http\Controllers;
use Auth ; 
use Illuminate\Http\Request;
use App\Mail\UserRegistered ; 
use App\Role;
use App\User ; 
use Mail ;
use App\Country ; 
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
	public function loginForm()
	{
		return view('auth.login');
	}

	public function logout(Request $request)
	{
		auth()->guard()->logout();
		request()->session()->invalidate();
		return redirect()->to('/')->with(['logoutMessage' => 'Logout Successful !']);
	}

	/*Saving the login form.*/
	public function postLogin(Request $request)
	{
		// -> Validate the request. 
		$this->validate(request(), [
			'pin' => 'required|string',
			'password' => 'required|string',
		]);

		$pin = request()->get('pin');
		
		$field = filter_var(request()->get('pin'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';		

		$remember_me = request()->get('remember');

		$password = request()->get('password');

		$user = User::where("${field}",'=',$pin)->first();
		
		if ( is_null($user->confirmed_at) || $user->status == "0"){
			return redirect()->back()->with('flash-message','The account you tried to login was either not yet confirmed by you or activated by one of our admins.');
		}
		
		else {
			if (Auth::attempt([$field => $pin ,'password' => $password])){
    // dd(auth()->user()->role_id);
				switch(auth()->user()->role_id){
					/*the roles would be determined*/
					case 1 : return redirect()->route("admin.dashboard");
					case 2 : return redirect()->route("admin.dashboard");
					case 3 : return redirect()->to('/');
				}
			} else {
				dd('Auth failed!');
			}
		}
	}
	
	/**/
	public function registerForm()
	{
		$roles = Role::select(['id','role_title'])->get() ;
		$countries = Country::select(['id','name'])->get();
		return view("auth.register", compact('roles','countries'));
	}


	/*when registering..*/
	public function postRegister()
	{
		// dd(request()->all());

		// validation..
		$this->validate(request(),[
			'display_name' => 'required|min:5',
			'role_id' 	   => 'required|integer',
			'email' 	   => 'required|email|unique:users',
			'phone_number' => 'required|min:3',
			'password' 	   => 'required|min:6',
			'country_id' => 'required|integer'
		]);

// if submitted through a modal -> therefore it's a json request.
		if (request()->isJson()){
			return response()->json("submitted through modal..");
		}
		
		else {
			try { 
				$email = request()->get('email');

				 // blacktrail.com/confirm/email/?=jose@mail.comVi2sdebxXIGdHvz04IOB
				$confirmation_code = str_random(10);

				$user = User::create([
					'role_id' => request('role_id'),
					'display_name' => request('display_name'),
					'email' => request('email'),
					'password' => bcrypt(request('password')),
					'phone_number' => request("phone_number"),
					'country_id' => request('country_id'),
					'confirmed_at' => null ,
					'confirmation_code' => $confirmation_code
				]);

				Mail::to($user->email)->send(new UserRegistered($user));

				return redirect()->route('registrationSuccess')
				->with(['email' => $user->email]);	

			} catch (UserRegistrationException $u){
				return response(['Not allowed.'], 405);
			}

		}


	}


	public function postRole()
	{
		Role::create(['name' =>'Law Enforcers']) ;
		Role::create(['name' =>'Bounty Hunter']) ;
		Role::create(['name' =>'Government Agency']) ;
	}
}
