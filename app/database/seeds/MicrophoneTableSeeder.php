<?php

class MicrophoneTableSeeder extends Seeder {

	Public function run( ) {

                 DB::table('microphones')->delete();

                     $Microphones = array(
                        array(

                       'brand'                	     =>'Shure',
                         'model'                   => 'SM58',
                        'serial_number'        => '1234',
                        'created_at'              => 'new DateTime',
                        'updated_at'              => 'new DateTime'
                         ),

                        array(
                          'brand'                 =>'Shure',
                        'model'                 => 'L185',
                        'serial_number'     => '5678',
                         'created_at'          => 'new DateTime',
                        'updated_at'          => 'new DateTime'
                    ));

                     DB::table ('Microphones') ->insert($Microphones);
             }

}