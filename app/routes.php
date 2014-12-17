<?php

//app/routes.php

  ///--------------Debug Route(Implicit Routing)---------///

        Route::controller('/debug', 'DebugController');

        ///--------------Route to Home page---------///


                Route::get('/', [
                    'as'    =>  'home',
                    'uses'  =>  'HomeController@home'
                ]);

        ///--------------Route to Home page---------------------------------------------///
                Route::get('/user/{username}', [
                    'as'    =>  'profile-user',
                    'uses'  =>  'ProfileController@user'
                ]);

                Route::group(array('domain' => '{username}.gmail.com'), function()
                {
                ///-------------------Route to Home page------------------------------//
                    Route::get('/user/{username}', [
                            'as'    =>  'profile-user',
                            'uses'  =>  'ProfileController@user'
                    ]);

                });


   ///---------------------------Authenticated group----------------------------------------------//

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


 ///---------------------------Unauthenticated group----------------------------------------------//
                Route::group(['before'=>'guest'], function() {

                /*
                *  CSRF protection group
                */

                    Route::group(['before'=>'csrf'], function() {
                /*
                *  Sign in (Post)
                */
                        Route::post('/account/signin', [
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
                    Route::get('/account/signin', [
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



             //Route::get('/classes', function() {
            // echo Paste\Pre::render(get_declared_classes(),'');
           // });
//--------------------------------equipments route------------------------////
                Route::model('equipment', 'Equipment');
                //route::resource('equipment', 'equipmentController');
                Route::get('/equipment/index',        'EquipmentController@getIndex');
                Route::get('/equipment/create',      'EquipmentController@getCreate');
                Route::get('/equipment/show{id}',   'EquipmentController@getCreate');
                Route::get('/equipment/edit/{id}',      'EquipmentController@getEdit');
                Route::get('/equipment/delete{id}',   'EquipmentController@getDelete');

                Route::post('/equipment/create',   'EquipmentController@postCreate');
                Route::post('/equipment/edit',       'EquipmentController@postEdit');
                Route::post('/equipment/delete',   'EquipmentController@postDelete');
                //Route::get('/equipment/digest', 'EquipmentController@getDigest');
                ## Ajax examples
                Route::get('/equipment/search',    'EquipmentController@getSearch');
                Route::post('/equipment/search',   'EquipmentController@postSearch');


 //-------------------------------- Category route------------------------////
                Route::model('category', 'Category');
                    //Route::resource('category', 'CategoryController');
                Route::get('/category/index',      'CategoryController@getIndex');
                Route::get('/category/create', 'CategoryController@getCreate');
                Route::get('/category/show/{id}', 'CategoryController@show');
                Route::get('/category/edit/{id}', 'CategoryController@getEdit');
                //Route::get('/category/delete/{id}', 'CategoryController@getDelete');

                Route::post('/category/create', 'CategoryController@postCreate');
                Route::put('/category/edit', 'CategoryController@postEdit');
                Route::post('/category/delete{category}', 'CategoryController@postDelete');











