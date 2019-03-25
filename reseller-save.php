<?php
// UTF-8 NΟ BOM
session_start();
require 'db.php';

// get post parameter
$Reseller_ID = $_POST['Reseller_ID'];
$Company_Name = $_POST['Company_Name'];
$Address = $_POST['Address'];
$ZipCode = $_POST['ZipCode'];
$City = $_POST['City'];
$Country = $_POST['Country'];
$Email = $_POST['Email'];
$Telephone = $_POST['Telephone'];
$Contact_Person = $_POST['Contact_Person'];


// update record
$sql = "UPDATE `RESELLER` SET Company_Name = ?, Address = ?, ZipCode = ?, City = ?, Country = ?, Email = ?, Telephone = ?, Contact_Person = ? WHERE Reseller_ID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Company_Name, $Address, $ZipCode, $City, $Country, $Email, $Telephone, $Contact_Person, $Reseller_ID]);
checkSQL($stmt);


// return to list
if(isset($_SESSION['list'])) {
    header('location: ' . $_SESSION['list']);   
} else {
    header('location: .');
}
