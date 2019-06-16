<?php
// UTF-8 NΟ BOM 
session_start();
$_SESSION['list'] = 'productInfo-list.php';


include 'db.php';
require 'productInfoController.php';

$list = new productInfoController($pdo);
$rs = $list-> getAll();


?>


<!DOCTYPE html>
<html lang="nl">

    <head>
        <title> Product list</title>
        <?php require 'head.php'; ?>
    </head>

    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <?php require 'menu.php'; ?>
        </nav>
        
        <div class="col-xl-12 mx-auto container-fluid" style="margin-top:80px">
        <h1>Products</h1>
        <a href = "productInfoManager.php?action=create" title="add a record" class="btn btn-success navbar-btn">New Product</a>
    
        <!-- show result set -->
        <table class="table">
            <tr>
                <th>Edit</th>
                <th>Name</th>
                <th>Type</th>
                <th>Text</th>                
                <th>Specs</th>
                <th>Price</th>
                <th>IMG</th>
            </tr>
            
            <!-- PHP Database -->
            <?php while ($row = $rs->fetch()) { ?>
            <tr>
                <td><a title="edit" href="productinfo-edit.php?Type=<?= $row->Type ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><?= $row->Name ?></td>
                <td><?= $row->Type ?></td>
                <td><?= $row->Text ?></td>
                <td><?= $row->Specs ?></td>
                <td><?= $row->Price ?></td>
                <td><img src="<?= $row->IMG ?>" width="60" height="40"></td>
                <td><a title="delete" href="productInfoManager.php?action=delete&Type=<?= $row->Type ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
        
        <div class="row">
           <div class="col-lg-6">
                <form action='productInfoManager.php?action=csvUpload' method='post' enctype="multipart/form-data">
                Import .CSV : <input type='file' name='csv_file' size='20'>
                <input class="btn btn-primary" type='submit' name='submit' value='submit'>
                </form>
            </div>
        </div>



    </body>

</html>

    