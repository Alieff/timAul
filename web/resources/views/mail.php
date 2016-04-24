<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];  
  $formcontent="From: $name \n Message: $message";
  $recipient = "pflarasati@gmail.com";
  $subject = "Contact Form";
  $mailheader = "From: $email \r\n";
  echo $name;
  echo $email;
  echo $message;
  mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
  echo "Thank You!";
?>
