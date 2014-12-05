<?php

class Tripod extends Eloquent {

            protected $fillable = array( 'brand', 'model',  'serial_number', );

            // public function tripods() {
            // # Tags belong to many Books
            // return $this->belongsToMany('User');
            //}

            # Model events...
            # http://laravel.com/docs/eloquent#model-events


            // public static function boot() {
            // parent::boot();


            // static::deleting(function($id){
            // DB::statement('DELETE FROM tripods
            //  WHERE tripod_id = ?', array($tripod->id));
            // });

            //  }


}



