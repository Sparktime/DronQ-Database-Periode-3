<?php
require 'db.php';
require 'userController.php';
// get url parameter
//$Customer_ID = $_GET['Customer_ID'];
//
//// get record
//$sql = "SELECT * FROM `CUSTOMER` WHERE `Customer_ID` = ?";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$Customer_ID]);
//checkSQL($stmt);
//
//$row = $stmt->fetch(PDO::FETCH_OBJ);

$user = new userController($pdo);
$row = $user->get($_GET['Customer_ID']);
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

    <!-- Navigation -->
    <form method="post" action="customer-save.php">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container col-xl-12">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href= "database.php" class="nav-link navbar-brand" >Home</a>
                    </li>
                    <li class="nav-item">		     
				        <a href= "customer-list.php" class="nav-link" >Customers</a>
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
                <h1>Edit Customer</h1>
                    <table class="table">
                            <tr>
                                <th>Customer ID</th>
                                <th><input type="text" readonly name="Customer ID" value="<?= $row->Customer_ID ?>"></th>
                            </tr>
                            <tr>
                                <th>Customer Surname</th>
                                <th><input type="text" name="Customer Surname" value="<?= $row->Customer_Surname ?>"></th>
                            </tr>
                            <tr>
                                <th>Customer Firstname</th>
                                <th><input type="text" name="Customer Firstname" value="<?= $row->Customer_Firstname ?>"></th>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <th> <input type="text" name="Address" value="<?= $row->Address ?>"></th>
                            </tr>
                            <tr>
                                <th>ZipCode</th>
                                <th><input type="text" name="ZipCode" value="<?= $row->ZipCode ?>"></th>
                            </tr>
                            <tr>
                                <th>City</th>
                                <th><input type="text" name="City" value="<?= $row->City ?>"></th>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <th><input type="text" name="Country" value="<?= $row->Country ?>"></th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th><input type="text" readonly name="Email" value="<?= $row->Email ?>"></th>
                            </tr>
                            <tr>
                                <th>Telephone</th>
                                <th><input type="text" name="Telephone" value="<?= $row->Telephone ?>"></th>
                            </tr>
                            <tr>
                                <th>Day Of Birth</th>
                                <th><input type="text" name="Day Of Birth" value="<?= $row->Day_Of_Birth ?>"></th>
                            </tr>
                            <tr>
                                <th>RegistrationDate</th>
                                <th><input type="text" name="RegistrationDate" value="<?= $row->RegistrationDate ?>"></th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
    </body>

</html>

