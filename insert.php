<?php

header('Content-Type: application/json');

// Get values from form
$name = $_POST['name'];
$phone = $_POST['mobile'];
$mailaddress = $_POST['email'];
$title = $_POST['subject'];
$text = $_POST['message'];

$to = $mailaddress.";wbplaats@avans.nl";
$subject = "Question of DronQ visitor";
$message = "\r\n Name: " . $name .
$message = "\r\n Phone number: " . $phone .
$message = "\r\n Email: " . $mailaddress .
$message = "\r\n Subject: " . $title .
$message = "\r\n Message: " . $text;


$from = "DronQ@thuis.io";
$headers = "From:" . $from;


if(mail($to,$subject,$message, $headers))
{
    echo '{"message" : "Bericht succesvol verstuurd!"}';
}
else {
    echo '{"message" : "Bericht NIET verstuurd!"}';
}

?>