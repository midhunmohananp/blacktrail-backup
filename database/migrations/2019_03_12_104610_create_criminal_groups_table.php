<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriminalGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminal_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->unsignedInteger('country_of_origin_id');
            $table->foreign('country_of_origin_id')
            ->references('id')
            ->on('countries')
            ->onDelete('restrict');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('criminal_groups');
    }
}
