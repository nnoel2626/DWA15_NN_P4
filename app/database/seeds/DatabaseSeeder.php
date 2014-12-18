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

		$this->call('CategoryTableSeeder');

		$this->call('EquipmentTableSeeder');

		$this->call('UserTableSeeder');

  		$this->command->info('All tables seeded!');
	}
}






