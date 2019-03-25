<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// insert record
$sql = "INSERT INTO `RESELLER` (Company_Name, Address, ZipCode, City, Country, Email, Telephone, Contact_Person) VALUES('','','','','','','','')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

header('location: reseller-list.php');
