<?php
session_start();
require 'db.php';
require 'webstoreController.php';

$webstore = new webstoreController($pdo);
$rs = $webstore->getAll();
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

    <!-- Images & Text -->
    <section class="showcase about-section">

        <div class="container-fluid">
            <div class="col-xl-9 mx-auto">
                <?php while ($row = $rs->fetch()) { ?>
                

                    <div class="row">
                        <div class="col-lg-6">
                            <a href="product.php?Type=<?= $row->Type ?>">
                                <img src="<?= $row->IMG ?>" class="img-responsive" >
                            </a>
                        </div>
                        <div class="col-lg-6 my-auto showcase-text">
                            <a href="product.php?Type=<?= $row->Type ?>">
                                <h2><?= $row->Name ?></h2>
                            </a> 
                            <p class="lead mb-0"><?= $row->Text ?></p>
                            <p></p>
                            <h3>€ <?= $row->Price ?>,-</h3>
                            <button href="product.php?Type=<?= $row->Type ?>" type="button" class="btn btn-primary float-right">+ Add to cart</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

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