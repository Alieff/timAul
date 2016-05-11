<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function() {
    // Place all your web routes here...(Cut all `Route` which are define in `Route file`, paste here) 
    Route::get('/', function () {
  		return view('welcome');
	});

	Route::get('contact', 
	  ['as' => 'contact', 'uses' => 'ContactController@create']
	);

	Route::get('/contact', array('as' => 'contact', 'uses' => 'ContactController@create'));

	Route::post('contact', 
	  ['as' => 'contact_store', 'uses' => 'ContactController@store']
	);

	Route::get('faq', function () {
	  return view('faq');
	});


	Route::get('mail', function () {
	  return view('test');
	});

	Route::get('blade', function () {
	    return view('page',array('name' => 'The Raven'));
	});

	Route::get('termofuse', function(){
	 	return view('termofuse');
	});

	Route::get('admin/dashboard', function () {
	 return view('admin.dashboard');
});

});
