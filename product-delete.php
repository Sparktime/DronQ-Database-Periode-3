<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get url parameter
$Serial_No = $_GET['Serial_No'];

// delete record
$sql = 'DELETE FROM `PRODUCT` WHERE Serial_No = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$Serial_No]);
checkSQL($stmt);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
