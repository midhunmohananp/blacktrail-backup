
<?php

use Illuminate\Database\Seeder;
// use DB ; 
use App\Role ; 
use Faker\Generator as Faker ;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

      if (Role::count() >  3){
        Role::truncate();
      } 

      else { 
        Role::create([
          'role_title'   => 'Law Enforcers',
          'role_description' => 'Police and others'
        ]);

        Role::create([
          'role_title'   => 'Government Agencies',
          'role_description' => 'Governments agencies'
        ]);

        Role::create([
          'role_title'   => 'Normal Citizens',
          'role_description' =>'Offers more bounty to criminals in an area'
        ]);

      }
    }
}
