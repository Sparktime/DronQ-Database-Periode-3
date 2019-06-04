<?php
require 'db.php';
require 'productController.php';

$product = new productController($pdo);
$row = $product->get($_GET['Serial_No']);


//// get url parameter
//$Serial_No = $_GET['Serial_No'];

// get record
//$sql = "SELECT * FROM `PRODUCT` WHERE `Serial_No` = ?";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$Serial_No]);
//checkSQL($stmt);

//$row = $stmt->fetch(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="nl">

    <head>
        <meta charset="UTF-8">
        <title>List</title>
        <?php require 'head.php'; ?>
    </head>

    <body>

    <!-- Navigation -->
    <form method="post" action="productManager.php?action=save">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container col-xl-12">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href= "database.php" class="nav-link navbar-brand" >Home</a>
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
                    <label>Serial No
                        <input type="text" readonly name="Serial No" value="<?= $row->Serial_No ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Type
                        <input type="text" name="Type" value="<?= $row->Type ?>">
                    </label>
                </div>

                <div class="row">
                    <label>Manufacturing Date
                        <input type="text" name="Manufacturing Date" value="<?= $row->Manufacturing_Date ?>">
                    </label>
                </div>
                
            </div>
        </div>
    </div>

    </form>
    </body>

</html>
