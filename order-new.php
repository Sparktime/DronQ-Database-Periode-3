<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// insert record
$sql = "INSERT INTO `ORDER` (Price, OrderDate, ShippingDate, OrderStatus, Employee) VALUES('',CURDATE(),'','','')";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

$sql = "INSERT INTO `PRODUCT` (Type, Manufacturing_Date) VALUES('',CURDATE())";
$stmt = $pdo->prepare($sql);
$stmt->execute();
checkSQL($stmt);

header('location: order-list.php');
