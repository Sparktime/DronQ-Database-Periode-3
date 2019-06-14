<?php

session_start();
$_SESSION['list'] = 'user-list.php';

include 'db.php';
require 'userController.php';

$list = new userController($pdo);
$rs = $list-> getAll();

?>


<!DOCTYPE html>
<html lang="nl">
<!-- header off each page based off head.php   -->
    <head>
        <title>List</title>
        <?php require 'head.php'; ?>
    </head>

    <body>
    <!-- menu off each page based off menu.php   -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <?php require 'menu.php'; ?>
        </nav>
        
<div class="col-xl-12 mx-auto container-fluid">
        <h1>User</h1>
        <a href = "userManager.php?action=create" title="add a record" class="btn btn-success navbar-btn">New user</a>
    
        <!-- show result set -->
        <table class="table">
            <tr>
                <th>Edit</th>
                <th>User ID</th>
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
                <th>Admin Level</th>
                <th>Delete</th>
            </tr>
            
            <!-- PHP Database -->
            <?php while ($row = $rs->fetch()) { ?>
            <tr>
                <td><a title="edit" href="user-edit.php?User_ID=<?= $row->User_ID ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><?= $row->User_ID ?></td>
                <td><?= $row->User_Surname ?></td>
                <td><?= $row->User_Firstname ?></td>
                <td><?= $row->Address ?></td>
                <td><?= $row->ZipCode ?></td>
                <td><?= $row->City ?></td>
                <td><?= $row->Country ?></td>
                <td><?= $row->Email ?></td>
                <td><?= $row->Telephone ?></td>
                <td><?= $row->Day_Of_Birth ?></td>
                <td><?= $row->RegistrationDate ?></td>
                <td><?= $row->AdminLevel ?></td>
                <td><a title="delete" href="userManager.php?action=delete&User_ID=<?= $row->User_ID ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
    </body>

</html>

