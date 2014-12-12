<?php

class CategoryController extends BaseController {

    public function __construct() {

        # Make sure BaseController construct gets called
        parent::__construct();

        # Only logged in users are allowed here
        $this->beforeFilter('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $Categorys = Category::all();
        return View::make('/category.index')->with('Categorys',$Categorys);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('/category.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $Category = new Category;
        $Category->name = Input::get('name');
        $Category->save();

        return Redirect::action('CategoryController@index')->with('flash_message','Your Category been added.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        try {
            $Category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/Category')->with('flash_message', 'Category not found');
        }

        return View::make('/Category.show')->with('Category', $Category);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {

        try {
            $Category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/Category')->with('flash_message', 'Category not found');
        }

        # Pass with the $Category object so we can do model binding on the form
        return View::make('/Category.edit')->with('Category', $Category);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {

        try {
            $Category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/Category')->with('flash_message', 'Category not found');
        }

        $Category->name = Input::get('name');
        $Category->save();

        return Redirect::action('CategoryController@index')->with('flash_message','Your Category has been saved.');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {

        try {
            $Category = Category::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/Category')->with('flash_message', 'Category not found');
        }

        # Note there's a `deleting` Model event which makes sure book_Category entries are also destroyed
        # See Category.php for more details
        Category::destroy($id);

        return Redirect::action('CategoryController@index')->with('flash_message','Your Category has been deleted.');

    }


}