<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTripodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('tripods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('caption');
			$table->string('path');
			$table->string('name');
			$table->string('brand');
			$table->string('model');
			$table->integer('serial_number');
			$table->boolean('confirmed');
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
		Schema::drop('tripods');
	}

}
