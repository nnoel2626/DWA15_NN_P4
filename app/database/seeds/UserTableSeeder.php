<?php

class UserTableSeeder extends DatabaseSeeder {

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
    }

}