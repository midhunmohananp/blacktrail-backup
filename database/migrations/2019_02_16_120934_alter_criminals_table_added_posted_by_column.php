<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCriminalsTableAddedPostedByColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('criminals', function (Blueprint $table) {
                $table->unsignedInteger("posted_by")->after("status");
                $table->foreign('posted_by')->references('id')->on('users');
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
            $table->dropForeign(['posted_by']);
        });
    }
}
