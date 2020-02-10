<?php
/*Used for retrieving data/ storing data into the db*/
namespace App\Http\Controllers ;
use Illuminate\Http\Request;
use App\Criminal ; 
use App\User ; 
use App\GroupMember ; 
use App\CriminalInfo ; 
use App\Group ; 
use App\Country ; 
use App\Skill ;
use DB ; 
use Carbon\Carbon ; 

class DatabaseController extends Controller {	
	/**
			seeding criminals information 
			for those 
			who don't have any profile..
			**/
			public function seed_criminals_info(){
		// $criminalsWithNoProfile = Criminal::doesntHave("profile")->get();
				$criminalsWithNoProfile = Criminal::doesntHave("profile")->pluck('id');
		// dd($criminalsWithNoProfile);

				$criminalsWithNoProfile->each(function ($item, $key){
					$faker = \Faker\Factory::create();
					$country = $faker->countryCode ;
					$eye_colors = ["brown", "blue", "green", "amber", "gray","green","hazel","red"] ; 
					$height =  array("5'0", "5'5", "5'8", "6'0");

					DB::table('criminal_profiles')->insert([
						'criminal_id' => intval($item),
						'birthplace' 	     => $faker->address,
						'birthdate' 		 => $faker->date($format = 'Y-m-d', '2000-01-01') ,
						'last_seen'			 => $faker->address,
						'criminal_id'		 => DB::table('criminals')->get()->random()->id,
						'country_last_seen'  =>	 DB::table('countries')->get()->random()->id,
						'last_seen'       	 => $faker->address,
						'eye_color' =>		  $eye_colors[array_rand($eye_colors)],
						'height_in_feet_and_inches' => $items[array_rand($items)]  ,
						'weight_in_kilos' =>	70,
						'country_of_origin' => function() {
							$items = array("skinny","medium","fat","muscular");
							return $items[array_rand($items)];        
						},
						'bounty'   => mt_rand(100,10000),
						'currency' =>  Country::inRandomOrder()->pluck('currency_code')->first(),
						'complete_description' => "<div><!--block--><strong>Fill all description of the person that are not listed above such as :</strong><br><br>1. Height :&nbsp;<br>2. Weight<br>3. Eye Color<br>4. Body Frame<br>5. Any other details</div"
					]);
				});
			}

			public function setting_criminals_current_display_name_to_null()
			{
				return DB::table('criminals')
				->whereNotNull('display_name')
				->update(['display_name' => NULL]);
		// dd($criminals);
			}

	// ->  seeding criminals who have no countries
			public function seed_criminals_who_have_no_countries(){
		// finding criminals that have no countries
				$criminalsWithCountriesAreNull = CriminalInfo::doesntHave('countries')->get();
				dd($criminalsWithCountriesAreNull);

		/*	$country_ids = Country::pluck("id")->toArray();

		$id = array_random($country_ids);
		// when using
		$id2 = array_random($country_ids);

		$infos = DB::table("criminal_profiles")->where("country_last_seen",NULL)->orWhere("country_of_origin",NULL)->update(['country_last_seen']->get();

		CriminalInfo::where('country_last_seen','=',NULL)->update(['country_last_seen'	=>	$id]);
		CriminalInfo::where('country_last_seen','=',NULL)->update(['country_last_seen'	=>	$id2]);

*/


		foreach ($criminalsWithCountriesAreNull as $criminal) {
			$country_ids = Country::pluck("id")->toArray();
			$id = array_random($country_ids);
// wen using
			$id2 = array_random($country_ids);
			CriminalInfo::where('criminal_id','=',$criminal->criminal_id)->update(['country_last_seen'	=>	$id]);
			CriminalInfo::where('criminal_id','=',$criminal->criminal_id)->update(['country_of_origin'	=>	$id]);
		}

	}

