<?php

class HomeController extends \BaseController {


	public function home() {


	//test to acces users in DB
	//echo $user = User::find(2)->username;
	//echo '<pre>', print_r($user), '</pre>';

	// To check email functionality
	//Mail::send('emails.auth.test', array( 'name' => 'Norcius Noel'), function($message){
		//$message-> to ('mensah33@gmail.com', 'Norcius Noel')-> subject('test email');});

//            [
//                'name'=>'Asif'
//            ],
//            function($message)
//            {
//                $message->to('asif@gdastudio.org', 'Asif Khan')->subject('Test email');
//            }
//        );

		return View::make('home');
	}

}
