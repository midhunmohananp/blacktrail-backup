<?php

use Illuminate\Database\Seeder;
use App\Group;
class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->testEloquent() ;

    	// querying a has many through relationship
/*
    	$group = Group::where('id',2)->first();
    	// dd($group);

        $groupCollection = $group->each(function ($group,$key){
            echo $group->group_name ; 

           foreach ($group as $key => $value) {
               # code...
           }

        }) ;*/

    }


    public function testZip()
    {
        $group = Group::get()->take(3) ;
        $zipped = $group->zip($group);
        // dd($zipped);
        $zip = $zipped->all() ;
        dd($zip);
    }


}


