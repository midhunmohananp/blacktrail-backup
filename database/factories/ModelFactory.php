<?php

use Faker\Generator as Faker;


$factory->define(App\Criminal::class, function (Faker $faker) {
    return [
        'full_name' => $faker->name,
        'alias' => $faker->firstName,
        'first_name' => $faker->firstName,
        'middle_name' => $faker->lastName,
        'last_name' => $faker->lastName,    
        'country_id' => function(){
         return DB::table('countries')->get()->random()->id;
     },   
     'posted_by' => function(){
         return User::admins()->get()->random()->id;
     },
     'status' => 1,
     'photo' => 'default_avatar.jpg'
 ];
});


$factory->define(App\Crime::class, function (Faker $faker) {
    return [
        'criminal_offense' => $faker->text(20),
        'description' => $faker->text(100)
    ];
});


$factory->define(App\Group::class, function (Faker $faker) {
    return [
        'display_name' => $faker->text(8),
        'group_name' => $faker->company,
        'motto' => $faker->text(20),
        'founded_at' => $faker->date,
        'headquarters' => $faker->address,
        'country_id' => function(){
            return DB::table('countries')->get()->random()->id;
        },
    ];
});




$factory->define(App\CriminalGroup::class, function (Faker $faker) {
    $groups = ['Gang','Cartel'] ; 
    return [
        'name' => $faker->company ." " .array_random($groups) , 
        'country_of_origin_id' => function(){
            return DB::table('countries')->get()->random()->id;
        },
        'description' => $faker->text
    ];
});



$factory->define(App\CrimeCriminal::class, function (Faker $faker) {
    return [
        'crime_id' => function(){
            return DB::table('crimes')->get()->random()->id;
        }, 

        'criminal_id' => function(){
            return Criminal::doesntHave('crimes')->get()->random()->id;
        },
        
        'crime_description' => $faker->sentence(8, true) 

    ];
});



$factory->define(App\Message::class, function (Faker $faker) {
    do {
        $from = rand(1,15);
        $to = rand(1, 15);
    } while ($from === $to);
    return [
        'from' => $from,
        'to' => $to,
        'body' => $faker->sentence
    ];
});

/*for criminal_info*/

$factory->define(App\CriminalInfo::class, function (Faker $faker) {
    $country = $faker->countryCode;
    return [
        'criminal_id' => function () {
            $criminalsWithNoProfile = Criminal::doesntHave("profile")->get()->take(5);
            foreach ($criminalsWithNoProfile as $crim) {
                return $crim->criminal_id ; 
            }
        },
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
        'body_frame' =>  function() {
            $items = array("skinny","medium","fat","muscular");
            return array_random($items);      
        },
        'bounty'        => mt_rand(100,10000),
        'currency'      => function(){
            $currency = \App\Country::inRandomOrder()->first()->pluck('id');
            return $currency;
        },
        'complete_description' => "<div><!--block--><strong>Fill all description of the criminal that are not listed above such as :</strong><br><br>1. Crimes Description :&nbsp;<br>2. Weight<br>3. Eye Color<br>4. Body Frame<br>5. Any other details</div>"
    ] ; 
});



/*$factory->state(App\CriminalInfo::class, 'unpublished', function (Faker\Generator $faker) {
    return [
        'published_at' => null,
    ];
});

    'height_in_feet_and_inches' => function(){
        $input = array("5'0", "5'5", "5'8", "6'0");
        return $input[array_rand($input)];
    },   

    'body_frame' =>  function() {
        $items = array("skinny","medium","fat","muscular");
        return $items[array_rand($items)];        
    }   
  // 'country_id' => function(){
//     return DB::table('countries')->get()->random()->id;
// },
];
});

