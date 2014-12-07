<?php

class ProjectorController extends BaseController {

//-------------------- Display a listing of  resources. ---------//

	public function index()
	{
	   $projectors = projector::all();

	return View::make('/projector/index') ->with('projectors', $projectors);
	}
 //-----------------------------To create a  Resource--------------------------------///

	public function create()
	{
	return View::make('/projector.create');
	}


	public function postCreate()
	{
                        // validation rules
                        $rules = array(
                        'brand'       => 'required',
                         'model'      => 'required',
                         'serial_number' => 'required|numeric'
                         );

                      $validator = Validator::make(Input::all(), $rules);

                       //return var_dump($id);

                       if ($validator->fails()) {
                      return Redirect::to('/projector.create')
                                ->withErrors($validator);
                      } else {
                        //store//
                        $projector = new Projector;
                        $projector ->brand                   =input::get('brand');
                        $projector ->model                   =input::get('model');
                        $projector ->serial_number       =input::get('serial_number');

                        $projector ->save();

                        return Redirect::action('ProjectorController@index')
                        ->with('flash_message', 'Your projector has been added.');
                        }
             }
//-----------------------------To Show a  Resource--------------------------------///

	 Public function show ($id)
	{
	        try {
                      $projector = Projector::findOrFail($id);
                  }
              catch(Exception $e)
                  {
                return Redirect::to('/projector.show')
                ->with('flash_message', 'Projector not found');
                  }

                return View::make('/projector.show')
                            ->with('projector', $projector);
	}
      //-----------------------------To Edit  a Resource--------------------------------///
	public function edit(Projector $projector)
	{
	return View::make('/projector.edit', compact('projector'))
             ->with('projector', $projector);
	}


	public function handleEdit()
	{ // Handle edit form submission.

                    $projector = Projector::findOrFail(Input::get('id'));
                    $projector->name        = Input::get('name');
                    $projector->save();

                return Redirect::action('ProjectorController@index')
                 ->with('message', 'Projector has been updated');
	   }
 //-----------------------------To ddestroy a  Resource--------------------------------///

	public function delete(Projector $projector)
	{    // Show delete confirmation page.
        return View::make('projector.delete', compact('projector'));
	}


	public function handleDelete( )
            {       // Handle the delete confirmation.

                    $id = Input::get('projector');
                    $projector = Projector::findOrFail($id);
                    $projector->delete();


                return Redirect::action('ProjectorController@index')
                ->with('flash_message', 'Your projector has been removed from the datasabe');
             }
}