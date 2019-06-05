<?php
// UTF-8 NΟ BOM 
session_start();
$_SESSION['list'] = 'customer-list.php';

include 'db.php';
require 'userController.php';

$list = new userController($pdo);
$rs = $list-> getAll();

// get result set
//$sql = "SELECT * FROM `CUSTOMER` ORDER BY `Customer_ID` DESC";
//$rs = $pdo->query($sql, PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html lang="nl">

    <head>
        <title>List</title>
        <?php require 'head.php'; ?>
    </head>

    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <?php require 'menu.inc.php'; ?>
        </nav>
        
<div class="col-xl-12 mx-auto container-fluid">
        <h1>Customers</h1>
        <a href = "userManager.php?action=create" title="add a record" class="btn btn-success navbar-btn">New Customer</a>
    
        <!-- show result set -->
        <table class="table">
            <tr>
                <th>Edit</th>
                <th>Customer ID</th>
                <th>Surname</th>
                <th>Firstname </th>
                <th>Address</th>
                <th>ZipCode</th>
                <th>City</th>
                <th>Country</th>
                <th>E-mail</th>
                <th>Telephone</th>
                <th>Date of Birth</th>
                <th>Registration Date</th>
                <th>Delete</th>
            </tr>
            
            <!-- PHP Database -->
            <?php while ($row = $rs->fetch()) { ?>
            <tr>
                <td><a title="edit" href="customer-edit.php?Customer_ID=<?= $row->Customer_ID ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><?= $row->Customer_ID ?></td>
                <td><?= $row->Customer_Surname ?></td>
                <td><?= $row->Customer_Firstname ?></td>
                <td><?= $row->Address ?></td>
                <td><?= $row->ZipCode ?></td>
                <td><?= $row->City ?></td>
                <td><?= $row->Country ?></td>
                <td><?= $row->Email ?></td>
                <td><?= $row->Telephone ?></td>
                <td><?= $row->Day_Of_Birth ?></td>
                <td><?= $row->RegistrationDate ?></td>
                <td><a title="delete" href="userManager.php?action=delete&Customer_ID=<?= $row->Customer_ID ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
    </body>

</html>

