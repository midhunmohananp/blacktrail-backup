<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCriminalInfosTableChangedCountriesDatatypeToInteger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    
        Schema::table('criminal_profiles', function (Blueprint $table) {
            $table->unsignedInteger('country_last_seen')->after("birthplace")->nullable();
        /*    $table->unsignedInteger('country_of_origin')->after("country_last_seen")->nullable();*/
        });

        Schema::table('crime_criminal', function (Blueprint $table) {
                $table->string("crime_description");
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('criminal_profiles', function (Blueprint $table) {
            $table->dropColumn(['country_last_seen','country_of_origin']);
        });

         Schema::table('crime_criminal', function (Blueprint $table) {
            $table->dropColumn(['crime_description']);
        });
    }
}
