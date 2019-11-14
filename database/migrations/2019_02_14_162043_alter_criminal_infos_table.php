<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCriminalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('criminal_profiles', function (Blueprint $table) {
            $table->decimal('bounty',50)->after('body_frame');
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
             $table->dropColumn('bounty');
        });
    }
}
