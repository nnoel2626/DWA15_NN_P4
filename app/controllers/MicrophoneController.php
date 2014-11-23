<?php

class MicrophoneController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 * GET /microphones
	 *
	 * @return Response
	 */
	public function index()
	{   ///return 'all Microphones'--/
		$microphones=microphone::all();
		return View::make('/microphone.index', compact('microphones'));

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /microphones/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('microphone.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /microphones
	 *
	 * @return Response
	 */
	public function store()
	{
		 // Handle create form submission.
        $microphone = new Microphone;
        $microphone->name       	= Input::get('name');
        $microphone->model    		= Input::get('model');
        $microphone->path    		= Input::get('path');
        $microphone->serial_number  = Input::get('serial_number');
        $microphone->save();
        return Redirect::action('MicrophoneController@index');
	}

	/**
	 * Display the specified resource.
	 * GET /microphones/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	return "showing with id of $id";
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /microphones/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 // Show the edit microphone form.
        return View::make('microphone.edit', compact('microphone'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /microphones/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		 // Handle edit form submission.
        $microphone = Tripod::findOrFail(Input::get('id'));
        $microphone->name        = Input::get('name');
        $microphone->model     = Input::get('model');
        $microphone->path     = Input::get('path');
        $microphone->serial_number  = Input::get('serial_number');
        $microphone->save();
        return Redirect::action('MicrophoneController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /microphones/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 // Show delete confirmation page.
        return View::make('microphone.delete', compact('microphone'));
	}

	public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('microphone');
        $microphone = Microphone::findOrFail($id);
        $microphone->delete();

        return Redirect::action('MicrophoneController@index');
    }
}