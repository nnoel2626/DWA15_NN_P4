<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('users', function($table)
		{
			$table->increments('id');

			$table->string('email', 60)->unique();
			$table->string('remember_token', 100);
			$table->string('password', 60);
			$table->string('first_name', 20);
			$table->string('last_name', 20);

			//$table->string('password_temp', 60);
			//$table->string('code', 60);

			//$table->integer('active');

			$table->timestamps();
		});

	}



            public function down()
            {
                Schema::drop('users');
            }

}
