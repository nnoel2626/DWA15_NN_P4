<?php
class CategoryTableSeeder extends DatabaseSeeder {

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
        DB::statement('TRUNCATE categories');

        # Categorys (Created using the Model Create shortcut method)
        # Note: Category model must have `protected $fillable = array('name');` in order for this to work
        $audiorecorder          = Category::create(array('name' => 'audiorecorder'));
        $dungle                     = Category::create(array('name' => 'dungle'));
        $laptop                      = Category::create(array('name' => 'laptop'));
        $mac                          = Category::create(array('name' => 'mac'));
        $microphone             = Category::create(array('name' => 'microphone'));
        $projector                  = Category::create(array('name' => 'projector'));
        $tripod                       = Category::create(array('name' => 'tripod'));
        $videocamera            = Category::create(array('name' => 'videocamera'));
        $sound_system         = Category::create(array('name' => 'sound_system'));



    }

}