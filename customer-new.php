<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// insert record
$sql = "INSERT INTO `CUSTOMER` (Customer_Surname, Customer_Firstname, Address, ZipCode, Country, Email, Telephone, Day_Of_Birth, RegistrationDate) VALUES('','','','','','','','',CURDATE())";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

header('location: customer-list.php');
