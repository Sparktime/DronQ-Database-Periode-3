<?php
require 'db.php';
require 'cartController.php';

$order = new cartController($pdo);
$row = $order->get($_GET['Order_ID']);

?>


<!DOCTYPE html>
<html lang="nl">

    <head>
        <title>List</title>
        <?php require 'head.php'; ?>
    </head>

    <body>

    <!-- Navigation-->
        <form method="post" action="cartManager.php?action=save">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <div class="container col-xl-12">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href= "database.php" class="nav-link navbar-brand" >Home</a>
                        </li>
                    	<li class="nav-item">		     
				            <a href= "cart-list.php" class="nav-link" >Orders</a>
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
    
      <div class="container" style="margin-top:80px">
        <div class="row">
			<div class="col-xl-10">
                <h1>Edit Order</h1>
                <div class="row">
                    <label>Order ID
                        <input type="text" readonly name="Order ID" value="<?= $row->Order_ID ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Price
                        <input type="text" name="Price" value="<?= $row->Price ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Order Date
                        <input type="text" name="Order Date" value="<?= $row->OrderDate ?>">
                    </label>
                            </div>
                <div class="row">
                    <label>Shipping Date
                        <input type="text" name="Shipping Date" value="<?= $row->ShippingDate ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Order Status
                        <input type="text" name="Order Status" value="<?= $row->OrderStatus ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Employee
                        <input type="text" name="Employee" value="<?= $row->Employee ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Serial No
                        <input type="text" name="Serial No" value="<?= $row->Serial_No ?>">
                    </label>
                </div>
                    <div class="row">
                    <label>Customer ID
                        <input type="text" name="Customer ID" value="<?= $row->Customer_ID ?>">
                    </label>
                </div>
            </div>
        </div>
      </div>

        </form>
    </body>

</html>

