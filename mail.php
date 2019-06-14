<?php

header('Content-Type: application/json');

// send values to admin and user
$mailadress = $_POST["email"];
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

// from address in mail
$from = "dronq@thuis.io";
$to = $mailadress;

// message content send out to the user
$subject = "DronQ Pre-Order";
$message = "Thank you for your Pre-Order";
$headers = "From: $from";





?>