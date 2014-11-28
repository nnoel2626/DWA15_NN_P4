<?php



class CreateAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('admins', function(Blueprint $table)
		{

			$table->increments('id');

			$table->string('email', 60)->unique();
			$table->string('username', 20);
			$table->string('name', 20);
			$table->string('password', 60);
			$table->string('password_temp', 60);
			$table->string('code', 60);
			$table->string('remember_token', 100)->nullable();
			$table->integer('active');
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
	Schema::drop('admins');
	}

}
