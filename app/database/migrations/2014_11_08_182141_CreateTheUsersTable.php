<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTheUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			//create the users table
           		 $table->increments('id');

           		 $table->text('username',20);

            		 $table->string('email')->unique();

             	$table->string('Harvard_id', 12);

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
        //destroy the users table
		Schema::drop('users');
	}

}