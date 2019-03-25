<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get url parameter
$Reseller_ID = $_GET['Reseller_ID'];

// delete record
$sql = 'DELETE FROM `RESELLER` WHERE Reseller_ID = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$Reseller_ID]);
checkSQL($stmt);

// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
