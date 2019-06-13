<?php

session_start();
require 'db.php';
require 'userController.php';

    // NEW USER //
if($_GET['action'] == 'create') {

    $create = new userController($pdo);
    $create->create();


}

    // DELETE USER //
if($_GET['action'] == 'delete') {

    $Serial_No = $_GET['User_ID'];

    $delete  = new userController($pdo);
    $delete->delete($_GET['User_ID']);
}

    //  SAVE USER EDIT //
if($_GET['action'] == 'save') {

    $save = new userController($pdo);
    $save->save($_POST['User_ID'], $_POST);

    if (isset($_SESSION['level'])) {
        header('location: user-list.php');
    } else {
        header('location: .');

    }
}

//header('location: user-list.php');

    // REGISTER NEW USER //

if($_GET['action'] == 'register') {

    $register = new userController($pdo);
    $id = $register->register($_POST['Email'], $_POST['PasswordHash']);


    if(isset($id))
        header('location: user-edit.php?User_ID='.$id);

}

