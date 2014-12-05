<?php

class ProjectorTableSeeder extends DatabaseSeeder {


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
        DB::statement('TRUNCATE projectors');

        # Authors
        $projector= new Projector;
        $projector->caption = 'Proj-photo';
        $projector->path = '/images/projector.jpg';
        $projector->brand = 'Manfrotto';
        $projector->name = 'projector_1';
        $projector->model = 'T-25';
        $projector->serial_number = '123456';

        $projector->save();

        $projector = new Projector;
        $projector->caption = 'Proj-photo2';
        $projector->path = '/images/projector.jpg';
        $projector->brand = 'Manfrotto';
        $projector->name = 'projector_2';
        $projector->model = 'T-25';
        $projector->serial_number = '123789';

        $projector->save();

    }

}