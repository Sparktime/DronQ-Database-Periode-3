<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];
$passwordhash = md5($password . $email);
// insert record
$sql = "INSERT INTO `USER` (Email, PasswordHash) VALUES(?,?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email, $passwordhash]);
checkSQL($stmt);

header('location: login.php');

