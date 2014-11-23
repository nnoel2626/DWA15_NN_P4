<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	Schema::create('admins', function(Blueprint $table)
	{
			//create the admins table
            $table->increments('id');

            $table->string('email')->unique();

            $table->string('username');

            $table->string('harvard-id', 12);

            $table->string('password', 60);


	});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	 //destroy the admins table
	Schema::drop('admins');
	}

}
