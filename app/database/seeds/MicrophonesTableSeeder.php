<?php

class MicrophonesTableSeeder extends Seeder {

	Public function run( ) {


                 /**
                 * Run the database seeds.
                 *
                 * @return void
                 */
                //clean up users table



            $Microphones = array(
                    array(
                       'brand'                	=>'Shure',
                         'model'              	=> 'SM58',
                        'serial_number'          => '1234',

                        'created_at'                => 'new DateTime',
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