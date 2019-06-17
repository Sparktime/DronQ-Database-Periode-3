<?php

error_reporting(-1);
ini_set('display_errors', 'On');
session_start();
require 'db.php';
//require 'uploadController.php';

$target_dir = "uploads/csv/";
$target_file = $target_dir . basename($_FILES["csv_file"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
        $uploadOk = 1;
}
// Allow certain file formats
if($fileType != "csv") {
    echo "Sorry, only CSV files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["csv_file"]["name"]). " has been uploaded.";
        progressCsv($target_file, $pdo);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

function progressCsv($path, $pdo) {
    $file = fopen($path, "r");
    while(($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
        $sql = "INSERT INTO `PRODUCTINFO` (`Name`, `Type`, `Text`, `Infotext`, `Specs`, `Price`, `IMG`)
                values(?,?,?,?,?,?,?);";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([$getData[0],$getData[1],$getData[2],$getData[3],$getData[4],$getData[5],$getData[6]]);
    }

//    $sql = "LOAD DATA LOCAL INFILE '$file' INTO TABLE `PRODUCTINFO` FIELDS TERMINATED BY ',' LINES TERMINATED BY '\n';";
//
//    $stmt = $pdo->prepare($sql);
//    $stmt->execute();
////    $stmt->execute([$csvfile]);
//    checkSQL($stmt);

//    $affectedRows = $pdo->exec
//    (
//        "LOAD DATA LOCAL INFILE "
//        .$pdo->quote($csvfile)
//        ." INTO TABLE `PRODUCTINFO` FIELDS TERMINATED BY "
//        .$pdo->quote(',')
//        ."LINES TERMINATED BY "
//        .$pdo->quote('\n')
//    );
//    echo "Loaded a total of $affectedRows records from this csv file.\n";
}


