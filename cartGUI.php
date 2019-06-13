<?php
// UTF-8 NΟ BOM
session_start();
$_SESSION['list'] = 'cartGUI.php';

include 'db.php';
require 'cartController.php';

$list = new cartController($pdo);
$rs = $list->get($_SESSION['userid']);
//$rs = $list-> getAll();
?>


<DOCTYPE html>
    <html lang="nl">

    <head>
        <title>Shopping Cart</title>
        <?php require 'head.php'; ?>
    </head>

    <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <?php require 'menu.php'; ?>
    </nav>

    <div class="container-fluid">
        <div class="col-lg-9 mx-auto">
            <h1>Shopping Cart</h1>

            <table class="table">
                <tr>
                    <th>User ID</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Delete</th>
                </tr>

                <!-- PHP Database -->
                <?php foreach ($rs as $row) { ?>
                    <tr>
                        <td><?= $row->User_ID ?></td>
                        <td></td>
                        <td><?= $row->Type ?></td>
                        <td></td>
                        <td></td>
                        <td><a title="delete" href="cartManager.php?action=delete&Type=<?= $row->Type ?>"><i
                                        class="fas fa-trash-alt"></i></a></td>
                    </tr>
                <?php } ?>
            </table>

            <div>
                <button type="button" class="btn btn-success float-right">Checkout</button>
            </div>
        </div>
    </div>
    <?php require 'footer.php'; ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <script src="js/scroll.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.js"></script>

    </body>

    </html>