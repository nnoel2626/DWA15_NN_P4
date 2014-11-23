<?php

class LaptopController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	//return 'all PCs'-----//
	$laptops = laptop::all();
	return View::make('/laptop.index', compact('laptops'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('laptop.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			// Handle create form submission.
	        $laptop = new Laptop;
	        $laptop->name       		= Input::get('name');
	        $laptop->model    		= Input::get('model');
	        $laptop->path    			= Input::get('path');
	        $laptop->serial_number 	 	= Input::get('serial_number');
	        $laptop->save();
	        return Redirect::action('LaptopController@index');
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 // Show the edit PC form.
        	return View::make('laptop.edit', compact('laptop'));
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
	        $laptop = Laptop::findOrFail(Input::get('id'));
	        $laptop->name       	 = Input::get('name');
	        $laptop->model    	 = Input::get('model');
	        $laptop->path     		 = Input::get('path');
	        $laptop->serial_number    = Input::get('serial_number');
	        $laptop->save();

	        return Redirect::action('LaptopController@index');
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
        		return View::make('laptop.destroy', compact('laptop'));
	}

	 public function handleDelete()
	    {
	        // Handle the delete confirmation.
	        $id = Input::get('pc');
	        $laptop = Laptop::findOrFail($id);
	        $laptop->delete();

	        return Redirect::action('LaptopController@index');
	    }
}
