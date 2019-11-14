<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime ; 
use Faker\Generator as Faker ;
use Carbon\Carbon ;  

/*used for reviewing algorithms 
and function
*/
class ReviewController extends Controller
{
	public function returnsHeightofPeople(){
		$five = 5 ;
		for ($i=0; $i <=12; $i++) { 
			if ($i === 12){
				$i = $five +
				print $five ."'\n" .$i;
			}
		}
	}	

	/*passed*/
	public function returnsAge(Faker $faker)
	{
		$date = $faker->date('Y-m-d'); 
		$dob = new DateTime($date);
	//We need to compare the user's date of birth with today's date.
		$now = new DateTime();
	//Calculate the time difference between the two dates.
		$difference = $now->diff($dob);
	//Get the difference in years, as we are looking for the user's age.
		$age = $difference->y;
	//Print it out.
		echo $age. " is the age of someone born on ".$date;
	}

	/*Fizz Buzz..*/	
	public function fizzBuzz()
	{
		/*for ($i=1; $i <= $number; $i++) { 
		if ($i %  15 === 0 ) {
		echo $i ."Fizzbuzz";
		echo "<br/>";
		}

		elseif ( $i % 3 === 0) {
		echo $i ." Fizz";
		}

		elseif ( $i % 5 === 0) {
		echo $i ." Buzz";
		}
		else echo $i ; 
	}*/
	$number = 15 ; 
	
	for ($i=1; $i <= $number; $i++) { 

		echo $i ."<br/>";
	}



}


/**/
public function caesarCipher($string, $num)
{

		// when we have the $string="zoo keeper" and the $num = z + a + b
		// then return ''bqq mggrgt'

}


/*You have been given two strings. You have to find out whether you can make up the first string with the words present in the second string.*/
public function harmlessRansomNote()
{
	$noteText = "Lorem ipsum dolor sit amet ,consectetur adipisicing elit. Saepe laboriosam vel earum sequi amet fuga reprehenderit porro laborum, consequuntur voluptas.";
	$magazineText = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo natus possimus mollitia alias earum cumque soluta unde reprehenderit, exercitationem accusantium..";

	explode(' ', $noteText);

	dd($noteText,$magazineText);


}


public function reVue()
{
	return view("Revue");
}



}
