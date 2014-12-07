<?php

class TripodController extends BaseController {

        # Make sure BaseController construct gets called
        //parent::__construct();
        # Only logged in users should have access to this controller
        //$this->beforeFilter('auth');
      // }
        //public function missingMethod($parameters = array()) {
       // return 'Method "'.$parameters[0].'" not found';
        //}


//------------------- Display a listing of  resources. ---------------------///

	public function index()
	{	//return 'all Tripods';
    		$tripods = Tripod::all();
		return View::make('/tripod.index')->with('tripods', $tripods);
	}

 //-----------------------------To create a  Resource--------------------------------///
	public function create()
	{
	 return View::make('/tripod.create');
       }

      public function postCreate () {
        // validation rules
              $rules = array(
               'brand'       => 'required',
               'model'      => 'required',
               'serial_number' => 'required|numeric'
               );

          $validator = Validator::make(Input::all(), $rules);
               if ($validator->fails()) {
            return Redirect::to('/tripod.create')

             ->withErrors($validator);
              } else {
                //store//
                $tripod = new Tripod;
                $tripod ->caption                   =input::get('caption');
                $tripod ->path                   =input::get('path');
                $tripod ->brand                   =input::get('brand');
                $tripod ->model                   =input::get('model');
                $tripod ->serial_number       =input::get('serial_number');

                $tripod ->save();

                return Redirect::action('TripodController@index')
                ->with('flash_message', 'Your tripod has been added.');
              }
    	}

     //-----------------------------To Show a  Resource--------------------------------///
	     Public function show($id)
	       {        //return ' tripod with iD';

                try {
                $tripod = Tripod::findOrFail($id);
                    }
                catch(Exception $e)
                    {
                return Redirect::to('/tripod.show')
                ->with('flash_message', 'Tripod not found');
                    }

                //return var_dump($id) ;
                return View::make('/tripod.show')
                        ->with('tripod', $tripod);
                }
  //-----------------------------To Edit  Resources--------------------------------///

	public function edit (Tripod $tripod)
	{        //return 'formview';

      return View::make('/tripod.edit', compact('tripod'))
                  ->with('tripod', $tripod);
	}

	Public function handleEdit()
	{// Handle edit form submission.

                 $tripod = Tripod::findOrFail(Input::get('id'));
                 $tripod->fill(Input::all());
                 $tripod->save();

          return Redirect::action('TripodController@index')
             ->with('message', 'Tripod has been updated');

          }

 //-----------------------------To Delete a  Resource--------------------------------///

                public function delete(Tripod $tripod)
                {

                return View::make('/tripod.delete', compact('tripod'));
                }

                public function handleDelete ()
                 {  // Handle the delete confirmation.

                    $id = Input::get('tripod');
                    $tripod = Tripod::findOrFail($id);
                    $tripod->delete();

                  return Redirect::action('TripodController@index')
                  ->with('flash_message', 'Your tripod has been removed from database');
                  }
}