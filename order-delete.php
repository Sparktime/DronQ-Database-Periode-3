<?php

// UTF-8 NΟ BOM

session_start();
require 'db.php';
require 'cartController.php';

// get url parameter
$Order_ID = $_GET['Order_ID'];

//// delete record
//$sql = 'DELETE FROM `ORDER` WHERE Order_ID = ?';
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$Order_ID]);
//checkSQL($stmt);

$delete = new userController($pdo);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
