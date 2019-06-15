<?php
session_start();
require 'db.php';
// get content from create-tabels.sql
$sql = file_get_contents('create-tables.sql');

// check for special characters
$sql = str_replace("\xEF\xBB\xBF", '', $sql);
$pdo->query($sql);

if(isset($_SESSION['list'])) {

    header('location: ' . $_SESSION['list']);
} else {
    header('location: .');
}