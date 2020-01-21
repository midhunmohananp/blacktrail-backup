<?php

/*
We need pages for this in the landin	g page 
for the bounty hunters
admin Criminals in your area..
*/

/*	
Route::get("/test/email/send",function(){
Mail::send('')
});
*/
	
/*For law enforcers and government agencies...*/
Route::group(['prefix' => 'admin', 
	'middleware' => 'isAdmin', 	
	'namespace' => 'Admin'
], function () {
	Route::get("stats","DashboardController@stats")->name("admin.statistics");
	Route::get("users/pending","DashboardController@pending_users")->name('admin.pending.users');
	Route::get('/home', 'DashboardController@index')->name('admin.dashboard');	

	/*Chats for a specific criminal..*/
	Route::get("chats/{criminal}","CriminalsController@chats_for_a_specific_criminal");
	Route::get('/criminals/posted/{user}', 'DashboardController@postedCriminals')->name('admin.criminals.posted');

/*
Route::resource('criminals','CriminalsController')->prefix("admin");*/

include 'admin_routes_criminal.php';

Route::post('/photos/uploads', 'DashboardController@savePicturesToTheServer')->name('admin.photos.uploads');

/*
Route::resource("group","GroupController",[
'prefix' => 'admin'
])->name("admin.group");

*/
});

/*For confirming users.. 
*
->user confirmation

*/


Route::name('auth.resend_confirmation')->get('/register/confirm/resend', 'Auth\RegisterController@resendConfirmation');
Route::name('auth.confirm')->get('/register/confirm/{confirmation_code}', 'Auth\RegisterController@confirm');

// Route::get('admin/criminals', 'CriminalsCo	ntroller@storeCriminal')->name('admin.criminals.store');

Route::get('/admin/groups', 'GroupsController@index')->name('admin.groups')->middleware('isAdmin');
Route::get("success/registration","ViewsController@registrationSuccess")->name("registrationSuccess");
Route::get("welcome","ViewsController@registrationSuccess")->name("welcomePage");
Route::resource("group","Admin\GroupController");
/*Make sure we can redirect if the users' role is 2 */
Route::get('/criminals', 'CriminalsController@index')->name("criminals");
Route::get('/criminals/{criminal}', 'CriminalsController@show')->name("criminal.show");
Route::get('/groups', 'GroupsController@index')->name("groups");
Route::get("/login",'AuthController@loginForm')->name('login')->middleware("guest");
Route::get("register","AuthController@registerForm")->name('register');
	
Route::get("/role","AuthController@postRole");


/*Implementing chat here..*/
Route::get("/respond/criminal/{criminal}","ChatController@send_chat");
Route::get('/chat','ChatController@index')->name('chat');
Route::get('/contacts',"Api\ContactsController@fetch_all_contacts");

/*Testing currency converter api*/
Route::get("currency/convert","CurrencyController@convertCurrencyPage");
Route::put("currency/convert","CurrencyController@currencyConvert");
Route::get('register/success','ViewsController@registration_success')->name('confirm.mail');


/**
* User profile for the logged on 	user.
*/
Route::group([	
	'middleware' => 'auth', 
], function () {
	Route::get("user/profiles/{user}","ProfilesController@index")->name("profiles.user")->middleware('auth');
	Route::get('user/profiles/update/{user}',"ProfilesController@updateProfileView");
	/*for getting paid and billing */
	Route::get("user/profiles/billing/{user}","ProfilesController@billing")->name("profiles.billing");
	Route::post('user/billing','ProfilesController@store_billing_profile');
});
/**
* extra routes are here
*		=> include_once 'extra_routes.php';
*/
Route::get("/2-col",function (){
	return view("2-col");
});



Route::get("/rows",function (){
	return view("rows");
});

Route::get('/', 'ViewsController@index')->name('index');


/**
* confirming email.
*/
Route::get('confirm/mail/{confirmation_code}','VerificationController@confirm_email')->name('confirmEmail');

/*Route::patch('confirm/email/{email}', 'VerificationController@confirmEmail')->name('verifyEmail');
*/


// Route::resource('group','GroupController');


/**
* 	____|
*  ____|        
* 
* App\Http\Controllers\DatabaseController
======================================================================
This is just used to modify records in the database. 					
======================================================================

*/

// Routes that manipulate the database..
include "routes.db.php";
// testing slots..
Route::get("slots","ViewsController@slots");

/*testing views..*/
Route::get("/dashboard",function()
{
	return '<h3 style="font-size:30px;">Dashboard View</h3>';
});




// Auth::routes();

Route::post("/login",'AuthController@postLogin')->name('postLogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::post('/register',[
	'as' => 'postRegister',
	'uses' => 'AuthController@postRegister'
]);


Route::post('payment/create',"PaypalController@create_payment");
Route::post('payment/execute',"PaypalController@execute_payment");	

Route::get("test-paypal","PaypalController@main_paypal_page");
Route::get('/home', 'HomeController@index')->name('home');


/*Mailables*/

Route::get("mailable","ViewsController@test_mailable");


/*
Testing Chat in pusher...
*/


/*using counter in pusher..*/
Route::get("counter", function(){
	return view("counter");
});


/*sending message function*/
// Route::post('message',"MessageController@")
Route::post("/sender",function(){
	event(new MessageSent($text));
});