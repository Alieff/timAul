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
<<<<<<< HEAD
  return view('index');
});

Route::get('/contact', function () {
  return view('contact');
});

Route::get('/faq', function () {
  return view('faq');
});

Route::get('blade', function () {
    return view('page',array('name' => 'The Raven'));
});

 Route::get('termofuse', function(){
 	return view('termofuse');
 });
