<?php

class AudiorecorderController extends \BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	  public function index()
	{
            	   $audiorecorders = audiorecorder::all();

            	   return View::make('/audiorecorder.index')
                ->with('audiorecorders', $audiorecorders);
	}

	public function create()
	{
                return View::make('/audiorecorder.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Handle create form submission.
                $audiorecorder = new Audiorecorder;
                $audiorecorder->name       	= Input::get('name');
                $audiorecorder->model    		= Input::get('model');
                $audiorecorder->path    		= Input::get('path');
                $audiorecorder->serial_number  = Input::get('serial_number');
                $audiorecorder->save();
                return Redirect::action('AudiorecorderController@index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		 try {
                $audiorecorder = Audiorecorder::findOrFail($id);
                    }
                catch(Exception $e)
                    {
                return Redirect::to('/audiorecorder.show')
                ->with('flash_message', 'Audiorecorder not found');
                    }

                //return var_dump($id) ;
                return View::make('/audiorecorder.show')
                ->with('audiorecorder', $audiorecorder);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	 // Show the edit audiorecorder form.
                return View::make('/audiorecorder.edit', compact('audiorecorders'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		 // Handle edit form submission.
        $audiorecorder = Audiorecorder::findOrFail(Input::get('id'));
        $audiorecorder->name        = Input::get('name');
        $audiorecorder->model     = Input::get('model');
        $audiorecorder->path     = Input::get('path');
        $audiorecorder->serial_number  = Input::get('serial_number');
        $audiorecorder->save();

        return Redirect::action('AudiorecorderController@index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Show delete confirmation page.
        return View::make('audiorecorder.destroy', compact('audiorecorder'));
	}

	public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('audiorecorder');
        $audiorecorder = Audiorecorder::findOrFail($id);
        $audiorecorder->delete();

        return Redirect::action('AudiorecordersController@index');
    }
}
