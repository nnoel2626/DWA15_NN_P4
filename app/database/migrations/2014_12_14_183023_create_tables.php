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

		Schema::create('equipments', function($table) {
			# AI, PK
			$table->increments('id');
			# General data...
			$table->string('name');
			# Important! FK has to be unsigned because the PK it will reference is auto-incrementing
			$table->integer('category_id')->unsigned();
			# Define foreign keys...
			//$table->foreign('category_id')->references('id')->on('categories');
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
			$table->integer('equipment_id')->unsigned();
			# Define foreign keys...
			$table->foreign('equipment_id')->references('id')->on('equipments');
			# created_at, updated_at columns
			$table->timestamps();

		});

		Schema::create('category_equipment' , function($table){

			$table->integer('equipment_id')->unsigned();
			$table->foreign('equipment_id')->references('id')->on('equipments');

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

	{		Schema::drop('equipments_category');
			Schema::drop('equipments');
			Schema::drop('categories');

	}

}
