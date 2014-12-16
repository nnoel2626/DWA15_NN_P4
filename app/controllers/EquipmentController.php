<?php

class EquipmentController extends BaseController {

            //public function __construct() {
                # Make sure BaseController construct gets called
                //parent::__construct();

              // $this->beforeFilter('auth', array('except' => ['getIndex',]));
           // }


            public function getIndex()
            {  //return'list od equipments';
                     $equipments = Equipment::all();
                     //var_dump( $equipments );
                    return View::make('/equipment.getIndex', compact('equipments'))
                    ->with('equipments', $equipments)
                     ->with('categories', $categories);
            }
 //-----------------------------To create a  Resource--------------------------------///
                    public function getCreate()
                    {   //return 'Show the Add equipment input form';
                        $categories = Category::getIdNamePair();
                        return View::make('/equipment.create')
                        ->with('categories', $categories);
                    }

                    public function postCreate()
                     {
                         // validation rules
                        $rules = array(
                        'brand'       => 'required',
                         'model'      => 'required',
                         'serial_number' => 'required|numeric'
                         );

                        $validator = Validator::make(Input::all(), $rules);
                         if ($validator->fails()) {
                        return Redirect::to('/equipment/create')
                                ->withErrors($validator);
                      } else {
                        //store//
                        $equipment = new equipment();
                       $equipment  ->brand                   =input::get('brand');
                        $equipment  ->model                   =input::get('model');
                        $equipment  ->serial_number       =input::get('serial_number');
                        $equipment  ->image_path       =input::get('image_path');
                        $equipment  ->save();


                            //var_dump ($equipments);
                        foreach( Input::get('categories') as $category) {
                              # This enters a new row in the category_equipment table
                         $equipments->categories()->save(Category::find($category));

                        return Redirect::action('EquipmentController@getIndex')
                     ->with('flash_message','Your equipment has been added.');
                        }
                     }
          }                  //$equipment->fill(Input::except('categories'));
                            //$equipment->save();


//-----------------------------To Show a  Resource--------------------------------///



                public function show($id)
                {

                try {
                $equipment  = Tripod::findOrFail($id);
                    }
                catch(Exception $e)
                    {
                return Redirect::to('/equipment.show')
                ->with('flash_message', 'equipment  not found');
                    }

                //return var_dump($id) ;
                return View::make('/equipment .show')
                        ->with('equipment ', $equipment );
              }

//-----------------------------To Edit a  Resource--------------------------------///

             public function getEdit($id)
            {// Show the edit equipment form.
                try {
                $equipment  = Equipment::with('categories')->findOrFail($id);
                 $categories    = Category::getIdNamePair();
                 }

                 catch(exception $e) {

                    return Redirect::to('/equipment/index')->with('flash_message', 'Equipment not found');
                }
                    return View::make('/equipment.edit')
                    ->with('equipment', $equipment )
                     ->with('categories', $categories);


                        //return 'a specific requipment to edit';
                 }

        /**
         * Update the specified equipment reccord in storage.
         *
         * @param  int  $id
         * @return Response
         */
            public function postEdit()
            {   // Handle edit form submission.
                try {
                $equipment = Equipment::with('categoies')->findOrFail(Input::get('id'));
                     }
                catch(exception $e) {
                return Redirect::to('/equipment/index')->with('flash_message', 'Equipment not found');
                }
                     try {
                        $equipment->fill(Input::except('categoies'));
                             $equipment->save();

                // $equipment->name                    = Input::get('name');
                // $equipment->brand                    = Input::get('publisher');
                // $equipment->model                   = Input::has('complete');
                //  $equipment->serial_number     = Input::has('serial_number');
                //  $equipment->image_path         = Input::has('image_path');


                     # Update tags associated with this book
                    if(!isset($_POST['categoies'])) $_POST['categoies'] = array();
                    $equipment->updateCategoies($_POST['categoies']);

            return Redirect::action('EquipmentController@index')
            ->with('flash_message','Your changes have been saved.');

                }
             catch(exception $e) {
            return Redirect::to('/equipment/index')->with('flash_message', 'Error saving changes.');
                 }

        }

//-----------------------------To Delete a  Resource--------------------------------///


        /**
         * Remove the specified equipment from storage.
         *
         * @param  int  $id
         * @return Response
         */
        public function getDelete($id)
        {
            // Show delete confirmation page.
            //return View::make('delete', compact('equipment'));
            return 'delete form to confirm';
        }


         public function postDelete()
        {
            try {
            $equipment = Equipment::findOrFail(Input::get('id'));
        }
        catch(exception $e) {
            return Redirect::to('/equipment/index')->with('flash_message', 'Could not delete Equipment - not found.');
        }
                 Equipment::destroy(Input::get('id'));

            // // Handle the delete confirmation.
            // $id = Input::get('equipment');
            // $equipments = Equipment::findOrFail($id);
            // $equipments->delete();

            return Redirect::to('/equipment/index')->with('flash_message', 'Equipment deleted.');
        }
   }



//   //var_dump( $equipment );
//                     //echo $collection;
//                     //echo Pre::render($collection);


