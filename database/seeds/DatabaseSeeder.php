<?php
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
		/**
		* Run the database seeds.
		*
		* @return void
		*/	
		public function run()
		{
		// $this->initial_seed();
			$this->seed_crimes_info();
		}

		function initial_seed()
		{

			$this->call('CountriesSeeder');

			$this->command->info('Seeded the countries!'); 

			$this->call('RolesSeeder');

			$this->command->info('Seeded the roles!'); 
		}

		function seed_crimes_info(){
		/*		$this->call('CrimesSeeder');		
			$this->command->info('Seeded crimes!'); 
		*/
			$this->call('CrimeCriminalSeeder');
			$this->command->info('Seeded crime and criminals!'); 			
		}

}
