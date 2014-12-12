<?php

class Category extends Eloquent {
    protected $fillable = array('name');


    // Equipment has many category//
    public function Equipment()
    {
        return $this->belongsToMany('Equipment');
    }

}