 <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentCategoryTable extends Migration {


	public function up()
	{
		Schema::create('equipment_category', function($table){

			$table->integer('equipments_id')->unsigned;
			$table->integer('categories_id')->unsigned;

			# Define foreign keys...
			$table->foreign('equipments_id')->references('id')->on('equipments');
			$table->foreign('categories_id')->references('id')->on('categories');

			});

	}

	Public function down()
	{
		Schema::drop('equipment_category');
	}
 }
