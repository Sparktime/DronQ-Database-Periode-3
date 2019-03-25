<?php
// UTF-8 NΟ BOM 
session_start();
$_SESSION['list'] = 'order-list.php';

include 'db.php';

// get result set
$sql = "SELECT * FROM `ORDER` ORDER BY `Order_ID` DESC";
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
            <a href = "order-new.php" title="add a record" class="btn btn-success navbar-btn">New Order</a>
        </nav>
        
<div class="col-xl-12 mx-auto">
        <h1>O</h1>
        <h1>Orders</h1>
        <!-- show result set -->
        <table class="table">
            <tr>
                <th>Edit</th>
                <th>Order ID</th>
                <th>Price</th>
                <th>Order Date</th>
                <th>Shipping Date</th>
                <th>OrderStatus</th>
                <th>Employee</th>
                <th>Serial_No</th>
                <th>Reseller_ID</th>
                <th>Customer_ID</th>
                <th>Delete</th>
            </tr>
            
            <!-- PHP Database -->
            <?php while ($row = $rs->fetch()) { ?>
            <tr>
                <td><a title="edit" href="order-edit.php?Order_ID=<?= $row->Order_ID ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><?= $row->Order_ID ?></td>
                <td><?= $row->Price ?></td>
                <td><?= $row->OrderDate ?></td>
                <td><?= $row->ShippingDate ?></td>
                <td><?= $row->OrderStatus ?></td>
                <td><?= $row->Employee ?></td>
                <td><?= $row->Serial_No ?></td>
                <td><?= $row->Reseller_ID ?></td>
                <td><?= $row->Customer_ID ?></td>
                <td><a title="delete" href="order-delete.php?Order_ID=<?= $row->Order_ID ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
    </body>

</html>

