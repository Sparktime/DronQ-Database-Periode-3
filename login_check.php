<?php
require 'db.php';
$email = $_POST['email'];
$password = $_POST['password'];
$passwordhash = md5($password . $email);
$sql = "SELECT * FROM `USER` WHERE `Email` = ? AND `PasswordHash` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $passwordhash]);
checkSQL($stmt);
$user = $stmt->fetch(PDO::FETCH_OBJ);
if($user === FALSE) {
    unset($_SESSION['email']);
    header('location: login.php');
} else {

    
$sql = "SELECT `Customer_ID` FROM `CUSTOMER` INNER JOIN `USER` ON `USER`.`Email` = `CUSTOMER`.`Email` WHERE `USER`.`Email` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
checkSQL($stmt);
$customerid = $stmt->fetch()[0];
   $_SESSION['email'] = $email;
    header('location: customer-edit.php?Customer_ID='.$customerid);
}
