<?php
//get the first name
$first_name = Input::get('first_name');
$last_name = Input::get ('last_name');
$phone_number = Input::get('phone_number');
$email = Input::get ('email');
$subject = Input::get ('subject');
$message = Input::get ('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?>

<h1>We been contacted by.... </h1>

<p>
First name: <?php echo ($first_name); ?> <br>
Last name: <?php echo($last_name);?> <br>
Phone number: <?php echo($phone_number);?><br>
Email address: <?php echo ($email);?> <br>
Subject: <?php echo ($subject); ?><br>
Message: <?php echo ($message);?><br>
Date: <?php echo($date_time);?><br>
User IP address: <?php echo($userIpAddress);?><br>

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Hello extends Controller
{
	public function index()
	{
	    return 'hello world from controller : )';
	}

	public function show($name)
	{
		// die($name);
	    // return view('hello',array('name' => $name));
	    return View::make('hello');
	}


    //
}
