// <?php

// //app/routes.php

//   ///--------------Debug Route(Implicit Routing)---------///

//         Route::controller('/debug', 'DebugController');

//         ///--------------Route to Home page---------///


//                 Route::get('/', [
//                     'as'    =>  'home',
//                     'uses'  =>  'HomeController@home'
//                 ]);

//         ///--------------Route to Home page---------------------------------------------///
//                 Route::get('/user/{username}', [
//                     'as'    =>  'profile-user',
//                     'uses'  =>  'ProfileController@user'
//                 ]);

//                 Route::group(array('domain' => '{username}.gmail.com'), function()
//                 {
//                 ///-------------------Route to Home page------------------------------//
//                     Route::get('/user/{username}', [
//                             'as'    =>  'profile-user',
//                             'uses'  =>  'ProfileController@user'
//                     ]);

//                 });


//    ///---------------------------Authenticated group----------------------------------------------//

//                 Route::group(['before'=>'auth'], function() {


//                     /*
//                     *  CSRF protection group
//                     */

//                     Route::group(['before'=>'csrf'], function() {
//                         /*
//                         *  Change Password (POST)
//                         */
//                         Route::post('/account/change-password',[
//                             'as'    => 'account-change-password-post',
//                             'uses'  => 'AccountController@postChangePassword'
//                         ]);

//                     });

//                     /*
//                     *  Change Password (GET)
//                     */
//                     Route::get('/account/change-password',[
//                         'as'    => 'account-change-password',
//                         'uses'  => 'AccountController@getChangePassword'
//                     ]);

//                     /*
//                     *  Sign Out (GET)
//                     */
//                     Route::get('/account/sign-out', [
//                         'as'    => 'account-sign-out',
//                         'uses'  =>  'AccountController@getSignOut'
//                     ]);

//                 });


//  ///---------------------------Unauthenticated group----------------------------------------------//
//                 Route::group(['before'=>'guest'], function() {

//                 /*
//                 *  CSRF protection group
//                 */

//                     Route::group(['before'=>'csrf'], function() {
//                 /*
//                 *  Sign in (Post)
//                 */
//                         Route::post('/account/signin', [
//                             'as'    =>  'account-sign-in-post',
//                             'uses'  =>  'AccountController@postSignIn'
//                         ]);

//                 /*
//                 *  forgot password (POST)
//                 */
//                         Route::post('/account/forgot-password', [
//                             'as'    => 'account-forgot-password-post',
//                             'uses'  => 'AccountController@postForgotPassword'
//                         ]);

//                 /*
//                 *  Create account (POST)
//                 */
//                         Route::post('/account/create', [
//                             'as'    =>  'account-create-post',
//                             'uses'  =>  'AccountController@postCreate'
//                         ]);

//                     });


//                 /*
//                 *  forgot password (GET)
//                 */
//                     Route::get('/account/forgot-password', [
//                         'as'    => 'account-forgot-password',
//                         'uses'  => 'AccountController@getForgotPassword'
//                     ]);

//                 /*
//                 *  recover email route (GET)
//                 */
//                     Route::get('/account/recover/{code}', [
//                        'as'     => 'account-recover',
//                         'uses'  => 'AccountController@getRecover'
//                     ]);

//                 /*
//                 *  Sign in (GET)
//                 */
//                     Route::get('/account/signin', [
//                         'as'    =>  'account-sign-in',
//                         'uses'  =>  'AccountController@getSignIn'
//                     ]);

//                 /*
//                 *  Create account (GET)
//                 */
//                     Route::get('/account/create', [
//                         'as'    =>  'account-create',
//                         'uses'  =>  'AccountController@getCreate'
//                     ]);

