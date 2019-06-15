<?php
require 'db.php';
require 'webstoreController.php';

$_SESSION['list'] = 'productinfo-edit.php';

$product = new webstoreController($pdo);
$row = $product->get($_GET['Type']);

?>


<!DOCTYPE html>
<html lang="nl">
<!-- header off each page based off head.php   -->
    <head>
        <meta charset="UTF-8">
        <title>List</title>
        <?php require 'head.php'; ?>
    </head>

    <body>

    <!-- Navigation -->
    <form method="post" action="webstoreManager.php?action=save">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container col-xl-12">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href= "index.php" class="nav-link navbar-brand" >Home</a>
                    </li>
                    <li class="nav-item">		     
				        <a href= "product-list.php" class="nav-link" >Product</a>
                    </li>  
                    <li class="nav-item">
				        <button title="save" type="submit" class="btn btn-primary navbar-btn" >Save</button>
                    </li>
                    <li class="nav-item">
                        <button title="reset" type="reset" class="btn btn-primary navbar-btn">Reset</button>
                    </li>
                </ul>
             </div>
        </nav>
    
    <!-- Input -->
      <div class="container" style="margin-top:80px">
        <div class="row">
			<div class="col-xl-10">
                <h1>Edit Product</h1>
                   <div class="row">
                    <label>Name
                        <input type="text" readonly name="Name" value="<?= $row->Name ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Type
                        <input type="text" name="Type" value="<?= $row->Type ?>">
                    </label>
                </div>

                <div class="row">
                    <label>Text
                        <input type="text" name="Text" value="<?= $row->Text ?>">
                    </label>
                </div>

                <div class="row">
                    <label>Infotext
                        <input type="text" name="Infotext" value="<?= $row->Infotext ?>">
                    </label>
                </div>

                <div class="row">
                    <label>Specs
                        <input type="text" name="Specs" value="<?= $row->Specs ?>">
                    </label>
                </div>

                <div class="row">
                    <label>Price
                        <input type="text" name="Price" value="<?= $row->Price ?>">
                    </label>
                </div>

                
            </div>
        </div>
    </div>

    </form>
    </body>

</html>
