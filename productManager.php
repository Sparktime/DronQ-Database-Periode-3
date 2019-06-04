<?php
//


session_start();
require 'db.php';
require 'productController.php';

if($_GET['action'] == 'save'){

    $save = new productController($pdo);
    $save->save($_POST['Serial_No'], $_POST);
}

if($_GET['action'] == 'create') {


    // NEW PRODUCT //

    $create = new productController($pdo);
    $create->create();



}

switch($_GET['action']{

case = save {

}
    // NEW PRODUCT //

    $create = new productController($pdo);
    $create->create();



})
//
//    // DELETE FUNCTIE //
//
//    $Serial_No = $_GET['Serial_No'];
//
//    $delete = new productController($pdo);
//    $delete->delete($_GET['Serial_No']);
//
//
//
header('location: product-list.php');
