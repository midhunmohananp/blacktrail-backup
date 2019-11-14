<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCriminalStatusesTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{

/*
1 - Captured
2 - At Large
*/

Schema::table('criminals', function (Blueprint $table) {
	$table->enum('status', ['1','0']);
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
		$table->dropColumn('status');
	});   

}
}
