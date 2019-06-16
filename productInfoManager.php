<?php


error_reporting(-1);
ini_set('display_errors', 'On');

session_start();
require 'db.php';
require 'productInfoController.php';


// NEW PRODUCT //
if($_GET['action'] == 'create') {

    $create = new productInfoController($pdo);
    $create->create();
}

// DELETE PRODUCT //
if($_GET['action'] == 'delete') {


    $delete = new productInfoController($pdo);
    $delete->delete($_GET['Type']);
}

//  SAVE PRODUCT EDIT //
if($_GET['action'] == 'save'){

    $save = new productInfoController($pdo);
    $save->save($_POST['Type']);
}

if($_GET['action'] == 'imageUpload'){

    $img = new productInfoController($pdo);
    $img->imageUpload();
}

if($_GET['action'] == 'csvUpload'){

    $csv = new productInfoController($pdo);
    $csv->csvUpload();
}



header('location: productInfo-list.php');