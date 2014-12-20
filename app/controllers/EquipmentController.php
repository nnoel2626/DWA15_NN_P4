<?php

class EquipmentController extends \BaseController {


    /**
    *
    */
    public function __construct() {

        # Make sure BaseController construct gets called
      parent::__construct();

     $this->beforeFilter('auth', array('except' => ['getIndex']));

    }


    /**
    * Used as an example for something you might want to set up a cron job for
    */
    public function getDigest() {

        $equipment = Equipment::getequipmentAddedInTheLast24Hours();

        $users = User::all();

        $recipients = Equipment::sendDigests($users,$equipment);

        $results = 'equipment digest sent to: '.$recipients;

        Log::info($results);

        return $results;

    }

     
    
    
    /**
    * Process the searchform
    * @return View
    */
    public function getSearch() {

        return View::make('/equipment/search');

    }

    public function queryRelationsipsCategories() {
        

        # Get the first equipment as an example
        $equipment = equipment::orderBy('name')->first();
        # Get the categories from this equipment using the "categories" dynamic property
        # "categories" corresponds to the the relationship method defined in the equipment model
        $categories = $equipment->categories;
        # Print results
        echo "The categories for <strong>".$equipment->brand."</strong> are: <br>";
        foreach($categories as $category) {
        echo $category->name."<br>";
            }
    }
     /**
     * Display a listing of all the AV equipment available in the inventory.
     *
     * @return Response
     */
    public function getIndex() {

        # Format and Query are passed as Query Strings
        $format = Input::get('format', 'html');

        $query  = Input::get('query');

        $equipment = Equipment::search($query);

        # Decide on output method...
        # Default - HTML
        if($format == 'html') {
            return View::make('/equipment/index')
                ->with('equipment', $equipment)
                ->with('query', $query);
        }
        # JSON
        elseif($format == 'json') {
            return Response::json($equipment);
        }
        # PDF (Coming soon)
        elseif($format == 'pdf') {
            return "This is the pdf (Coming soon).";
        }


    }


    // /**
    // * Show the "Add a Equipment form"
    // * @return View
    // */
    public function getCreate() {
         //return'form to create equipment';
        $categories = Category::getIdNamePair();

        return View::make('/equipment.create');
        //->with('categories',$categories);

    }

    /**
    * Process the "Add a Equipment form"
    * @return Redirect
    */
    public function postCreate() {

        # Instantiate the Equipment model
        $equipment = new Equipment();

        $equipment->fill(Input::except('categories'));
        # Magic: Eloquent
        $equipment->save();

            foreach(Input::get('categories') as $category) {
                # This enters a new row in the category_equipment table
            $equipment->categories()->save(Category::find($category));
        
       }

        return Redirect::action('EquipmentController@getIndex')
        ->with('flash_message','Your Equipment has been added.');

    }


    /**
    * Show the "Edit a Equipment form"
    * @return View
    */
    public function getEdit($id) {
         //return'form to edit equipment';
        try {
          $equipment = Equipment::findOrFail($id);
           $category = Category::getIdNamePair();
        }
        catch(exception $e) {
            return Redirect::to('/equipment/index')
            ->with('flash_message', 'Equipment not found');
        }

        return View::make('/equipment/edit')
            ->with('equipment', $equipment)
            ->with('category', $category);

    }


    /**
    * Process the "Edit a Equipment form"
    * @return Redirect
    */
    public function postEdit() {

        try {
            $equipment = Equipment::with('categories')
            ->findOrFail(Input::get('id'));
        }
        catch(exception $e) {
            return Redirect::to('/equipment/index')
            ->with('flash_message', 'equipment not found');
        }

        # http://laravel.com/docs/4.2/eloquent#mass-assignment
        $equipment->fill(Input::except('categories'));
        $equipment->save();

            # Update tags associated with this book
            if(!isset($_POST['categories'])) $_POST['categories'] = array();
            $equipment->updateCategories($_POST['categories']);

        return Redirect::action('EquipmentController@getIndex')
        ->with('flash_message','Your changes have been saved.');

    }

    /**
    * Process Equipment deletion
    *
    * @return Redirect
    */
    public function postDelete() {

        try {
            $equipment = Equipment::findOrFail(Input::get('id'));
        }
        catch(exception $e) {
            return Redirect::to('/equipment/index')
            ->with('flash_message', 'Could not delete Equipment - not found.');
        }

        Equipment::destroy(Input::get('id'));

        return Redirect::to('/equipment/index')
        ->with('flash_message', 'Equipment deleted.');

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
            $equipment  = Equipment::search($query);

            # If the request is for JSON, just send the equipment back as JSON
            if($format == 'json') {
                return Response::json($equipment);
            }
            # Otherwise, loop through the results building the HTML View we'll return
            elseif($format == 'html') {

                $results = '';
                foreach($equipment as $equipment) {
                    # Created a "stub" of a view called Equipment_search_result.php; all it is is a stub of code to display a Equipment
                    # For each Equipment, we'll add a new stub to the results
                    $results .= View::make('/equipment/search_result')
                    ->with('equipment', $equipment)->render();
                }

                # Return the HTML/View to JavaScript...
                return $results;
                    }
                }    
            }
        }
