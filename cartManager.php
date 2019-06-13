<?php

session_start();
require 'db.php';
require 'cartController.php';

    // NEW CART //
if($_GET['action'] == 'create') {

    $id = $_SESSION['userid'];
    $create = new cartController($pdo);

    $create->create($id,$_GET['Type']);
}

    // DELETE CART //
if($_GET['action'] == 'delete') {

    $id = $_SESSION['userid'];
    $delete = new cartController($pdo);
    $delete->delete($id,$_GET['Type']);
}

    //  SAVE CART EDIT //
if($_GET['action'] == 'save'){

    $save = new cartController($pdo);
    $save->save($_POST['Order_ID'], $_POST);
}

header('location: cartGUI.php');