<?php

class TripodController extends \BaseController {

	////////////--------- Display a listing of the resource. ---------///

	       /*** GET /tripods**/

	public function index()
	{	//return 'all Tripods'//
    		$tripods = tripod::all();
		return View::make('/tripod.index')
                        ->with(array(
                             'tripods'=>$tripods,
                            ));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /tripods/create
	 * * @return Response
	 */

	public function create()
	{
                //$tripods = Tripod::getIdNamePair();

	   return View::make('/tripod.create');

	}


	   public function store() {

                $tripod = new Tripod;
                $tripod ->fill(Input::all());
                $tripod ->save();
                return Redirect::action('TripodController@index')->with('flash_message', 'Your tripod has been added.');
    	}

	/**
	 * Display the specified resource.
	 * GET /tripods/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
                   try {
                          $tripod = Tripod::findOrFail($id);
                         }
                         catch(Exception $e)
                         {
                                return Redirect::to('/tripod.show')->with('flash_message', 'Tripod not found');
                         }

                  return View::make('tripod.show')->first()
                  ->where('tripod', '$tripod');
                    //('id', '\d+');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /tripods/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		 // Show the edit tripod form.
                return View::make('tripod.edit', compact('tripod'));

	}

	/**
	 * Update the specified resource in storage.
	 * PUT /tripods/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		 // Handle edit form submission.

                    try {
                             $tripod = Tripod::findOrFail('id');
                          }
                          catch(Exception $e)
                          {
                                return Redirect::to('/tripod.edit')->with('flash_message', 'Tripod not found');
                          }


                $tripod->name = Input::get('name');

                $tripod->save();

                return Redirect::action('TripodController@index')
                ->with('flash_message', 'Your tripod has been saved');
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /tripods/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */


         public function destroy($id)
            {
                // Handle the delete confirmation.

                    try {
                            $tripods = Tripod::findOrFail($id);
                        }
                        catch(Exception $e) {
                        return Redirect::to('/tripod.index')->with('flash_message', 'Tripod not found');
                        }

                        $tripod::destroy($id);

                    return Redirect::action('TripodController@index')
                    ->with ('flash_message', 'Your tripod has been removed from database');
             }

}