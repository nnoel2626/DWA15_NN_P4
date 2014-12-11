<?php

class Equipment extends Eloquent {
	protected $fillable = [];

    # The guarded properties specifies which attributes should *not* be mass-assignable
    protected $guarded = array('id', 'created_at', 'updated_at');


    /**
    * Equipments belong to many Tags
    */
    public function tags() {
        return $this->belongsToMany('Tag');
    }
    /**
    * Search among equipment and tags
    * @return Collection
    */
    public static function search($query) {
        # If there is a query, search the library with that query
        if($query) {
            # Eager load tags and author
            $quipments = Equipment::with('tags','author')
            ->whereHas('author', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhereHas('tags', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            ->orWhere('title', 'LIKE', "%$query%")
            ->orWhere('published', 'LIKE', "%$query%")
            ->get();
            # Note on what `use` means above:
            # Closures may inherit variables from the parent scope.
            # Any such variables must be passed to the `use` language construct.
        }
        # Otherwise, just fetch all Equipments
        else {
            # Eager load tags and author
            $equipments = Equipment::with('tags','author')->get();
        }
        return $equipments;
    }
    /**
    * Searches and returns any Equipments added in the last 24 hours
    *
    * @return Collection
    */
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
