<?php

class TripodTableSeeder extends Seeder {

	Public function run( ) {


                    DB::table('tripods')->delete();

                     $Tripods =   array(
                       array(
                       'brand'                    =>'Manfrotto',
                         'model'                    => 'SM58',
                        'serial_number'          => '1234',
                        'created_at'                => 'new DateTime',
                        'updated_at'              => 'new DateTime'  ),


                          array(
                      'brand'                 =>'Manfrotto',
                        'model'                 => 'L185',
                        'serial_number'     => '5678',
                         'created_at'          => 'new DateTime',
                        'updated_at'          => 'new DateTime'
                     ));

                    	   DB::table ('Tripods') ->insert($Tripods);
                     }

}