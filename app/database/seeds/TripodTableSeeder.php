<?php

class TripodTableSeeder extends DatabaseSeeder {

    public function run( )
    {
    # Clear the tables to a blank slate
    # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::statement('TRUNCATE tripods');

    # Authors
    $tripod = new Tripod;
    $tripod->caption = 'Tripod_image';
    $tripod->path = '/images/tripod.jpg';
    $tripod->brand = 'Manfrotto';
    $tripod->name = 'Tripod_1';
    $tripod->model = 'T-25';
    $tripod->serial_number = '1255456';
    $tripod->save();


  }

}