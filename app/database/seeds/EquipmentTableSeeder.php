<?php

class EquipmentTableSeeder extends DatabaseSeeder {

            public function run()
            {

            # Clear the tables to a blank slate
              # Disable FK constraints so that all rows can be deleted, even if there's an attachd FK
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
                DB::statement('TRUNCATE equipment');


                $audiorecorder = new Equipment;
                $audiorecorder->name = 'audiorecorder';
                $audiorecorder->brand = 'sony';
                $audiorecorder->model = 'L-185';
                $audiorecorder->serial_number = '123456';
                $audiorecorder->image_path ='/public/images/';
                $audiorecorder->save();

                $category = Category::where('name', '=','audiorecorder')->first();
                $audiorecorder->categories()->attach($category->id);


                  $dungle = new Equipment;
                  $dungle->name = 'dungle';
                 $dungle->brand = 'extron';
                 $dungle->model = 'l-185';
                 $dungle->serial_number = '123789';
                 $dungle->image_path ='/public/images/';
                $dungle->save();

                 $category = Category::where('name', '=','dungle')->first();
                 $dungle->categories()->attach($category->id);



                  # equipment
                 $laptop = new Equipment;
                 $laptop->name = 'laptop';
                 $laptop->brand = 'dell';
                 $laptop->model = 'Latitude';
                 $laptop->serial_number = '123456';
                 $laptop->image_path ='/public/images/';
                 $laptop->save();

                 $category = Category::where('name', '=','laptop')->first();
                $laptop->categories()->attach($category->id);



                   $mac  = new Equipment;
                   $mac ->name = 'mac';
                   $mac ->brand = 'apple';
                   $mac ->model = 'Mac-Pro';
                   $mac ->serial_number = '123789';
                   $mac ->image_path ='/public/images/';
                   $mac ->save();

                 $category = Category::where('name', '=','mac')->first();
                  $mac->categories()->attach($category->id);




                 $microphone = new Equipment;
                $microphone->name = 'microphone';
                 $microphone->brand = 'shure';
                 $microphone->model = 'sm-58';
                 $microphone->serial_number = '1255456';
                 $microphone->image_path = '/public/images/';
                 $microphone->save();

                  $category = Category::where('name', '=','microphone')->first();
                   $microphone->categories()->attach($category->id);

                 $projector = new Equipment;
                 $projector->name = 'projector';
                 $projector->brand = 'sanyo';
                 $projector->model = 'wtc-500';
                $projector->serial_number = '1254566';
                 $projector->image_path = '/public/images/';
                 $projector->save();

                 $category = Category::where('name', '=','projector')->first();
                 $projector->categories()->attach($category->id);

                 $tripod = new Equipment;
                $tripod->name = 'tripod';
                $tripod->brand = 'manfrotto';
                 $tripod->model = 'T-25';
                 $tripod->serial_number = '1254566';
                 $tripod->image_path = '/public/images/';
                 $tripod->save();

                 $category = Category::where('name', '=','tripod')->first();
                 $tripod->categories()->attach($category->id);


                $videocamera = new Equipment;
                 $videocamera->name = 'videocamera';
                 $videocamera->brand = 'sony';
                 $videocamera->model = 'ts4000';
                 $videocamera->serial_number = '1254566';
                 $videocamera->image_path = '/public/images/';
                 $videocamera->save();

                 $category = Category::where('name', '=','videocamera')->first();
                 $videocamera->categories()->attach($category->id);

                 // $sound_system = new equipment;
                 // $sound_system->name ='sound_system';
                 // $sound_system->brand = 'biamp';
                 // $sound_system->model = 't-25';
                 // $sound_system->serial_number = '1254566';
                 // $sound_system->image_path = '/public/images/';
                 // $sound_system->save();

                 // $category = Category::where('name', '=','sound_system')->first();
                 // $sound_system->categories()->attach($category->id);
            }
 }