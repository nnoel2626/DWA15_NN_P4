<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('projectors', function(Blueprint $table)
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
		Schema::drop('projectors');
	}

}
