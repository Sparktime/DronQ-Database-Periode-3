<?php
session_start();
require 'db.php';

$_SESSION['list'] = 'productGUI.php';


require 'webstoreController.php';

$product = new webstoreController($pdo);
$row = $product->get($_GET['Type']);
?>

<DOCTYPE html>
    <html lang="nl">
    <!-- header off each page based off head.php   -->
    <head>
        <title>Product</title>
        <?php require 'head.php'; ?>
    </head>

    <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <?php require 'menu.php'; ?>
    </nav>


    <section class="showcase about-section">

        <div class="container-fluid">
            <div class="col-xl-9 mx-auto">
                <div class="row">
                    <div class="col-lg-6 text-white showcase-img"
                         style="background-image: url('<?= $row->IMG ?>');">
                    </div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2><?= $row->Name ?></h2>
                        <p class="lead mb-0"><?= $row->Text ?></p>
                        <h3>Info</h3>
                        <p class="lead mb-0"><?= $row->Infotext ?></p>
                        <p></p>
                        <h3>€ <?= $row->Price ?>,-</h3>
                        <a href="cartManager.php?action=create&Type=<?= $row->Type ?>" title="add a record"
                           class="btn btn-success navbar-btn float-right">Add to cart</a>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- footer off each page based off footer.php   -->
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