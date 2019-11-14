<?php
//  working already 

use Illuminate\Database\Seeder;
use App\CrimeCriminal ;
class CrimeCriminalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {            
      $this->updateCrimeDetailsthatAreEmpty() ; 
      // $this->queryM2M() ; 
    }


    public function updateCrimeDetailsthatAreEmpty()
    {
      $faker = \Faker\Factory::create();
      $crimes = CrimeCriminal::whereNull('crime_id')->get();
      $crimes->each(function($item,$key){
                  // dd($item);
        $faker = \Faker\Factory::create();
        $created =  DB::table("crime_criminal")->where([
          ['crime_id','=',$item->crime_id],
          ['criminal_id','=',$item->criminal_id],
        ])->update(['crime_details'=> $faker->sentence(8,true)]);
        dd($created); 
      });
    }


}
