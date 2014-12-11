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
                DB::statement('TRUNCATE microphones');
                DB::statement('TRUNCATE projectors');
                DB::statement('TRUNCATE tripods');


                 # Microphones
                $microphone = new Microphone;
                $microphone->brand = 'shure';
                $microphone->name = 'Hand Held Mic';
                $microphone->model = 'L-185';
                $microphone->serial_number = '123456';

                $microphone->save();

                $microphone = new Microphone;
                $microphone->brand = 'shure';
                $microphone->name = 'Hand Held Mic2';
                $microphone->model = 'L-185';
                $microphone->serial_number = '123789';
                $microphone->save();


                # Projectors
                $projector= new Projector;

                $projector->brand = 'Manfrotto';
                $projector->name = 'projector_1';
                $projector->model = 'T-25';
                $projector->serial_number = '123456';

                $projector->save();

                $projector = new Projector;

                $projector->brand = 'Manfrotto';
                $projector->name = 'projector_2';
                $projector->model = 'T-25';
                $projector->serial_number = '123789';

                $projector->save();


                # Tripods
                $tripod = new Tripod;

                $tripod->brand = 'Manfrotto';
                $tripod->name = 'Tripod_1';
                $tripod->model = 'T-25';
                $tripod->serial_number = '1255456';
                $tripod->save();

                $tripod = new Tripod;

                $tripod->brand = 'Manfrotto';
                $tripod->name = 'Tripod_2';
                $tripod->model = 'T-25';
                $tripod->serial_number = '1254566';
                $tripod->save();

  }

}