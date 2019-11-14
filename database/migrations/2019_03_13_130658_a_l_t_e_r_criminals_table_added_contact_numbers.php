<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ALTERCriminalsTableAddedContactNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criminals', function (Blueprint $table) {
            $table->string('contact_number',50)->default("911");
        });

        Schema::table('criminal_profiles', function (Blueprint $table) {
            $table->text('complete_description');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('criminals', function (Blueprint $table) {
            $table->dropColumn('contact_number');
        });

        Schema::table('criminal_profiles', function (Blueprint $table) {
            $table->dropColumn('complete_description');
        });
    }
}
