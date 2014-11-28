<?php

class ProjectorController extends \BaseController {

//-------------------- Display a listing of  resources. ---------//

	public function index()
	{
	   $projectors = projector::all();

	return View::make('/projector/index') ->with('projectors', $projectors);

            ////return 'hello projector';
	}
 //-----------------------------To create a  Resource--------------------------------///
	public function create()
	{

	return View::make('projector.create');
	}


	public function store()
	{
	 // Handle create form submission.
                $projector = new Projector;
                $projector->fill(Input::all());
                $projector->save();

                return Redirect::action('ProjectorController@index')
                ->with('flash_message', 'Your projector has been added.');
	}

//-----------------------------To Show a  Resource--------------------------------///

	public function show (Projector $projector)
	{
	  try {
                       $projector = Projector::findOrFail($id);
                       }
                        catch(Exception $e)
                        {
                        return Redirect::to('/projector.show')->with('flash_message', 'Projector not found');
                         }

                return View::make('/projector.show')
                ->where('tripod', '$tripod');
	}


      //-----------------------------To Edit  a Resource--------------------------------///
	public function edit(Projector $projector)
	{
	return View::make('/projector.edit', compact('projector'));
	}


	public function handleEdit($projector)
	{ // Handle edit form submission.
                    try   {
                            $projector = Projector::findOrFail(Input::get('id'));
                            }
                    catch(Exception $e)
                            {
                     return Redirect::to('/projector.edit')->with('flash_message', 'Projector not found');
                            }

                    $projector->name        = Input::get('name');
                    $projector->save();

                return Redirect::action('ProjectorController@index');
	   }
 //-----------------------------To ddestroy a  Resource--------------------------------///

	public function delete(Projector $projector)
	{
	 // Show delete confirmation page.
             return View::make('projector.delete', compact('projector'));
	}


	public function handleDelete( )
            {       // Handle the delete confirmation.

                try {
                            $projector = Projector::findOrFail($id);
                    }
                    catch(Exception $e) {

                    return Redirect::to('/projector.index')->with('flash_message', 'Projector not found');
                        }

                $projector::handleDelete($id);


                return Redirect::action('ProjectorController@index')
                ->with('flash_message', 'Your projector has been removed from the datasabe');
             }
}