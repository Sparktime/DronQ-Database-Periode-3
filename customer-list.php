<?php
// UTF-8 NΟ BOM 
session_start();
$_SESSION['list'] = 'customer-list.php';

include 'db.php';

// get result set
$sql = "SELECT * FROM `CUSTOMER` ORDER BY `Customer_ID` DESC";
$rs = $pdo->query($sql, PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <title>List</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
        
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    </head>

    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <?php require 'menu.inc.php'; ?>
            <a href = "customer-new.php" title="add a record" class="btn btn-success navbar-btn">New Customer</a>
        </nav>
        
<div class="col-xl-12 mx-auto">
        <h1>C</h1>
        <h1>Customers</h1>
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
                <td><a title="delete" href="customer-delete.php?Customer_ID=<?= $row->Customer_ID ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
    </body>

</html>

