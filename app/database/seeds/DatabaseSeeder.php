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
		//$this->call('AdminTableSeeder');
		$this->call('CategoryTableSeeder');
		$this->call('EquipmentTableSeeder');
		$this->call('UserTableSeeder');

  		$this->command->info('All tables seeded!');
	}
}

class UserTableSeeder extends Seeder {

        public function run()
        {
                DB::table('users')->delete();
                User::create(array(
                        'id' => 1,
                         'email'      =>  'mensah33@gmail.com',
                        'username' => 'mensah',
                        'name' => 'Norcius Noel',
                        'password' => Hash::make('bety2626'),
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
                User::create(array(
                        'id' => 2,
                         'email'      =>  'mensah9@hotmail.com',
                        'username' => 'seconduser',
                        'name' => 'mensah Noel',
                        'password' => Hash::make('second_password'),
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime
                ));
            }
    }




//class AdminTableSeeder extends Seeder {

    //         public function run()
    //         {
    //             DB::table('admins')->delete();
    //             Admin::create(array(
    //                     'id' =>8,
    //                      'email'      =>  'mensah@verizon.net',
    //                     'username' => 'mensah9',
    //                      'name' => 'Thomacino',
    //                     'password' => Hash::make('first_password'),
    //                     'created_at' => new DateTime,
    //                     'updated_at' => new DateTime
    //             ));
    //     }
    // }


