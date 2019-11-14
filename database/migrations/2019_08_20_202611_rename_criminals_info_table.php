<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCriminalsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $from = 'criminal_infos';
        $to = 'criminal_profiles';
        Schema::rename($from, $to);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      $from = 'criminal_profiles';
      $to = 'criminal_profiles';
      Schema::rename($from, $to);
    }
}
