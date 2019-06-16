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
        <title>Product info</title>
        <?php require 'head.php'; ?>
    </head>

    <body>

    <!-- Navigation -->
    <form method="post" action="productInfoManagßer.php?action=save">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container col-xl-12">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href= "index.php" class="nav-link navbar-brand" >Home</a>
                    </li>
                    <li class="nav-item">		     
				        <a href= "productInfo-list.php" class="nav-link" >Product</a>
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
                <h1>Edit Product Info</h1>
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
                        <textarea rows="10" cols="75" name="Text"><?= $row->Text ?></textarea>
                    </label>
                </div>

                <div class="row">
                    <label>Infotext
                        <textarea rows="10" cols="75" name="Infotext" ><?= $row->Infotext ?></textarea>
                    </label>
                </div>

                <div class="row">
                    <label>Specs
                        <textarea rows="10" cols="75" name="Specs" ><?= $row->Specs ?></textarea>
                    </label>
                </div>

                <div class="row">
                    <label>Price
                        <input type="text" name="Price" value="<?= $row->Price ?>">
                    </label>
                </div>

                <div class="row">
                    <img src="<?= $row->IMG ?>" alt="<?= $row->Name ?>" />
                </div>

                <div class="col-lg-6">

                </div>
                
            </div>
        </div>
    </div>

    </form>

    <div class="container">
        <form action="productInfoManager.php?action=imageUpload" method="post" enctype="multipart/form-data">
            <input type="text" name="Type" value="<?= $row->Type ?>" hidden>
            <input type="file" name="image_file">
            <button class="btn btn-primary" type="submit" name="submit">Upload IMG</button>
        </form>
    </div>
    </body>

</html>
