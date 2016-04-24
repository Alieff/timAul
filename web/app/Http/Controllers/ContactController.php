<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller {

  //Server Contact view:: we will create view in next step
  public function getContact(){
    return View('contact');
  }

  //Contact Form
  public function getContactUsForm(){

      //Get all the data and store it inside Store Variable
      $data = $request->all();;

      //Validation rules
      $rules = array (
        'name' => 'required|alpha',
        'email' => 'required|email',
        'message' => 'required|min:25'
      );

      //Validate data
      $validator  = Validator::make ($data, $rules);

      //If everything is correct than run passes.
      if ($validator -> passes()){

          //Send email using Laravel send function
          Mail::send('emails.hello', $data, function($message) use ($data)
          {
              //email 'From' field: Get users email add and name
              $message->from($data['email'] , $data['name']);
              //email 'To' field: cahnge this to emails that you want to be notified.
              $message->to('putfi9l@gmail.com', 'Puti')->subject('Contact Request');

          });
          return View('contact');
      }else{
         //return contact form with errors
        return Redirect::to('/contact')->withErrors($validator);
      }
   }
}
?>
