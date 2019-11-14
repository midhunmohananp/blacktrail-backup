<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCriminalsTableAddedCountryId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criminals', function (Blueprint $table) {

            $table->unsignedInteger('country_id');
            $table->foreign('country_id')
            ->references('id')->on('countries')
            ->onDelete('cascade');

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

            $table->dropForeign("country_id");
        });
    }
}
