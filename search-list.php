<?php
// UTF-8 NΟ BOM 
session_start();
$_SESSION['list'] = 'search-list.php';


include 'db.php';
require 'webstoreController.php';

$list = new webstoreController($pdo);
$rs = $list-> getSearch();

?>


<!DOCTYPE html>
<html lang="nl">
<!-- header off each page based off head.php   -->
    <head>
        <title>Wrong search history</title>
        <?php require 'head.php'; ?>
    </head>

    <body>
    <!-- menu off each page based off menu.php   -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <?php require 'menu.php'; ?>
        </nav>

        <div class="col-xl-9 mx-auto container-fluid" style="margin-top:80px">
        <h1>Wrong search history</h1>

        <!-- show result set -->
        <table class="table">
            <tr>
                <th>Search term</th>
                <th>Entrytime</th>
                <th>Delete</th>
            </tr>
            
            <!-- PHP Database -->
            <?php foreach ($rs as $row) { ?>
            <tr>

                <td><?= $row->Searchterm ?></td>
                <td><?= $row->Entrytime ?></td>
                <td><a title="delete" href="webstoreManager.php?action=deleteSearch&Searchterm=<?= $row->Searchterm ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
    </body>

</html>

    