<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(ContactFormRequest $request)
    {

    	\Mail::send('test',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
		    {
		        $message->from('contact@owlteam.com');
		        $message->to('putif9l@gmail.com', 'Admin')->subject('Question on InspireCrawler');
		    });
    	return \Redirect::route('contact')
      ->with('message', 'Thanks for contacting us!');
    }
}
