<?php
use Illuminate\Database\Seeder;
use App\Crime ;
class CrimesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
        Crime::truncate() ; 
        $faker = \Faker\Factory::create();
        
        collect([
          [
           'name' => 'Kidnapping',
           'description' => $faker->realText(90,3) ,
         ],
         [
           'name' => 'Armed Robbery',
           'description' => $faker->realText(90,3)
         ],
         [
           'name' => 'Arson',
           'description' => $faker->realText(90,3)
         ],
         [
           'name' => 'Drug Trafficking',
           'description' => $faker->realText(90,3)
         ],
         [
          'name' => 'Terrorism',
          'description' => $faker->realText(90,3)
         ],	
         [
           'name' => 'Extortion',
           'description' => $faker->realText(90,3)
         ], 
         [
           'name' => 'Human Trafficking',
           'description' => $faker->realText(90,3)
         ],
     ])->each(function ($crime) {
      factory(Crime::class)->create([
       'criminal_offense' => $crime['name'],
       'description' => $crime['description']
     ]);
    });

}
}
