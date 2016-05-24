<?php
use Illuminate\Support\Facades\Input;

//get the first name
$first_name = Input::get('name');
$email = Input::get ('email');
$message = Input::get ('message');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?>

<h1>We been contacted by.... </h1>

<p>
Name: <?php echo ($first_name); ?>
Email address: <?php echo ($email);?>
Message: <?php echo ($message);?>
Date: <?php echo($date_time);?>
User IP address: <?php echo($userIpAddress);?>
</p>
