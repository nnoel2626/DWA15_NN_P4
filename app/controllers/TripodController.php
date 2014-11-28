<?php

class TripodController extends \BaseController {


	////////////--------- Display a listing of  resources. ---------///
	public function index()
	{	//return 'all Tripods';
    		$tripods = Tripod::all();
		return View::make('/tripod.index')->with( 'tripods', $tripods);
	}

 //-----------------------------To create a  Resource--------------------------------///
	public function create( )
	{
            ///$tripods = Tripod::getIdNamePair();
	return View::make('/tripod.create');

              // return ' display form to create tripods';

       }

            public function strore () {

                $tripod = new Tripod;
                $tripod ->fill(Input::all());
                $tripod ->save();

                return Redirect::action('TripodController@index')
                ->with('flash_message', 'Your tripod has been added.');
    	}

     //-----------------------------To Show a  Resource--------------------------------///


	public function show(Tripod $tripod)
	{
           // return ' tripod with iD';
                try {
                       $tripod = Tripod::findOrFail($id);
                       }
                        catch(Exception $e)
                        {
                        return Redirect::to('/tripod.show')->with('flash_message', 'Tripod not found');
                         }

          return View::make('/tripod.show')
                ->where('tripod', '$tripod');
            }


  //-----------------------------To Edit  Resources--------------------------------///

	public function edit(Tripod $tripod)
	{

               return View::make('/tripod.edit', compact('tripod'));

	}


	public function handleEdit($id)
	{// Handle edit form submission.

                  try {
                           $tripod = Tripod::findOrFail( '$id');
                       }
                          catch(Exception $e)
                        {
                            return Redirect::to('/tripod.edit')->with('flash_message', 'Tripod not found');
                         }


                $tripod->name = Input::get('name');

               $tripod->save();

               return Redirect::action('TripodController@index')
                ->with('flash_message', 'Your tripod has been saved');
	}


 //-----------------------------To ddestroy  Resources--------------------------------///

            public function delete(Tripod $tripod)
                {
                // Show edit form for submission.
                  return View::make('/tripod.delete', compact('tripod'));
                  // return ' Tripod to delete';
                }

                public function handleDelete ( )
                 {  // Handle the delete confirmation.

                    try {
                            $tripods = Tripod::findOrFail($id);
                        }
                        catch(Exception $e) {

                                 return Redirect::to('/tripod.index')->with('flash_message', 'Tripod not found');
                        }

                        $tripod::handleDelete($id);

                    return Redirect::action('TripodController@index')
                    ->with ('flash_message', 'Your tripod has been removed from database');
             }

}