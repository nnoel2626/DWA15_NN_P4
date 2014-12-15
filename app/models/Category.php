<?php

class Category extends Eloquent {
    protected $fillable = array('name');


    // Equipment has many category//
    public function equipments()
    {
        return $this->belongsToMany('Equipment');
    }

# Model events...
    # http://laravel.com/docs/eloquent#model-events
    public static function boot() {
        parent::boot();
        static::deleting(function($category) {
            DB::statement('DELETE FROM category_equipment WHERE category_id = ?', array($category->id));
        });
    }


    /**
    *
    * @return Array
    */
         public static function getIdNamePair() {
            $categories = Array();
             $collection = Category::all();
                foreach($collection as $category) {
                $categories[$category->id] = $category->name;
            }
            return $categories;
         }
}