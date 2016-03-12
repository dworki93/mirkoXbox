<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => 'auth'], function () {

        Route::get('/profile/edit', 'UserController@edit');

        Route::post('/profile/edit/age', 'UserController@editAge');

        Route::post('/platform/add', 'PlatformController@add');

        Route::post('/platform/edit', 'PlatformController@edit');
    });

    Route::get('platform/{name}', 'PlatformController@index');

    Route::get('', 'PlatformController@index');



    Route::get('/login', 'LoginController@login');

    Route::get('/logout', 'LoginController@logout');

    Route::get('/loginLink', 'LoginController@getLoginLink');

    Route::any('{all}', function()
    {
        return redirect()->action('PlatformController@index');
    });

});
