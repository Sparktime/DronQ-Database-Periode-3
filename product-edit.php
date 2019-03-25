<?php
require 'db.php';

// get url parameter
$Serial_No = $_GET['Serial_No'];

// get record
$sql = "SELECT * FROM `PRODUCT` WHERE `Serial_No` = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$Serial_No]);
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
    <form method="post" action="product-save.php">
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
      <div class="container">
        <div class="row">
			<div class="col-xl-10">
                <h1>Product</h1>
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
