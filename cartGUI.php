<?php
// UTF-8 NΟ BOM
session_start();
$_SESSION['list'] = 'cartGUI.php';

include 'db.php';
require 'cartController.php';

$list = new cartController($pdo);
$rs = $list-> getAll();
?>


<DOCTYPE html>
<html lang="nl">

<head>
    <title>Webstore</title>
    <?php require 'head.php'; ?>
</head>
        
<body>
        
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <?php require 'menu.inc.php'; ?>
    </nav>

    <div class="container-fluid">
        <div class="col-lg-9 mx-auto">
            <h1>Shopping Cart</h1>
            
        <table class="table">
                    <tr>  
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Delete</th>
                    </tr>

                    <!-- PHP Database -->
                    <?php while ($row = $rs->fetch()) { ?>
                    <tr>
                        <td><img src="?= $row->Img ?"></td>
                        <td><?= $row->Name ?></td>
                        <td><i class="fas fa-plus"></i>  1   <i class="fas fa-minus"></i>
                        <td><a title="delete" href="cartManager.php?action=delete&Order_ID=<?= $row->Type ?>"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php } ?>
        </table>
  
            <div>
                <button type="button" class="btn btn-success float-right">Checkout</button>
            </div>
        </div>
    </div>
    <?php require 'footer.php';?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/scroll.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.js"></script>

</body>

</html>