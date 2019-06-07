<?php

session_start();
require 'db.php';
require 'userController.php';

    // NEW CUSTOMER //
if($_GET['action'] == 'create') {

    $create = new userController($pdo);
    $create->create();
}

    // DELETE CUSTOMER //
if($_GET['action'] == 'delete') {

    $Serial_No = $_GET['Customer_ID'];

    $delete  = new userController($pdo);
    $delete->delete($_GET['Customer_ID']);
}

    //  SAVE CUSTOMER EDIT //
if($_GET['action'] == 'save'){

    $save = new userController($pdo);
    $save->save($_POST['Customer_ID'], $_POST);
}
header('location: customer-list.php');

    // REGISTER NEW CUSTOMER //

if($_GET['action'] == 'register') {

    $register = new userController($pdo);
    $id = $register->register($_POST['Email'], $_POST['PasswordHash']);


    if(isset($id))
        header('location: customer-edit.php?Customer_ID='.$id);

}

