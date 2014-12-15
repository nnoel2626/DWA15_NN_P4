<?php

class EquipmentTableSeeder extends DatabaseSeeder {

     /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
            {

            # Clear the tables to a blank slate
                 DB::statement('SET FOREIGN_KEY_CHECKS=0'); # Disable FK constraints so that all rows can be deleted, even if there's an associated FK

                 DB::statement('TRUNCATE equipments');

                 # equipments
                $audiorecorder = new Equipment;
                $audiorecorder->name= 'Audiorecorder';
                $audiorecorder->brand = 'shure';
                $audiorecorder->model = 'L-185';
                $audiorecorder->serial_number = '123456';
                $audiorecorder->image_path ='/public/images/';
                $audiorecorder->save();
                //$audiorecorder->category()->associate($category);

                $dungle = new Equipment;
                $dungle->name = 'Dungle';
                $dungle->brand = 'Mac_adapter';
                $dungle->model = 'L-185';
                $dungle->serial_number = '123789';
                $dungle->image_path ='/public/images/';
                $dungle->save();
                //$dungle->Category()->attach($category);



                # equipments
                $laptop= new Equipment;
                $laptop->name = 'Laptop';
                $laptop->brand = 'Dell';
                $laptop->model = 'Latitude';
                $laptop->serial_number = '123456';
                $laptop->image_path ='/public/images/';
                $laptop->save();
                //$laptop->Category()->attach($category);


                  $mac  = new Equipment;
                   $mac ->name = 'Mac';
                  $mac ->brand = 'Apple';
                  $mac ->model = 'Mac-Pro';
                  $mac ->serial_number = '123789';
                  $mac ->image_path ='/public/images/';
                  $mac ->save();
                  //$mac ->Category()->attach($category);



                # equipments
                $microphone = new Equipment;
                $microphone->name = 'Microphone';
                $microphone->brand = 'Shure';
                $microphone->model = 'SM-58';
                $microphone->serial_number = '1255456';
                $microphone->serial_number = '/public/images/';
                $microphone->save();
                //$microphone->Category()->attach($category);

                $projector = new Equipment;
                $projector->name = 'Projector';
                $projector->brand = 'Sanyo';
                $projector->model = 'WTC-500';
                $projector->serial_number = '1254566';
                $projector->serial_number = '/public/images/';

                $projector->save();
                //$projector->Category()->attach($category);

                $tripod = new Equipment;
                $tripod->name = 'tripod';
                $tripod->brand = 'Manfrotto';
                $tripod->model = 'T-25';
                $tripod->serial_number = '1254566';
                $tripod->serial_number = '/public/images/';

                $tripod->save();
                $tripod->Category()->attach($category);


                $videocamera = new Equipment;
                $videocamera->name = 'videocamera';
                $videocamera->brand = 'Sony';
                $videocamera->model = 'TS4000';
                $videocamera->serial_number = '1254566';
                $videocamera->serial_number = '/public/images/';
                $$videocamera->save();
                //$videocamera->Category()->attach($category);


                $sound_system = new Equipment;
                $sound_system->name = 'sound_system';
                $sound_system->brand = 'Biamp';
                $sound_system->model = 'T-25';
                $sound_system->serial_number = '1254566';
               $sound_system->serial_number = '/public/images/';

                $sound_system->save();
                //$sound_system->Category()->attach($category);

            }

}