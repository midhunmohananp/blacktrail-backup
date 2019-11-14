<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriminalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('criminal_profiles', function (Blueprint $table) {
        $table->integer('criminal_id')->unsigned()->comment('from the criminals tbale');
        $table->string('birthplace',100)->comment('from the criminals tbale');
        $table->date('birthdate');
        $table->decimal('age',8,2);
        $table->string('last_seen');
        $table->string('eye_color');
        $table->string('weight_in_kilos');
        $table->string('height_in_feet_and_inches');
        $table->string("country_of_origin",100);

        $table->foreign('criminal_id')->references('id')->on('criminals');


        $table->enum('body_frame',['skinny','medium','muscular','heavy']);
        $table->timestamps();

    });


          /* Schema::table('criminals', function (Blueprint $table) {
               $table->dropForeign('country_id');
           });
*/
       }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('criminal_profiles');
/*
        Schema::table('criminals', function (Blueprint $table) {
         $table->dropForeign('criminals_country_id');
     
        });
*/
    }
}
