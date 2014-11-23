<?php

class MacController extends \BaseController {
	/**
	 * Display a listing of the resource.
	 * GET /macs
	 *
	 * @return Response
	 */
		public function index()
	{	//return 'all Macs'-----//
		$macs = Mac::all();
		return View::make('/mac.index', compact('macs'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /macs/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('mac.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /macs
	 *
	 * @return Response
	 */
	public function store()
	{
	 // Handle create form submission.
            $mac = new Mac;
            $mac->name       	= Input::get('name');
            $mac->model    		= Input::get('model');
            $mac->path    		= Input::get('path');
            $mac->serial_number  = Input::get('serial_number');
            $mac->save();
            return Redirect::action('MacController@index');
	}

	/**
	 * Display the specified resource.
	 * GET /macs/{id}
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
	 * GET /macs/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	 // Show the edit MAC form.
        return View::make('mac.edit', compact('mac'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /macs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{ // Handle edit form submission.
        $mac = Mac::findOrFail(Input::get('id'));
        $mac->name        = Input::get('name');
        $mac->model     = Input::get('model');
        $mac->path     = Input::get('path');
        $mac->serial_number  = Input::get('serial_number');
        $mac->save();

        return Redirect::action('MacController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /macs/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Show delete confirmation page.
        return View::make('mac.delete', compact('mac'));
	}

	  public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('mac');
        $mac = Mac::findOrFail($id);
        $mac->delete();

        return Redirect::action('MacController@index');
    }
}