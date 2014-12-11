<?php

class TagController extends \BaseController {


    /**
    *
    */
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

        $tags = Tag::all();
        return View::make('/tag.index')->with('tags',$tags);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('/tag.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        $tag = new Tag;
        $tag->name = Input::get('name');
        $tag->save();

        return Redirect::action('TagController@index')->with('flash_message','Your tag been added.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        try {
            $tag = Tag::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/tag')->with('flash_message', 'Tag not found');
        }

        return View::make('/tag.show')->with('tag', $tag);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {

        try {
            $tag = Tag::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/tag')->with('flash_message', 'Tag not found');
        }

        # Pass with the $tag object so we can do model binding on the form
        return View::make('/tag.edit')->with('tag', $tag);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {

        try {
            $tag = Tag::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/tag')->with('flash_message', 'Tag not found');
        }

        $tag->name = Input::get('name');
        $tag->save();

        return Redirect::action('TagController@index')->with('flash_message','Your tag has been saved.');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {

        try {
            $tag = Tag::findOrFail($id);
        }
        catch(Exception $e) {
            return Redirect::to('/tag')->with('flash_message', 'Tag not found');
        }

        # Note there's a `deleting` Model event which makes sure book_tag entries are also destroyed
        # See Tag.php for more details
        Tag::destroy($id);

        return Redirect::action('TagController@index')->with('flash_message','Your tag has been deleted.');

    }


}