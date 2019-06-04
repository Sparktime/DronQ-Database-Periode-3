<?php
// UTF-8 NΟ BOM 
session_start();
$_SESSION['list'] = 'product-list.php';


include 'db.php';
require 'productController.php';

$list = new productController($pdo);
$rs = $list-> getAll();

//// get result set
//$sql = "SELECT * FROM `PRODUCT` ORDER BY `Serial_No` DESC";
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
        
        <div class="col-xl-12 mx-auto container-fluid" style="margin-top:80px">
        <h1>Products</h1>
        <a href = "productManager.php/" title="add a record" class="btn btn-success navbar-btn">New Product</a>
    
        <!-- show result set -->
        <table class="table">
            <tr>
                <th>Edit</th>
                <th>Serial No</th>
                <th>Type</th>                
                <th>Manufacturing Date </th>
                <th>Delete</th>
            </tr>
            
            <!-- PHP Database -->
            <?php while ($row = $rs->fetch()) { ?>
            <tr>
                <td><a title="edit" href="product-edit.php?Serial_No=<?= $row->Serial_No ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><?= $row->Serial_No ?></td>
                <td><?= $row->Type ?></td>
                <td><?= $row->Manufacturing_Date ?></td>
                <td><a title="delete" href="productManager.php?Serial_No=<?= $row->Serial_No ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>s
    </body>

</html>

    