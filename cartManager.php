<?php

session_start();
require 'db.php';
require 'cartController.php';

    // NEW CART //
if($_GET['action'] == 'create') {

    $create = new cartController($pdo);
    $create->create();
}

    // DELETE CART //
if($_GET['action'] == 'delete') {

    $Serial_No = $_GET['Serial_No'];

    $delete = new cartController($pdo);
    $delete->delete($_GET['Order_ID']);
}

    //  SAVE CART EDIT //
if($_GET['action'] == 'save'){

    $save = new cartController($pdo);
    $save->save($_POST['Order_ID'], $_POST);
}

header('location: order-list.php');