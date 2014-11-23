<?php

//app/routes.php

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

/**
* Debug
* (Implicit Routing)
*/
        Route::controller('/debug', 'DebugController');



        ///--------------Route to Home page---------///


                Route::get('/', [
                    'as'    =>  'home',
                    'uses'  =>  'HomeController@home'
                ]);

        ///--------------Route to Home page---------///
                Route::get('/user/{username}', [
                    'as'    =>  'profile-user',
                    'uses'  =>  'ProfileController@user'
                ]);

                Route::group(array('domain' => '{username}.gmail.com'), function()
                {
                ///--------------Route to Home page---------///
                    Route::get('/user/{username}', [
                            'as'    =>  'profile-user',
                            'uses'  =>  'ProfileController@user'
                    ]);

                });

                /*
                *  Authenticated group
                */
                Route::group(['before'=>'auth'], function() {


                    /*
                    *  CSRF protection group
                    */

                    Route::group(['before'=>'csrf'], function() {
                        /*
                        *  Change Password (POST)
                        */
                        Route::post('/account/change-password',[
                            'as'    => 'account-change-password-post',
                            'uses'  => 'AccountController@postChangePassword'
                        ]);

                    });

                    /*
                    *  Change Password (GET)
                    */
                    Route::get('/account/change-password',[
                        'as'    => 'account-change-password',
                        'uses'  => 'AccountController@getChangePassword'
                    ]);

                    /*
                    *  Sign Out (GET)
                    */
                    Route::get('/account/sign-out', [
                        'as'    => 'account-sign-out',
                        'uses'  =>  'AccountController@getSignOut'
                    ]);

                });

                /*
                *  Unauthenticated group
                */

                Route::group(['before'=>'guest'], function() {

                /*
                *  CSRF protection group
                */

                    Route::group(['before'=>'csrf'], function() {
                /*
                *  Sign in (Post)
                */
                        Route::post('/account/sign-in', [
                            'as'    =>  'account-sign-in-post',
                            'uses'  =>  'AccountController@postSignIn'
                        ]);

                /*
                *  forgot password (POST)
                */
                        Route::post('/account/forgot-password', [
                            'as'    => 'account-forgot-password-post',
                            'uses'  => 'AccountController@postForgotPassword'
                        ]);

                /*
                *  Create account (POST)
                */
                        Route::post('/account/create', [
                            'as'    =>  'account-create-post',
                            'uses'  =>  'AccountController@postCreate'
                        ]);

                    });


                /*
                *  forgot password (GET)
                */
                    Route::get('/account/forgot-password', [
                        'as'    => 'account-forgot-password',
                        'uses'  => 'AccountController@getForgotPassword'
                    ]);

                /*
                *  recover email route (GET)
                */
                    Route::get('/account/recover/{code}', [
                       'as'     => 'account-recover',
                        'uses'  => 'AccountController@getRecover'
                    ]);

                /*
                *  Sign in (GET)
                */
                    Route::get('/account/sign-in', [
                        'as'    =>  'account-sign-in',
                        'uses'  =>  'AccountController@getSignIn'
                    ]);

                /*
                *  Create account (GET)
                */
                    Route::get('/account/create', [
                        'as'    =>  'account-create',
                        'uses'  =>  'AccountController@getCreate'
                    ]);

                    Route::get('/account/activate/{code}',[
                        'as'    =>  'account-activate',
                        'uses'  =>  'AccountController@getActivate'
                    ]);

                });

