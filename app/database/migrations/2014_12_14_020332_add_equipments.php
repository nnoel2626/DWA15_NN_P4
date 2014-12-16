<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEquipments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

                 DB::table('equipments')->insert(array(
                            'name'=>'Audiorecorder',
                             'brand' => 'Maranzt ',
                             'model' => 'g-257',
                            'serial_number' => '124589',
                            'image_path' =>'images/marantz_1.jpg ',
                            'created_at' => date('Y-m-d H:m:s'),
                            'updated_at' => date('Y-m-d H:m:s')
            ));

	 DB::table('equipments')->insert(array(
      		'name' => 'Laptop',
                        'brand' => 'Dell',
                	'model' => 'Latitude',
              	'serial_number' => '123456',
              	'image_path' =>'images/mac_dungle.jpg ',
      		'created_at' => date('Y-m-d H:m:s'),
      		'updated_at' => date('Y-m-d H:m:s')
      		));

	   DB::table('equipments')->insert(array(
		               'name' => 'Mac',
                            'brand' => 'Apple',
        	               'model' => 'Mac-Pro',
                            'serial_number' => '145689',
                            'image_path' =>'images/Sanyo-wtc500.jpg ',
      		'created_at' => date('Y-m-d H:m:s'),
      		'updated_at' => date('Y-m-d H:m:s')
      		));


                         DB::table('equipments')->insert(array(
                          'name' => 'Microphone',
                           'brand' => 'Shure',
                           'model' => 'SM-58',
                            'serial_number' => '1659889',
                            'image_path' =>'images/dell_laptop.jpg',
                             'created_at' => date('Y-m-d H:m:s'),
                             'updated_at' => date('Y-m-d H:m:s')
                        ));

                         DB::table('equipments')->insert(array(
                       'name' => 'Projector',
                        'brand' => 'Sanyo',
                    'model' => 'WTC-500',
                'serial_number' => '123456',
                'image_path' =>'images/mac_dungle.jpg ',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
            ));



                         DB::table('equipments')->insert(array(
                        'name' => 'Tripod',
                        'brand' => 'Manfrotto',
                    'model' => 'H-356',
                'serial_number' => '123456',
                'image_path' =>'images/mac_dungle.jpg ',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
            ));


                         DB::table('equipments')->insert(array(
                   'name' => 'videocamera',
                        'brand' => 'Sony',
                    'model' => 'TS4000',
                'serial_number' => '123456',
                'image_path' =>'images/mac_dungle.jpg ',
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s')
            ));


                         DB::table('equipments')->insert(array(
                    'name' => 'sound_system',
                        'brand' => 'mac_adaptor',
                    'model' => 'Mac_DVI',
                        'serial_number' => '123456',
                     'image_path' =>'images/mac_dungle.jpg ',
                     'created_at' => date('Y-m-d H:m:s'),
                    'updated_at' => date('Y-m-d H:m:s')
            ));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		  DB::table('equipments')->where('brand', '=', 'Dungle')->delete();
		  DB::table('equipments')->where('brand', '=', 'Audiorecorder')->delete();
	              DB::table('equipments')->where('brand', '=', 'Mac')->delete();
		  DB::table('equipments')->where('brand', '=', 'Dell')->delete();

	}

}
