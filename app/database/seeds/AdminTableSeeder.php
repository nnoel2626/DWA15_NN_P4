<?php

class AdminTableSeeder extends DatabaseSeeder {

  public function run( )
  {

      DB::table('admins')->delete();

        $admin = new Admin;

        $admin ->fill ( array(

        'email' => 'mensah9@verizon.net',
        'username' => 'mensah9',
        'name'        => 'Norcius Noel'
        ));

        $admin->password = Hash::make('bety2626');
        $admin->save();
    }

}