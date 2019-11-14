<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCriminalsInfosTableAddedBounty extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criminal_profiles', function (Blueprint $table) {
            $table->string("currency",5)->nullable() ; 
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
            $table->dropColumn('currency');
        });
    }
}
