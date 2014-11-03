<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/trigger-error',function() {

//     # Class Foobar should not exist, so this should create an error
//     $foo = new Foobar;

// });

// Route::get('/get-environment',function() {

//     echo "Environment: ".App::environment();

// });
//

// include Pre lib


Route::get('/', function()
{
	return View::make('hello');
});


Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';


    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});



# Returns and object of books
// $books = DB::table('books')->get();

// foreach ($books as $book) {
//     echo $book->title;
// }



// $books = DB::table('books')->where('author', 'LIKE', '%Scott%')->get();

// foreach($books as $book) {
//     echo $book->title;
// }