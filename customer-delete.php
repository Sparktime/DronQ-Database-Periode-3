<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get url parameter
$Customer_ID = $_GET['Customer_ID'];

// delete record
$sql = 'DELETE FROM `CUSTOMER` WHERE Customer_ID = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$Customer_ID]);
checkSQL($stmt);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
