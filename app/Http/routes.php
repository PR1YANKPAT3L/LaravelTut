<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

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
    Route::get('/login', ['as' => 'login', function () {
        if(Auth::user())
            return redirect()->route('dashboard');
        else
    	   return view('login');
    }]);

    Route::get('/register', function () {
    	return view('register');
    });

    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    });

    Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    	Route::get('/', ['as' => 'dashboard', function () {
	    	return view('dashboard');
	    }]);

	    Route::get('/new/blog', function() {
	    	return view('blog.new');
	    });
    });

    Route::group(['prefix' => 'api'], function () {
    	Route::post('/validate/login', ['uses' => 'LoginController@validateLogin']);
    	Route::post('/validate/register', ['uses' => 'LoginController@validateRegistration']);
    	Route::post('/validate/blog', ['uses' => 'BlogController@validateNewBlog']);
    });
});
