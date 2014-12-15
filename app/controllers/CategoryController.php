<?php

class CategoryController extends BaseController {

    //public function __construct() {

       # Make sure BaseController construct gets called
       //parent::__construct();

       # Only logged in users are allowed here
        // $this->beforeFilter('auth');

        ///}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
        public function getIndex() {

               $categories = Category::all();

        return View::make('/category.index', compact('categories'))
        ->with('categories', $categories);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
               // return 'Form for to create form';

       return View::make('/category.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
            public function postCreate() {

            $category = new category;
              $category->name = Input::get('name');
             $category->save();

             return Redirect::action('CategoryController@getIndex')
             ->with('flash_message','Your category been added.');
    }



        public function show($id) {


       // return 'show a specific category';
            //   try {
            // $category = Category::findOrFail($id);
            //      }
            //     catch(Exception $e) {
            // return Redirect::to('/category/index')->with('flash_message', 'Category not found');
            //      }

              return View::make('/category/show')->with('category', $category);
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getEdit($id) {

       //return 'form for editing';
         try {
           $category = Category::findOrFail($id);
        }
       catch(Exception $e) {
        return Redirect::to('/category.edit')->with('flash_message', 'Category not found');
         }

        // //Pass with the $Category object so we can do model binding on the form
        return View::make('/category/edit')->with('category', $category);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
        public function postEdit($id) {

        try {
            $category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/category/index')
            ->with('flash_message', 'category not found');
        }

        $category->name = Input::get('name');
        $category->save();

        return Redirect::action('CategoryController@index')
        ->with('flash_message','Your category has been saved.');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */



     public function postDelete()
    {
        // Handle the delete confirmation.
        try {
             $category = Category::findOrFail($id);
        }
               catch(Exception $e) {
                return Redirect::to('/category/index')->with('flash_message', 'Category not found');
       }
         # Note there's a `deleting` Model event which makes sure category_equipment entries are also destroyed
        # See Category.php for more details
        $category->delete($id);

        return Redirect::action('CategoryController@GetIndex')
        ->with('flash_message','Your Category has been deleted.');
    }


    //

    //     # Note there's a `deleting` Model event which makes sure category_equipment entries are also destroyed
    //     # See Category.php for more details
    //     category::delete($id);

    //     return Redirect::action('CategoryController@index')

    // }



}