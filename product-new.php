<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';
require 'productController.php';

// insert record
//$sql = "INSERT INTO `PRODUCT` (Type, Manufacturing_Date) VALUES('',CURDATE())";
//$stmt = $pdo->prepare($sql);
//$stmt->execute();
//checkSQL($stmt);

$create = new productController($pdo);
$create->create();

header('location: product-list.php');
