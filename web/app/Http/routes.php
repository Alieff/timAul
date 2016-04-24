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

Route::get('/', function () {
  return view('welcome');
});

Route::get('contact', 'ContactController@getContact');

Route::post('contact_request','ContactController@getContactUsForm');

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
