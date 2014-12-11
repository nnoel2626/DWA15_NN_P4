<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('AdminTableSeeder');
		$this->call('TagTableSeeder');
		//$this->call('AdminTableSeeder');
		//$this->call('UserTableSeeder');

  		$this->command->info('All tables seeded!');

	}

}

