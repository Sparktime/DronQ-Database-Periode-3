<?php

session_start();
require 'db.php';
require 'webstoreController.php';



    // DELETE PRODUCT //
if($_GET['action'] == 'deleteSearch') {


    $delete = new webstoreController($pdo);
    $delete->deleteSearch($_GET['Searchterm']);
}

header('location: search-list.php');