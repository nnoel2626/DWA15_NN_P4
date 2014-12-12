<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function($table) {

			# AI, PK
			$table->increments('id');

			# created_at, updated_at columns
			$table->timestamps();

			# General data....
			$table->string('name', 64);
			# Important! FK has to be unsigned because the PK it will reference is auto-incrementing
			//$table->integer('equipment_id')->unsigned();
			# Define foreign keys...
			//$table->foreign('equipment_id')->references('id')->on('equipments');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categries');
	}

}
