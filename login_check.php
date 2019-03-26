<?php
require 'db.php';
$username = $_POST['username'];
$password = $_POST['password'];
$passwordhash = md5($password . $username);
$sql = "SELECT * FROM `USER` WHERE `Email` = ? AND `PasswordHash` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $passwordhash]);
checkSQL($stmt);
$user = $stmt->fetch(PDO::FETCH_OBJ);
if($user === FALSE) {
    unset($_SESSION['username']);
    header('location: login.php');
} else {
    $_SESSION['username'] = $username;
    header('location: customer-edit.php?_customerID=');
}

   