	function erase_profile_of_criminals()
	{
		DB::table('criminal_profiles')->truncate();	

		$currency = \App\Country::pluck('id');

		$criminalsWithNoProfile = Criminal::doesntHave("profile")->get();

		foreach ($criminalsWithNoProfile as $criminal) {
			$faker = \Faker\Factory::create();

			$country = $faker->countryCode ;

			$criminal =	factory(\App\CriminalInfo::class)->create([
				'criminal_id' => $criminal->id,
				'birthplace' => $faker->address,
				'birthdate' => $faker->date($format = 'Y-m-d', '2000-01-01') ,
				'last_seen' => $faker->address,
				'criminal_id' => function(){
					return DB::table('criminals')->get()->random()->id;
				},
				'country_last_seen' => function () {
					return DB::table('countries')->get()->random()->id;
				},
				'last_seen'  => $faker->address,
				'eye_color' => function(){  
					$items = array("brown", "blue", "green", "amber", "gray","green","hazel","red");
					return $items[array_rand($items)];
				},  
				'height_in_feet_and_inches' => function(){
					$input = array("5'0", "5'5", "5'8", "6'0");
					return $input[array_rand($input)];
				},     
				'weight_in_kilos' => mt_rand(50,90),
				'country_of_origin' => function() {
					$items = array("skinny","medium","fat","muscular");
					return $items[array_rand($items)];        
				},
				'bounty'   => mt_rand(100,10000),
				'currency' => function(){
					return DB::table('countries')->get()->random()->id;
				},
				'complete_description' => "<div><!--block--><strong>Fill all description of the criminal that are not listed above such as :</strong><br><br>1. Height :&nbsp;<br>2. Weight<br>3. Eye Color<br>4. Body Frame<br>5. Any other details</div>"
			]) ; 
		}
	}

	public function seedSkillsTable()
	{
		// dd($ids);]
		Skill::truncate();
		//  store skills in the array

// the group members are also stored
		$group_members = GroupMember::select("id")->get();

		$group_members->each(function ($item, $key){
			$skills = collect(['Greco Roman Wrestling','Taekwondo','Karate','Muay Thai','Judo','Boxing','Capoeira','Aikido','Kyokushin'])->toArray();
			DB::table('skills')->insert([
				'group_member_id' => $item->id,
				'skill_name' => array_random($skills)
			]);
			DB::table('skills')->insert([
				'group_member_id' => $item->id,
				'skill_name' => array_random($skills)
			]);

		});


	}

	/**
	 *Group members seeding.
	 */
	public function seedGroupMembers()
	{
// dd($ids);]

		GroupMember::truncate();


		$users =  User::where('role_id','=',3)->select('id','display_name')->distinct()->get();

		foreach ($users as $user) {

			$groups =  Group::select('id')->get()->toArray();	
// echo $user->display_name ." " .$user->id ."<br/>"; 

			DB::table('group_members')->insert([
				'id' => $user->id,
				'group_id' => implode(array_random($groups)),
				'full_name' => $user->display_name
			]);
		}

	}


	/*thi*/

	public function updatePostedByColumn()
	{	
		$posted_by = 67 ; 	
// the posted_by is currently at 67
		$criminalsCount = Criminal::where('posted_by','=',67)->count();
// dd($users);
		$criminals = Criminal::get();


		$ids = Criminal::inRandomOrder()->where('posted_by',67)->pluck('id')->toArray();
// dd($ids);
		$users =  User::whereIn('role_id',[1,2])->pluck('id')->toArray();
// dd($criminals);
		foreach ($criminals as $criminal) {
// dd($criminal);
			$id = array_random($users);
			$crim  = Criminal::findOrFail($criminal->id);
			$crim->posted_by = $id; 
			$crim->save() ;
// echo $criminal->id ."<br/>" ;
		}

	}

	/*this will seed bounty and currency in the criminal_profiles table..*/
	public function seedBounty()
	{
		$incompleteCriminals = CriminalInfo::where('bounty','=',null)->orWhere("currency",null)->get() ;
// dd($countries);
// dd($incompleteCriminals);
		foreach ($incompleteCriminals as $criminal) {

			$currency  = \App\Country::select('currency_symbol','currency_code')->get()->toArray()	; 
// $id = array_random($countries);
			$crim  = CriminalInfo::findOrFailById($criminal->criminal_id);
			$crim->bounty = mt_rand(100,1000);
			$crim->currency = mt_rand($currency->currency_symbol, $currency->currency_code) ; 
			$crim->save() ; 
// dd($crim);
// var_dump($crim);
// $bounty  = mt_rand(100,10000) ; 

// $crim->posted_by = $id; 

// $crim->save() ;
		}
	}

	/*Removing criminals who are non adults -> juvenile*/
	public function remove_criminals_who_are_not_adults(){
		$date = Carbon::createFromDate(2001,01,01);
		$todaysDate = Carbon::today();

		$lastDay = $date->copy()->endOfYear();	

		$criminals = CriminalInfo::whereBetween("birthdate",[$lastDay,$todaysDate])->get() ; 

		$criminals->each(function($item,$key){
// dd($item->criminal_id);
			DB::table('criminal_profiles')->where('criminal_id','=',$item->criminal_id)->delete();
			DB::table('criminals')->where('id','=',$item->criminal_id)->delete();
		});
	}

}	
