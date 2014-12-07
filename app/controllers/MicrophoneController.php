<?php

class MicrophoneController extends \BaseController {
//-------------------- Display a listing of  resources. ---------//

	public function index()
	{   ///return 'all Microphones'--/
		$microphones=microphone::all();
		return View::make('/microphone.index', compact('microphones'));

	}

 //-----------------------------To create a  Resource--------------------------------///


	public function create()
	{
	return View::make('/microphone.create');
	}

	public function postCreate( )
	{ // Handle create form submission.

                $microphone = new Microphone;
                $microphone->fill(Input::all());
                $microphone->save();

             return Redirect::action('MicrophoneController@index')
                ->with('flash_message', 'Your microphone has been added.');
	   }
//-----------------------------To Show a  Resource--------------------------------///

	public function show($id)
	{
	 try {
                $microphone = Microphone::findOrFail($id);
                }
                catch(Exception $e)
                {
                return Redirect::to('/microphone.show')
                ->with('flash_message', 'microphone not found');
                }

                //return var_dump($id) ;
                return View::make('/microphone.show')
                ->with('microphone', $microphone);
	}

//-----------------------------To edit  a specific  resource--------------------------------///

	public function edit(Microphone $microphone)
	{// Show the edit microphone form.
            return View::make('/microphone.edit', compact('microphone'))
                                        ->with('microphone', $microphone);
	}


	public function handleEdit( )
	{    // Handle edit form submission.
                    $microphone = Microphone::findOrFail(Input::get('id'));

                    $microphone->name                   = Input::get('name');
                    $microphone->model                  = Input::get('model');
                    $microphone->path                     = Input::get('path');
                    $microphone->serial_number     = Input::get('serial_number');
                    $microphone->save();

                return Redirect::action('MicrophoneController@index');
	}
//-----------------------------Remove the specified resource from storage.--------------------------------///


	public function delete(Microphone $microphone)
	{
		 // Show delete confirmation page.
            return View::make('/microphone.delete', compact('microphone'));
	}

	public function handleDelete()
            {
                // Handle the delete confirmation.
                $id = Input::get('microphone');
                $microphone = Microphone::findOrFail($id);
                $microphone->delete();

                return Redirect::action('MicrophoneController@index')
                ->with('flash_message', 'Your microphone has been removed from database');;
            }
}