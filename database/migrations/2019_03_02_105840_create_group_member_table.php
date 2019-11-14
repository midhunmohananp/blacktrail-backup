<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*members are non admins only*/
        Schema::create('group_members', function (Blueprint $table) {
          $table->increments('id')->comment('field_comment');
          $table->unsignedInteger('group_id')->comment('from the groups.id table');
          $table->string('alias',50)->comment('field_comment'); 
          $table->string('full_name',100)->comment('real_name');
          $table->foreign('group_id')
          ->references('id')->on('groups')
          ->onDelete('no action');
        });


        /*Skills */
        Schema::create('skills', function (Blueprint $table) {
          $table->increments('id')->comment('skills int');
          
          $table->unsignedInteger('group_member_id')->unsigned()->comment("group_members id ");
          
          $table->string('skill_name',100);
          
          $table->foreign('group_member_id')
          ->references('id')->on('group_members')
          ->onDelete('no action');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('group_members');
      Schema::dropIfExists('skills');
    }
  }