////--------------------------------equipment routes------------------------////


    //----------------Route all resource for Audiorecorders----------------//
              // Route::model('audiorecorder', 'Audiorecorder');

                // Show pages.
                Route::get('/audiorecorder/index', 'AudiorecorderController@index');
                Route::get('/audiorecorder/create', 'AudiorecorderController@create');
                Route::get('/audiorecorder/edit/{$id}', 'AudiorecorderController@edit');
                Route::get('/audiorecorder/delete/{$id}', 'AudiorecorderController@destroy');

                // Handle form submissions.
                Route::post('/audiorecorder/create', 'AudiorecorderController@store');
                Route::post('/audiorecorder/edit', 'AudiorecorderController@edit');
                Route::post('/audiorecorder/delete', 'AudiorecorderController@destroy');

    //----------------Route all resource dungles-------------------//
               // Route::model('dungle', 'Dungle');

                // Show pages.
                Route::get('/dungle/index', 'DungleController@index');
                Route::get('/dungle/create', 'DungleController@create');
                Route::get('/dungle/edit/{$id}', 'DungleController@edit');
                Route::get('/dungle/delete/{$id}', 'DungleController@destroy');

                // Handle form submissions.
                Route::post('/dungle/create', 'DungleController@store');
                Route::post('/dungle/edit', 'DungleController@edit');
                Route::post('/dungle/delete', 'DungleController@destroy');

 //------------- Route all resources for HDZooms---------------//
                //Route::model('videocam', 'Videocam');

                // Show pages.
                Route::get('/videocam/index', 'VideocamController@index');
                Route::get('/videocam/create', 'VideocamController@create');
                Route::get('/videocam/edit/{$id}', 'VideocamController@edit');
                Route::get('/videocam/delete/{$id}', 'VideocamController@destroy');

                // Handle form submissions.
                Route::post('/videocam/create', 'VideocamController@store');
                Route::post('/videocam/edit', 'VideocamController@edit');
                Route::post('/videocam/delete', 'VideocamController@destroy');


       //------------ Route all resources for MACs--------------//
                //Route::model('mac', 'Mac');

                // Show pages.
                Route::get('/mac/index', 'MacController@index');
                Route::get('/mac/create', 'MacController@create');
                Route::get('/mac/edit/{$id}', 'MacController@edit');
                Route::get('/mac/delete/{$id}', 'MacController@destroy');

                // Handle form submissions.
                Route::post('/mac/create', 'MacController@store');
                Route::post('/mac/edit', 'MacControllerr@edit');
                Route::post('/mac/delete', 'MacController@destroy');


    //-----------Route all resource for Microphones----------------//
              ///  Route::model('microphone', 'Microphone');

                // Show pages.
                Route::get('/microphone/index', 'MicrophoneController@index');
                Route::get('/microphone/create', 'MicrophoneController@create');
                Route::get('/microphone/edit/{$id}', 'MicrophoneController@edit');
                Route::get('/microphone/delete/{$id}', 'MicrophoneControllerr@destroy');

                // Handle form submissions.
                Route::post('/microphone/create', 'MicrophoneController@store');
                Route::post('/microphone/edit', 'MicrophoneController@edit');
                Route::post('/microphone/delete', 'MicrophoneController@destroy');

    //-------------- Route all resource for PCs---------------//
                //Route::model('laptop', 'Laptop');

                // Show pages.
                Route::get('/laptop/index', 'LaptopController@index');
                Route::get('/laptop/create', 'LaptopControllerontroller@create');
                Route::get('/laptop/edit/{$id}', 'LaptopController@edit');
                Route::get('/laptop/delete/{$id}', 'LaptopController@destroy');

                // Handle form submissions.
                Route::post('/laptop/create', 'LaptopControllerller@store');
                Route::post('/laptop/edit', 'LaptopController@edit');
                Route::post('/laptop/delete', 'LaptopController@destroy');


    //-----------Route all resources for Projectors----------------//

              //Route::model('projector', 'Projector');

                // Show pages.
                Route::get('/projector/index', 'ProjectorController@index');
                Route::get('/projector/create', 'ProjectorController@create');
                Route::get('/projector/edit/{$id}', 'ProjectorController@edit');
                Route::get('/projector/delete/{$id}', 'ProjectorController@destroy');

                // Handle form submissions.
                Route::post('/projector/create', 'ProjectorController@store');
                Route::post('/projector/edit', 'ProjectorController@edit');
                Route::post('/projector/delete', 'ProjectorController@destroy');



    //-----------Route all reources  for Tripod--------------//

               // Route::model('tripod', 'Tripod');
                // Show pages.
                Route::get('/tripod/index', 'TripodController@index');

                Route::get('/tripod/create', 'TripodController@create');

                Route::get('/tripod/show{$id}', 'TripodController@show');

                Route::get('/tripod/edit/{$id}', 'TripodController@edit');

                // Handle form submissions.
                Route::post('/tripod/create', 'TripodController@create');

                Route::post('/tripod/edit', 'TripodController@edit');

                Route::post('/tripod/delete', 'TripodController@destroy');









                //Route::get('/tripods/delete/{$id}', 'TripodController@destroy');
