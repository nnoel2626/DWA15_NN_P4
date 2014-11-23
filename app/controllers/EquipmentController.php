<?php

class EquipmentController extends \BaseController {

	/**
	 * Display a listing of the equipment available.
	 *
	 * @return Response
	 */
	public function index()
	{	// Show a listing of Equipment.
        		$equipment = Equipment::all();
        		return View::make('/equipments.index', compact('equipments'));
	}
	/**
	 *Show the form for creating a new resource.
	 */
	public function create()
	{	// Show the Add equipment input form.

        		return View::make('/equipments.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @return Response
	 */
	public function handleCreate()
	{	 // Handle create form submission.
       	 	$equipments = new equipments;
       		$equipments->name        	= Input::get('name');
        		$equipments->tag    		= Input::get('tag');
        		$equipments->dayly_price    	 = Input::has('');
        		$equipments->save();

        		return Redirect::action('EquipmentController@index');
	}

		/**
		 * Display the specified equipment.
		 *
		 * @param  int  $id
		 * @return Response
		 */
	public function show($id)
	{
			//
	}


	/**
	* Show the form for editing the specified equipment.
		 *
		 * @param  int  $id
		 * @return Response
		 */
	public function edit($id)
	{
			 // Show the edit equipment form.
	return View::make('edit', compact('equipment'));

	}
		/**
		 * Update the specified equipment reccord in storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function handleEdit()
		{   // Handle edit form submission.
	        $equipment = Equipment::findOrFail(Input::get('id'));
	        $equipment->title        = Input::get('title');
	        $equipment->publisher    = Input::get('publisher');
	       	$equipment->complete     = Input::has('complete');
	        $equipment->save();

	        return Redirect::action('EquipmentController@index');
		}




		/**
		 * Remove the specified equipment from storage.
		 *
		 * @param  int  $id
		 * @return Response
		 */
		public function delete(Equipment $equipment)
		{
			// Show delete confirmation page.
	        return View::make('delete', compact('equipment'));
		}

		 public function handleDelete()
	    {
	        // Handle the delete confirmation.
	        $id = Input::get('equipment');
	        $equipments = Equipment::findOrFail($id);
	        $equipments->delete();

	        return Redirect::action('EquipmentController@index');
	    }
	}






