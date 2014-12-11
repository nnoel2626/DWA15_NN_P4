<?php
class TagTableSeeder extends DatabaseSeeder {


    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run( )
        {
        # Clear the tables to a blank slate
        # Disable FK constraints so that all rows can be deleted, even if there's an associated FK
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::statement('TRUNCATE tags');

        # Tags (Created using the Model Create shortcut method)
        # Note: Tags model must have `protected $fillable = array('name');` in order for this to work
        $audiorecorder         = Tag::create(array('name' => 'audiorecorder'));
        $dungle       = Tag::create(array('name' => 'dungle'));
        $laptop    = Tag::create(array('name' => 'laptop'));
        $mac       = Tag::create(array('name' => 'mac'));
        $microphone        = Tag::create(array('name' => 'microphone'));
        $projector         = Tag::create(array('name' => 'projector'));
        $tripod = Tag::create(array('name' => 'tripod'));
        $videocamera = Tag::create(array('name' => 'videocamera'));
        $tripod = Tag::create(array('name' => 'tripod'));
        $sound_system = Tag::create(array('name' => 'sound_system'));


    }

}



