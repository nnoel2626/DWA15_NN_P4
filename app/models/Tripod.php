<?php

class Tripod extends \Eloquent {

    protected $guarded = array('id', 'created_at', 'updated_at');


    public function add() {
        Feature::create (array(

            'name'          =>input::get('name'),
            'model'         =>input::get('model'),
            'serial_number' =>input::get('serial_number'),
            'path'          =>input::get('path'),

            ));
    }

    // Add your validation rules here
    public static $rules = [
             'brand' => 'required',
             'model' => 'required',
            'serial_number' => 'integer',
    ];






}