<?php

session_start();
require 'db.php';
require 'webstoreController.php';



    // DELETE SEARCHTERM//
if($_GET['action'] == 'deleteSearch') {


    $delete = new webstoreController($pdo);
    $delete->deleteSearch($_GET['Searchterm']);
}

header('location: search-list.php');