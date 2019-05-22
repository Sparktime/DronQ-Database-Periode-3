<?php

header('Content-Type: application/json');

$mailadress = $_POST["email"];
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "dronq@thuis.io";
$to = $mailadress;
$subject = "DronQ Pre-Order";
$message = "Thank you for your Pre-Order";
$headers = "From: $from";

//echo "The email message was sent to $mailadress.";

if(mail($to,$subject,$message, $headers))
{
    echo '{"message" : "Bericht succesvol verstuurd!"}';
}
else
{
    echo '{"message" : "Bericht NIET verstuurd!"}';
}


?>