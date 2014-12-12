<?php

class EquipmentController extends \BaseController {


    /**
    *
    */
    // public function __construct() {

    //     # Make sure BaseController construct gets called
    //     parent::__construct();

    //     $this->beforeFilter('auth', array('except' => ['getIndex','getDigest']));

    //}


    /**
    * Used as an example for something you might want to set up a cron job for
    */
    // public function getDigest() {

    //     $Equipments = Equipment::getEquipmentsAddedInTheLast24Hours();

    //     $users = User::all();

    //     $recipients = Equipment::sendDigests($users,$Equipments);

    //     $results = 'Equipment digest sent to: '.$recipients;

    //     Log::info($results);

    //     return $results;

    // }


    /**
    * Process the searchform
    * @return View
    */
    public function getSearch() {

        return View::make('Equipment_search');

    }


    /**
    * Display all Equipments
    * @return View
    */
    public function getIndex() {

        # Format and Query are passed as Query Strings
        $format = Input::get('format', 'html');

        $query  = Input::get('query');

        $equipments = Equipment::search($query);

        # Decide on output method...
        # Default - HTML
        if($format == 'html') {
            return View::make('equipment.equipment_index')
                ->with('equipments', $Equipments)
                ->with('query', $query);
        }
        # JSON
        elseif($format == 'json') {
            return Response::json($equipments);
        }
        # PDF (Coming soon)
        elseif($format == 'pdf') {
            return "This is the pdf (Coming soon).";
        }


    }


    /**
    * Show the "Add a Equipment form"
    * @return View
    */
    public function getCreate() {

        $authors = Author::getIdNamePair();

        return View::make('/equipment/equipment_add')->with('authors',$authors);

    }


    /**
    * Process the "Add a Equipment form"
    * @return Redirect
    */
    public function postCreate() {

        # Instantiate the Equipment model
        $equipment = new Equipment();

        $equipment->fill(Input::all());
        $equipment->save();

        # Magic: Eloquent
        $equipment->save();

        return Redirect::action('EquipmentController@getIndex')->with('flash_message','Your Equipment has been added.');

    }


    /**
    * Show the "Edit a Equipment form"
    * @return View
    */
    public function getEdit($id) {

        try {
            $Equipment    = Equipment::findOrFail($id);
            $authors = Author::getIdNamePair();
        }
        catch(exception $e) {
            return Redirect::to('/equipment')->with('flash_message', 'Equipment not found');
        }

        return View::make('equipment.equipment_edit')
            ->with('Equipment', $equipment)
            ->with('authors', $authors);

    }


    /**
    * Process the "Edit a Equipment form"
    * @return Redirect
    */
    public function postEdit() {

        try {
            $Equipment = Equipment::findOrFail(Input::get('id'));
        }
        catch(exception $e) {
            return Redirect::to('/Equipment')->with('flash_message', 'Equipment not found');
        }

        # http://laravel.com/docs/4.2/eloquent#mass-assignment
        $Equipment->fill(Input::all());
        $Equipment->save();

        return Redirect::action('EquipmentController@getIndex')->with('flash_message','Your changes have been saved.');

    }


    /**
    * Process Equipment deletion
    *
    * @return Redirect
    */
    public function postDelete() {

        try {
            $Equipment = Equipment::findOrFail(Input::get('id'));
        }
        catch(exception $e) {
            return Redirect::to('/Equipment/')->with('flash_message', 'Could not delete Equipment - not found.');
        }

        Equipment::destroy(Input::get('id'));

        return Redirect::to('/Equipment/')->with('flash_message', 'Equipment deleted.');

    }


    /**
    * Process a Equipment search
    * Called w/ Ajax
    */
    public function postSearch() {

        if(Request::ajax()) {

            $query  = Input::get('query');

            # We're demoing two possible return formats: JSON or HTML
            $format = Input::get('format');

            # Do the actual query
            $equipments  = Equipment::search($query);

            # If the request is for JSON, just send the Equipments back as JSON
            if($format == 'json') {
                return Response::json($equipments);
            }
            # Otherwise, loop through the results building the HTML View we'll return
            elseif($format == 'html') {

                $results = '';
                foreach($equipments as $equipment) {
                    # Created a "stub" of a view called Equipment_search_result.php; all it is is a stub of code to display a Equipment
                    # For each Equipment, we'll add a new stub to the results
                    $results .= View::make('equipment.equipment_search_result')->with('equipment', $equipment)->render();
                }

                # Return the HTML/View to JavaScript...
                return $results;
            }
        }
    }



}