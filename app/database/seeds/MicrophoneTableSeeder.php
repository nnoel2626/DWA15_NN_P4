<?php

class MicrophoneTableSeeder extends DatabaseSeeder {

	 /**
   * Run the database seeds.
   *
   * @return void
   */
    public function run()
    {
    # Clear the tables to a blank slate
    # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
    DB::statement('TRUNCATE microphones');

    # Authors
    $microphone = new Microphone;
    $microphone->caption = 'Microphone_image1';
    $microphone->path = '/images/microphone.jpg';
    $microphone->brand = 'shure';
    $microphone->name = 'Hand Held Mic';
    $microphone->model = 'L-185';
    $microphone->serial_number = '123456';

    $microphone->save();

    $microphone = new Microphone;
    $microphone->caption = 'Microphone_image2';
    $microphone->path = '/images/microphone.jpg';
    $microphone->brand = 'shure';
    $microphone->name = 'Hand Held Mic2';
    $microphone->model = 'L-185';
    $microphone->serial_number = '123789';

    $microphone->save();

  }

}