<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('equipment', function($table) {
			# AI, PK
			$table->increments('id');
			# General data...
			# Important! FK has to be unsigned because the PK it will reference is auto-incrementing

			# Define foreign keys...
			$table->string('name');
			$table->string('brand');
			$table->string('model');
			$table->string('serial_number');
			$table->string('image_path');

			# created_at, updated_at columns
			$table->timestamps();
		});



		Schema::create('categories', function($table) {

			# AI, PK
			$table->increments('id');
			# General data....
			$table->string('name', 64);
			# Important! FK has to be unsigned because the PK it will reference is auto-incrementing

			# Define foreign keys...

			# created_at, updated_at columns
			$table->timestamps();

		});

		Schema::create('category_equipment' , function($table){

			$table->integer('equipment_id')->unsigned();
			$table->foreign('equipment_id')->references('id')->on('equipment');

			# Define foreign keys...

			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories');
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()

	{
			Schema::drop('equipment');
			Schema::drop('categories');
			Schema::drop('category_equipment');

	}

}
