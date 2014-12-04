<?php

class TripodController extends BaseController {

        # Make sure BaseController construct gets called
        //parent::__construct();
        # Only logged in users should have access to this controller
        //$this->beforeFilter('auth');
    //}
        public function missingMethod($parameters = array()) {
        return 'Method "'.$parameters[0].'" not found';
        }
	////////////--------- Display a listing of  resources. ---------///
	public function index()
	{	//return 'all Tripods';
    		$tripods = Tripod::all();
		return View::make('/tripod.index')->with('tripods', $tripods);
	}

 //-----------------------------To create a  Resource--------------------------------///
	public function create( )
	{
            ///$tripods = Tripod::getIdNamePair();
	return View::make('/tripod.create');

              // return ' display form to create tripods';
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
                $tripod ->brand                   =input::get('brand');
                $tripod ->model                   =input::get('model');
                $tripod ->serial_number       =input::get('serial_number');

                $tripod ->save();

                return Redirect::action('TripodController@index')
                ->with('flash_message', 'Your tripod has been added.');
              }
    	}

     //-----------------------------To Show a  Resource--------------------------------///


	           public function show($id)
	           {        //return ' tripod with iD';

                try {
                $tripod = Tripod::findOrFail($id);
                }
                catch(Exception $e) {
                return Redirect::to('/tripod.show')->with('flash_message', 'Tripod not found');
                }

                //return var_dump($id) ;
                return View::make('/tripod.show')->with('tripod', $tripod);

               //->with('tripod', Tripod::find($id));
                }


  //-----------------------------To Edit  Resources--------------------------------///

	public function edit (Tripod $tripod)
	{        //return 'formview';

      return View::make('/tripod.edit', compact('tripod'));
	}


	 public function handleEdit()
	 {// Handle edit form submission.

          $tripod = Tripod::findOrFail(Input::get('id'));

          //$validation = Tripod::validate(Input::get('id'));
          if ($validation ->fails()){
            return redirect::to_route('/tripod.edit',$id)
          ->with_errors($validation);
           }else{


              $tripod->brand               = Input::get('brand');
              $tripod->model              = Input::get('model');
              $tripod->serial_number = Input::get('serial_number');
              $tripod->save();


              return Redirect::action('TripodController@index')
               ->with ('message', 'Tripod has been updated');

          }

 //-----------------------------To ddestroy  Resources--------------------------------///

                public function delete(Tripod $tripod)
                {
                // try {
                // $tripod = Tripod::findOrFail($id);
                //    }
                // catch(Exception $e) {
                // return Redirect::to('/tripod.delete')->with('flash_message', 'Tripod not found');
                // }

                return View::make('/tripod.delete', compact('tripod'));
                }



                public function handleDelete ( )
                 {  // Handle the delete confirmation.


                    $id = Input::get('tripod');
                    $tripod = Tripod::findOrFail($id);
                    $tripod->delete();

                    return Redirect::action('TripodController@index')
                    ->with ('flash_message', 'Your tripod has been removed from database');
             }

}