//                     Route::get('/account/activate/{code}',[
//                         'as'    =>  'account-activate',
//                         'uses'  =>  'AccountController@getActivate'
//                     ]);
//                 });
                            
                


            
                Route::get('/classes', function() {
                echo Paste\Pre::render(get_declared_classes(),'');
                });


    //--------------------------------equipment route------------------------////

                /**
                * Index
                */
                Route::get('/', 'IndexController@getIndex');
                /**
                * User
                * (Explicit Routing)
                */
                Route::get('/user/signup','UserController@getSignup' );
                Route::get('/user/login', 'UserController@getLogin' );
                Route::post('/user/signup', 'UserController@postSignup' );
                Route::post('/user/login', 'UserController@postLogin' );
                Route::get('/user/logout', 'UserController@getLogout' );



//--------------------------------equipment route------------------------////
                    Route::model('equipment', 'Equipment');
                //route::resource('equipment', 'equipmentController');
                Route::get('/equipment/index',      'EquipmentController@getIndex');
                 Route::get('/equipment/create', 'EquipmentController@getCreate');
                Route::get('/equipment/edit/{id}', 'EquipmentController@getEdit');
               
               
                Route::post('/equipment/create', 'EquipmentController@postCreate');
                Route::post('/equipment/edit', 'EquipmentController@postEdit');
                Route::post('/equipment/delete', 'EquipmentController@postDelete');
                //Route::get('/equipment/digest', 'EquipmentController@getDigest');
                ## Ajax examples
                Route::get('/equipment/search_form', 'EquipmentController@getSearch');
                Route::post('/equipment/search_result', 'EquipmentController@postSearch');


 //-------------------------------- Category route------------------------////
                Route::model('category', 'Category');

                //Route::resource('category', 'CategoryController');
                Route::get('/category/index',      'CategoryController@index');
                Route::get('/category/create', 'CategoryController@create');
                Route::post('/category/create', 'CategoryController@store');
               
                Route::post('/category/show{id}', 'CategoryController@show');
                
                Route::get('/category/edit/{id}', 'CategoryController@Edit'); 
                Route::post('/category/edit', 'CategoryController@update');
                Route::post('/category/destroy', 'CategoryController@destroy');

                            /**(Explicit Routing)**/
    //----------------Route all resource for Audiorecorders----------------//
               Route::model('audiorecorder', 'Audiorecorder');

                // Show pages.
                Route::get('/audiorecorder/index', 'AudiorecorderController@index');
                Route::get('/audiorecorder/create', 'AudiorecorderController@create');
                Route::get('/audiorecorder/show/{id}', 'AudiorecorderController@show');
                Route::get('/audiorecorder/edit/{audiorecorder}', 'AudiorecorderController@edit');
                Route::get('/audiorecorder/delete/{audiorecorder}', 'AudiorecorderController@delete');

                // Handle form submissions.
                Route::post('/audiorecorder/create', 'AudiorecorderController@postCreate');
                Route::post('/audiorecorder/edit', 'AudiorecorderController@handleEdit');
                Route::post('/audiorecorder/delete', 'AudiorecorderController@handleDelete');

    //----------------Route all resource dungles-------------------//
                Route::model('dungle', 'Dungle');

                // Show pages.
                Route::get('/dungle/index', 'DungleController@index');
                Route::get('/dungle/create', 'DungleController@create');
                Route::get('/dungle/show/{id}', 'DungleController@show');
                Route::get('/dungle/edit/{dungle}', 'DungleController@edit');
                Route::get('/dungle/delete/{dungle}', 'DungleController@delete');

                // Handle form submissions.
                Route::post('/dungle/create', 'DungleController@postCreate');
                Route::post('/dungle/edit', 'DungleController@handleEdit');
                Route::post('/dungle/delete', 'DungleController@handleDelete');

 //------------- Route all resources for HDZooms---------------//
                Route::model('videocam', 'Videocam');

                // Show pages.
                Route::get('/videocam/index', 'VideocamController@index');
                Route::get('/videocam/create', 'VideocamController@create');
                Route::get('/videocam/show/{id}', 'VideocamController@show');
                Route::get('/videocam/edit/{videocam}', 'VideocamController@edit');
                Route::get('/videocam/delete/{videocam}', 'VideocamController@delete');

                // Handle form submissions.
                Route::post('/videocam/create', 'VideocamController@postCreate');
                Route::post('/videocam/edit', 'VideocamController@handleEdit');
                Route::post('/videocam/delete', 'VideocamController@handleDelete');


       //------------ Route all resources for MACs--------------//
                Route::model('mac', 'Mac');

                // Show pages.
                Route::get('/mac/index', 'MacController@index');
                Route::get('/mac/create', 'MacController@create');
                 Route::get('/mac/show/{id}', 'MacController@show');
                Route::get('/mac/edit/{mac}', 'MacController@edit');
                Route::get('/mac/delete/{mac}', 'MacController@delete');

                // Handle form submissions.
                Route::post('/mac/create', 'MacController@postCreate');
                Route::post('/mac/edit', 'MacControllerr@handleEdit');
                Route::post('/mac/delete', 'MacController@handleDelete');


    //-----------Route all resource for Microphones----------------//
               Route::model('microphone', 'Microphone');

                // Show pages.
                Route::get('/microphone/index', 'MicrophoneController@index');
                Route::get('/microphone/create', 'MicrophoneController@create');
                 Route::get('/microphone/show/{id}', 'MicrophoneController@show');
                Route::get('/microphone/edit/{microphone}', 'MicrophoneController@edit');
                Route::get('/microphone/delete/{microphone}', 'MicrophoneController@delete');

                // Handle form submissions.
                Route::post('/microphone/create', 'MicrophoneController@postCreate');
                Route::post('/microphone/edit', 'MicrophoneController@handleEdit');
                Route::post('/microphone/delete', 'MicrophoneController@handleDelete');

    //-------------- Route all resource for PCs---------------//
                Route::model('laptop', 'Laptop');

                // Show pages.
                Route::get('/laptop/index', 'LaptopController@index');
                Route::get('/laptop/create', 'LaptopControllerontroller@create');
                Route::get('/laptop/show/{id}', 'LaptopController@show');
                Route::get('/laptop/edit/{laptop}', 'LaptopController@edit');
                Route::get('/laptop/delete/{laptop}', 'LaptopController@delete');

                // Handle form submissions.
                Route::post('/laptop/create', 'LaptopControllerller@postCreate');
                Route::post('/laptop/edit', 'LaptopController@handleEdit');
                Route::post('/laptop/delete', 'LaptopController@handleDelete');


    //-----------Route all resources for Projectors----------------//

                Route::model('projector', 'Projector');

                // Show pages.
                Route::get('/projector/index', 'ProjectorController@index');
                Route::get('/projector/create', 'ProjectorController@create');
                Route::get('/projector/show/{id}', 'ProjectorController@show');
                Route::get('/projector/edit/{projector}', 'ProjectorController@edit');
                Route::get('/projector/delete/{projector}', 'ProjectorController@delete');

                // Handle form submissions.
                Route::post('/projector/create', 'ProjectorController@postCreate');
                Route::post('/projector/edit', 'ProjectorController@handleEdit');
                Route::post('/projector/delete', 'ProjectorController@handleDelete');



    //-----------Route all reources  for Tripod--------------//

                Route::model('tripod', 'Tripod');  //model binding//

                // Show pages.
                Route::get('/tripod/index', 'TripodController@index');
                Route::get('/tripod/create', 'TripodController@create');
                Route::get('/tripod/show/{id}', 'TripodController@show');
                Route::get('/tripod/edit/{tripod}', 'TripodController@edit');
                Route::get('/tripod/delete/{tripod}', 'TripodController@delete');

                // Handle form submissions.
                Route::post('/tripod/create', 'TripodController@postCreate');
                Route::post('/tripod/edit', 'TripodController@handleEdit');
                Route::post('/tripod/delete', 'TripodController@handleDelete');









