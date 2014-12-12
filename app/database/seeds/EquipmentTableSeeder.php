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
                 DB::statement('TRUNCATE Equipments');
                

                 # equipments
                $equipment = new Equipment;
                $equipment->name = 'Microphone';
                $equipment->brand = 'shure';
                $equipment->model = 'L-185';
                $equipment->serial_number = '123456';
                $equipment->image_path ='/public/images/';
                $category = Category::where('name','=','microphone');
                $equipment->save();
                $equipment->Category()->attach($category);


                // $equipment = new Equipment;
                // $equipment->name = 'Microphone';
                // $equipment->brand = 'shure';
                // $equipment->model = 'L-185';
                // $equipment->serial_number = '123789';
                // $equipment->save();
                // $equipment->Category()->attach($category);

                // $equipment->image_path ='/public/images/';

                // # equipments
                // $equipment= new Equipment;
                // $equipment->name = 'Projector';
                // $equipment->brand = 'Manfrotto';
                // $equipment->model = 'Sanyo WTC_500';
                // $equipment->serial_number = '123456';
                // $equipment->image_path ='/public/images/';
                // $equipment->save();
                // $equipment->Category()->attach($category);


                // $equipment = new Equipment;
                //  $equipment->name = 'Projector';
                // $equipment->brand = 'Manfrotto';
                // $equipment->model = 'Sanyo WTC_500';
                // $equipment->serial_number = '123789';
                // $equipment->image_path ='/public/images/';
                // $equipment->save();
                // $equipment->Category()->attach($category);



                // # equipments
                // $equipment = new Equipment;
                // $equipment->name = 'Tripod';
                // $equipment->brand = 'Manfrotto';
                // $equipment->model = 'T-25';
                // $equipment->serial_number = '1255456';
                // $equipment->serial_number = '/public/images/';
                // $equipment->save();

                // $equipment = new Equipment;
                // $equipment->name = 'tripod';
                // $equipment->brand = 'Manfrotto';
                // $equipment->model = 'T-25';
                // $equipment->serial_number = '1254566';
                // $equipment->serial_number = '/public/images/';
                // $category = Category::where('name','=','microphone');
                // $equipment->save();
                // $equipment->Category()->attach($category);

  }

}