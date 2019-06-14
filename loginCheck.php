<?php

require 'db.php';
require 'userController.php';

$login = new userController($pdo);
$id = $login->login($_POST['Email'], $_POST['PasswordHash']); //Check email/password with user in DB
if(isset($id))
    header('location: user-edit.php?User_ID='.$id); //redirect to edit with user ID
else { echo 'Invalid login credentials'; }



?>
