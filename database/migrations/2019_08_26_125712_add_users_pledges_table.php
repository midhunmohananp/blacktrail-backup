<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersPledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pledges', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal("pledge_amount");
            $table->unsignedInteger('pledge_id');
            $table->timestamps();
        });

       Schema::create('pledge_user', function (Blueprint $table) {
        $table->increments('id');
        $table->unsignedInteger('pledge_id');
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
        Schema::dropIfExists('pledge_user');
    }
}
