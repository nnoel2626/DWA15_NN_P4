<?php

class Equipment extends Eloquent {


    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');


    /**
    * Equipments belong to many categories
    */
    public function categories() {
        return $this->belongsToMany('Category');
    }

    /**
    * This array will compare an array of given categories with existing categories
    * and figure out which ones need to be added and which ones need to be deleted
    */
    public function updateCategories($new = array()) {
        // Go through new tags to see what ones need to be added
        foreach($new as $category) {
            if(!$this->categories->contains($category)) {
                $this->categories()->save(Category::find($category));
            }
        }
        // Go through existing tags and see what ones need to be deleted
        foreach($this->categories as $category) {
            if(!in_array($category->pivot->category_id,$new)) {
                $this->categories()->detach($category->id);
            }
        }
    }


//        /**
//     * Search among equipment and categories
//     * @return Collection
//     */
    public static function search($query) {
        #If there is a query, search the library with that query
        if($query) {
            #Eager load categories and author
            $quipments = Equipment::with('categories')
            ->whereHas('category', function($q) use($query) {
               $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('categories', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })

            ->orWhere('brand', 'LIKE', "%$query%")
            ->orWhere('model', 'LIKE', "%$query%")
           ->get();
            #Note on what `use` means above:
            #Closures may inherit variables from the parent scope.
            #Any such variables must be passed to the `use` language construct.
        }
        #Otherwise, just fetch all Equipments
        else {
            #Eager load categories and author
           $equipments = Equipment::with('categories')->get();
        }
       return $equipments;
    }



     /* Searches and returns any Equipments added in the last 24 hours*/


    public static function getEquipmentsAddedInTheLast24Hours() {
        # Timestamp of 24 hours ago
        $past_24_hours = strtotime('-1 day');
        # Convert to MySQL timestamp
        $past_24_hours = date('Y-m-d H:i:s', $past_24_hours);
        $equipments = Equipment::where('created_at','>',$past_24_hours)->get();
        return $equipments;
    }
    /**
    *
    *
    * @return String
    */
    public static function sendDigests($users,$equipments) {
        $recipients = '';
        $data['equipments'] = $equipments;
        foreach($users as $user) {
            $data['user'] = $user;
            /*
            Mail::send('emails.digest', $data, function($message) {
                $recipient_email = $user->email;
                $recipient_name  = $user->first_name.' '.$user->last_name;
                $subject  = 'FooEquipments Digest';
                $message->to($recipient_email, $recipient_name)->subject($subject);
            });
            */
            $recipients .= $user->email.', ';
        }
        $recipients = rtrim($recipients, ',');
        return $recipients;
    }
}
