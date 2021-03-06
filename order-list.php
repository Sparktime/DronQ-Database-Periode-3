<?php
// UTF-8 NΟ BOM
session_start();
$_SESSION['list'] = 'order-list.php';

include 'db.php';
require 'cartController.php';

$list = new cartController($pdo);
$rs = $list-> getAll();
?>





<!DOCTYPE html>
<html lang="nl">
<!-- header off each page based off head.php   -->
    <head>
        <title>List</title>
        <?php require 'head.php'; ?>
    </head>
<!-- menu off each page based off menu.php   -->
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <?php require 'menu.php'; ?>
        </nav>
        
        <div class="col-xl-12 mx-auto container-fluid" style="margin-top:80px">
        <h1>Orders</h1>
        <a href = "cartManager.php?action=create" title="add a record" class="btn btn-success navbar-btn">New Order</a>
    
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

                <th>User_ID</th>
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

                <td><?= $row->User_ID ?></td>
                <td><a title="delete" href="cartManager.php?action=delete&Order_ID=<?= $row->Order_ID ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
    </body>

</html>

