<?php

session_start();
require 'db.php';
require 'productController.php';

    // NEW PRODUCT //
if($_GET['action'] == 'create') {

    $create = new userController($pdo);
    $create->create();
}

    // DELETE PRODUCT //
if($_GET['action'] == 'delete') {

    $Serial_No = $_GET['Customer_ID'];

    $delete  = new userController($pdo);
    $delete->delete($_GET['Customer_ID']);
}

    //  SAVE PRODUCT EDIT //
if($_GET['action'] == 'save'){

    $save = new userController($pdo);
    $save->save($_POST['Customer_ID'], $_POST);
}

header('location: customer-list.php');