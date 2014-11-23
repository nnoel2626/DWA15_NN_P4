<?php

class DungleController extends \BaseController {

    /**
     * Display a listing of the resource.
     * GET /dungles
     *
     * @return Response
     */
    public function index()
    {   //return all Dungles//
        $dungles=dungle::all();
        return View::make('/dungle.index', compact('dungle'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /dungles/create
     *
     * @return Response
     */
    public function create()
    {
        return View::make('dungle.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /dungles
     *
     * @return Response
     */
    public function store()
    {
    // Handle create form submission.
        $dungle = new Dungle;
        $dungle->name           = Input::get('name');
        $dungle->model          = Input::get('model');
        $dungle->path           = Input::get('path');
        $dungle->serial_number  = Input::get('serial_number');
        $dungle->save();
        return Redirect::action('DungleController@index');
    }

    /**
     * Display the specified resource.
     * GET /dungles/{id}
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
     * GET /dungles/{id}/edit
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         // Show the edit Dungle form.
        return View::make('dungle.edit', compact('dungle'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /dungles/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
         // Handle edit form submission.
        $dungle = Dungle::findOrFail(Input::get('id'));
        $dungle->name        = Input::get('name');
        $dungle->model     = Input::get('model');
        $dungle->path     = Input::get('path');
        $dungle->serial_number  = Input::get('serial_number');
        $dungle->save();

        return Redirect::action('DungleController@index');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /dungles/{id}
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
         // Show delete confirmation page.
        return View::make('dungle.delete', compact('dungle'));
    }

     public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('dungle');
        $dungle = Dungle::findOrFail($id);
        $dungle->delete();

        return Redirect::action('DungleController@index');
    }
}