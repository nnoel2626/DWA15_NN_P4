<?php

class ProjectorTableSeeder extends Seeder {

	Public function run( ) {


                DB::table('projectors')->delete();

              $Projectors = array(
                array(
                     'brand'                	 =>'Sanyo',
                         'model'               	=> 'WTC_500',
                        'serial_number'          => '1234',

                        'created_at'                => 'new DateTime',
                        'updated_at'              => 'new DateTime'
                        ),


                         array(
                      'brand'                 =>'Sanyo',
                        'model'                 => 'WTC_500',
                        'serial_number'     => '5678',

                         'created_at'          => 'new DateTime',
                        'updated_at'          => 'new DateTime'
                         ));

                         DB::table ('Projectors') ->insert($Projectors);
    }




}