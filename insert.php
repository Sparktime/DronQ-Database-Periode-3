<?php

header('Content-Type: application/json');

// Get values from form
$name = $_POST['name'];
$phone = $_POST['mobile'];
$mailaddress = $_POST['email'];
$title = $_POST['subject'];
$text = $_POST['message'];

// send values to admin and user
$to = $mailaddress.";wbplaats@avans.nl";
$subject = "Question of DronQ visitor";
$message = "\r\n Name: " . $name .
$message = "\r\n Phone number: " . $phone .
$message = "\r\n Email: " . $mailaddress .
$message = "\r\n Subject: " . $title .
$message = "\r\n Message: " . $text;

//  from address in mail
$from = "DronQ@thuis.io";
$headers = "From:" . $from;


?>