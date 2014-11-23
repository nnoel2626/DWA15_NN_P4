<?php

class ProjectorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /projectors
	 *
	 * @return Response
	 */
	public function index()
	{
		$projectors = projector::all();

		//return 'all projector';
	return View::make('/projector.index', compact('projectors'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /projectors/create
	 *
	 * @return Response
	 */
	public function create()
	{
	return View::make('projector.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /projectors
	 *
	 * @return Response
	 */
	public function store()
	{
		 // Handle create form submission.
        $projector = new Projector;
        $projector->name       	= Input::get('name');
        $projector->model    		= Input::get('model');
        $projectorod->path    		= Input::get('path');
        $projector->serial_number  = Input::get('serial_number');
        $projector->save();
        return Redirect::action('ProjectorController@index');
	}

	/**
	 * Display the specified resource.
	 * GET /projectors/{id}
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
	 * GET /projectors/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 return View::make('projector.edit', compact('projector'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /projectors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	 // Handle edit form submission.
        $projector = Projector::findOrFail(Input::get('id'));
        $projector->name        = Input::get('name');
        $projector->model     = Input::get('model');
        $projector->path     = Input::get('path');
        $projector->serial_number  = Input::get('serial_number');
        $projector->save();

        return Redirect::action('ProjectorController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /projectors/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		 // Show delete confirmation page.
        return View::make('projector.delete', compact('projector'));
	}
	public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('projector');
        $projector = Projector::findOrFail($id);
        $projector->delete();

        return Redirect::action('ProjectorController@index');
    }
}