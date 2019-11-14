<?php

use Illuminate\Database\Seeder;
use App\CriminalInfo; 
use App\Criminal ; 
use App\Country ; 
use Carbon\Carbon ;

class CriminalInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    /*this will be used for seeding criminals_information yet*/
    /*this will be used for seeding criminals_information yet*/

    public function run()
    {

      // 1. find criminals who doesn't have any profile->passed
      print "Criminals who have no profile";
      $this->updateCriminalsWhoHaveNoProfile() ;
      print "Criminals who have no bounty and a currency";
      // 2. update those criminals who doesn't have a bounty and a currency..
      $this->updateCriminalsWithNoBountyOrCurrency();
      // 3.updating criminals Description
      print "Criminals description update..";
      $this->updateCompleteDescription();

      // 4. removing criminals which have birthdates of 2001
      $this->removeCriminalsWhichAreNonAdults();

    }

    protected function updateCriminalsWhoHaveNoProfile(){

      $criminalsWithNoProfile = Criminal::doesntHave("profile")->get();
      
      $criminalsWithNoProfile->each(function ($item,$key){
      
        dump($key);

        $faker = \Faker\Factory::create();

        $date = Carbon::createFromDate(2000, 3, 21);

      // adding factory 
        $user = factory(App\CriminalInfo::class)->create([
          'criminal_id' => $item->id , 
          'birthplace'  => $faker->address ,
          'country_last_seen'   =>  $this->getCountryId(), 
          'country_of_origin'   => $this->getCountryId(), 
          'birthdate'           => $faker->date('Y-m-d',$date),
          'eye_color'           => function(){  
            $items = array("brown", "blue", "green", "amber", "gray","green","hazel","red");
            return $items[array_rand($items)];
          },  
          'weight_in_kilos'           => mt_rand(40,100),
          'complete_description'      =>  "<div><!--block--><strong>Fill all description of the criminal that are not listed above such as :</strong><br><br>1. Height :&nbsp;<br>2. Weight<br>3. Eye Color<br>4. Body Frame<br>5. Any other details</div>",
          'body_frame'                =>  function() {
            $items = array("skinny","medium","fat","muscular");
            return $items[array_rand($items)];        
          },
          'bounty'                     =>    mt_rand(100,10000),
          'currency'                   =>    $this->getCurrencyCode() ,
        ]);
      });
    }

      // age >=2001
    protected function removeCriminalsWhichAreNonAdults(){
      $minorCriminals = Criminal::whereDate("birthdate", '>','2001')->get();
      dd($minorCriminals);


    }

    protected function updateCriminalsWithNoBountyOrCurrency(){ 

      $noBountyCriminals = CriminalInfo::whereNotNull("currency",'=',"")->get();

      $noBountyCriminals->each(function ($item,$key){

      // dd($item->criminal_id);

        DB::table("criminal_profiles")->where('criminal_id','=',$item->criminal_id)->update(['currency'=> $this->getCurrencyCode()]); 
      });

    }


    protected function getCurrencyCode(){
      $codes = DB::table("countries")->pluck("currency_code")->toArray();
      $code = array_random($codes);
      return $code ; 
    }

    protected function updateCompleteDescription(){


      $anonCriminals = CriminalInfo::where("complete_description",'=',"")->get();
      $anonCriminals->each(function($item,$key){
      // dd($item->criminal_id);


        DB::table("criminal_profiles")->where('criminal_id','=',$item->criminal_id)
        ->update(['complete_description'=> $this->returnsCompleteDescription()
      ]); 
      });

      // dd($anonCriminals->criminal_id);



      // $code = array_random($codes);
      // return $code ; 
    }


    protected function returnsCompleteDescription(){
      return "<div><!--block--><strong>Fill all description of the criminal that are not listed above such as :</strong><br><br>1. Height :&nbsp;<br>2. Weight<br>3. Eye Color<br>4. Body Frame<br>5. Any other details</div>";
    }


    protected function getCountryId(){
      $countryId = DB::table("countries")->pluck("id")->toArray();
      $id = array_random($countryId);
      return $id ; 
    }



    protected function returnsCurrencyInfo(){
      return Country::pluck('currency_symbol','currency_code')->toArray() ; 
    }



  }
