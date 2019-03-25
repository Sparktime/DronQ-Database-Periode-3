<?php
require 'db.php';

// get url parameter
$Customer_ID = $_GET['Customer_ID'];

// get record
$sql = "SELECT * FROM `CUSTOMER` WHERE `Customer_ID` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Customer_ID]);
checkSQL($stmt);

$row = $stmt->fetch(PDO::FETCH_OBJ);

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
      <div class="container">
        <div class="row">
			<div class="col-xl-10">
                <h1>Customer</h1>
                <div class="row">
                    <label>Customer ID
                        <input type="text" readonly name="Customer ID" value="<?= $row->Customer_ID ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Customer Surname
                        <input type="text" name="Customer Surname" value="<?= $row->Customer_Surname ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Customer Firstname
                        <input type="text" name="Customer Firstname" value="<?= $row->Customer_Firstname ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Address
                        <input type="text" name="Address" value="<?= $row->Address ?>">
                    </label>
                </div>
                <div class="row">
                    <label>ZipCode
                        <input type="text" name="ZipCode" value="<?= $row->ZipCode ?>">
                    </label>
                </div>
                <div class="row">
                    <label>City
                        <input type="text" name="City" value="<?= $row->City ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Country
                        <input type="text" name="Country" value="<?= $row->Country ?>">
                    </label>
                </div>
                <div class="row">
                    <label>
                        Email
                        <input type="text" name="Email" value="<?= $row->Email ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Telephone
                        <input type="text" name="Telephone" value="<?= $row->Telephone ?>">
                    </label>
                </div>
                <div class="row">
                    <label>Day Of Birth
                        <input type="text" name="Day Of Birth" value="<?= $row->Day_Of_Birth ?>">
                    </label>
                </div>
                <div class="row">
                    <label>RegistrationDate
                        <input type="text" name="RegistrationDate" value="<?= $row->RegistrationDate ?>">
                    </label>
                </div>
            </div>
        </div>
    </div>

    </form>
    </body>

</html>

