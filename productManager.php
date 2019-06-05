<?php

session_start();
require 'db.php';
require 'productController.php';



        // NEW PRODUCT //
if($_GET['action'] == 'create') {

    $create = new productController($pdo);
    $create->create();
}

    // DELETE PRODUCT //
if($_GET['action'] == 'delete') {

    $Serial_No = $_GET['Serial_No'];

    $delete = new productController($pdo);
    $delete->delete($_GET['Serial_No']);
}

    //  SAVE PRODUCT EDIT //
if($_GET['action'] == 'save'){

    $save = new productController($pdo);
    $save->save($_POST['Serial_No'], $_POST);
}

header('location: product-list.php');