

<?php
class CategoryController extends \BaseController {
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
		public function getIndex() {
		$categories = Category::all();
		return View::make('/category/index')
		->with('categories',$categories);
		}
		/**
		* Show the form for creating a new resource.
		*
		* @return Response
		*/
		public function getCreate() {
		return View::make('/category/create');
		}
		/**
		* Store a newly created resource in storage.
		*
		* @return Response
		*/
		public function postCreate() {
		$category = new Category;
		$category->name = Input::get('name');
		$category->save();
		return Redirect::action('CategoryController@getIndex')
		->with('flash_message','Your category been added.');
		}
		/**
		* Display the specified resource.
		*
		* @param int $id
		* @return Response
		*/
		public function show($id){
		
		// {
		// try {
		// $category = Category::findOrFail($id);
		// }
		// catch(Exception $e) {
		// return Redirect::to('/category/')
		// ->with('flash_message', 'Category not found');
		// }
		// return View::make('/category/show')->with('category', $category);
		}

		public function getEdit($id) {
			//return'form to edit equipment';
			try {
		$category = Category::findOrFail($id);
		}
		catch(Exception $e) {
		return Redirect::to('/category/index')
		->with('flash_message', 'Category not found');
		}
		# Pass with the $Category object so we can do model binding on the form
		return View::make('/category/edit', compact('category'));
		//->with('category', $category);
		}
		/**
		* Update the specified resource in storage.
		*
		* @param int $id
		* @return Response
		*/
		public function postEdit($id) {
		try {
		$category = Category::findOrFail(Input::get('id'));
		}
		catch(Exception $e) {
		return Redirect::to('/category/')
		->with('flash_message', 'category not found');
		}
		
		$category->name = Input::get('name');
		$category->save();

		return Redirect::action('CategoryController@getIndex')
		->with('flash_message','Your Category has been saved.');
		}
		/**
		* Remove the specified resource from storage.
		*
		* @param int $id
		* @return Response
		*/

		public function getDelete($id) {
		try {
		$category = Category::findOrFail($id);
		}
		catch(Exception $e) {
		return Redirect::to('/category/')
		->with('flash_message', 'Category not found');
		}
		return View::make('/category/delete', compact('category'));
            //->with('category', $category);
        }



		public function postDelete() {
		try {
		$category = Category::findOrFail(Input::get('id'));
		}
		catch(Exception $e) {
		return Redirect::to('/category/')
		->with('flash_message', 'Category not found');
		}
		# Note there's a `deleting` Model event which makes sure 
		//category_equipmemt entries are also destroyed
		# See Category.php for more details
		Category::destroy(Input::get('id'));

		return Redirect::action('CategoryController@getIndex')
		->with('flash_message','Your Category has been deleted.');
		}	
}
		
