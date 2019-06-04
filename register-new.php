<?php
//// UTF-8 NΟ BOM
//session_start();
//$_SESSION['list'] = 'database.php';
require 'db.php';
require 'userController.php';


//$email = $_POST['email'];
//$password = $_POST['password'];
//$passwordhash = md5($password . $email);
//
//
//// insert record
//$sql = "INSERT INTO `USER` (Email, PasswordHash) VALUES(?,?)";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$email, $passwordhash]);
//checkSQL($stmt);
//
//$sql = "INSERT INTO `CUSTOMER` (Email) VALUES(?)";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$email]);
//checkSQL($stmt);

//$sql = "SELECT `Customer_ID` FROM `CUSTOMER` INNER JOIN `USER` ON `USER`.`Email` = `CUSTOMER`.`Email` WHERE `USER`.`Email` = ?";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$email]);
//checkSQL($stmt);
//$customerid = $stmt->fetch()[0];
//$_SESSION['email'] = $email;


$register = new userController($pdo);
$register->register($_POST);
$getid = $register->get($_GET['Customer_ID']);

header('location: customer-edit.php?Customer_ID='.$getid->Customer_ID);



