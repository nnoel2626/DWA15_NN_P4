<?php

class Tripod extends \Eloquent {
          protected $guarded = array('brand', 'model','serial_number');

        //protected $table = 'tripods';

        //     public function add() {
        // // Add your validation rules here//
        //     static $rules =
        //     [
        //         'brand'             => 'required',
        //         'model'             => 'required',
        //         'serial_number' => 'integer',
        //     ];

        //     Feature::create (array(
        //     'name'              =>input::get('name'),
        //     'model'             =>input::get('model'),
        //     'serial_number' =>input::get('serial_number'),
        //     ));
        //             $tripod->save();

        //     }

            public static function getIdNamePair() {
            $tripods = Array();
            $collection = tripods::all();
            foreach($collection as $tripod) {
            $tripods[$tripod->id] = $tripod->name;
            }
            return $tripods;
            }

            public static function boot() {
            parent::boot();
            static::deleting(function($tripod){
            DB::statement('DELETE FROM tripod
             WHERE tripod_id = ?', array($tripod->id));
            });

             }


}




        // public function add() {

        //     Feature::create (array(
        //     'name'          =>input::get('name'),
        //     'model'         =>input::get('model'),
        //     'serial_number' =>input::get('serial_number'),
        //     'path'          =>input::get('path'),

        //
 // // Add your validation rules here
    //     public static $rules = [
    //          'brand' => 'required',
    //          'model' => 'required',
    //         'serial_number' => 'integer',
    //       ];

        # Model events...
        # http://laravel.com/docs/eloquent#model-events