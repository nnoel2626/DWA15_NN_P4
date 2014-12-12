<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Equipments', function($table) {
			# AI, PK
			$table->increments('id');

			# created_at, updated_at columns
			$table->timestamps();

			# General data...
			$table->string('name');
			$table->string('brand');
			$table->string('model');
			$table->string('serial_number');
			$table->string('image_path');
			# Important! FK has to be unsigned because the PK it will reference is auto-incrementing
			 //$table->integer('category_id')->unsigned();


			# Define foreign keys...
			//$table->foreign('category_id')->references('id')->on('categories');

		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Equipments');
	}
}