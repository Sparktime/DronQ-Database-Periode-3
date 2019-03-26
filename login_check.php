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
    $_SESSION['email'] = $email;
    header('location: customer-edit.php?_customerID=');
}

   