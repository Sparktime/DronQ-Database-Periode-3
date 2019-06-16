<?php

class productInfoController
{

    protected $pdo;

    public function __construct($db)
    {

        $this->pdo = $db;

    }


    public function save($type) {
        $sql = "UPDATE `PRODUCTINFO` SET `Name` = ?, `Text` = ?, `Infotext` = ?, `Specs` =?, `Price` = ?
                WHERE `Type` = $type";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$_POST["Name"], $_POST["Text"], $_POST["Infotext"], $_POST["Specs"], $_POST["Price"]]);
    }

    // list off all the product
    public function getAll()
    {
// get result set
        $sql = "SELECT * FROM `PRODUCTINFO` ORDER BY `Type` DESC";
        return $this->pdo->query($sql, PDO::FETCH_OBJ);
//        $rs = $pdo->query($sql, PDO::FETCH_OBJ);
    }

    public function imageUpload()
    {

        error_reporting(-1);
        ini_set('display_errors', 'On');


        $target_dir = "uploads/img/";
        $target_file = $target_dir . basename($_FILES["image_file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image_file"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["image_file"]["size"] > 999999999999) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {

            if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["image_file"]["name"]) . " has been uploaded.";
                $this->storeImagePathInDatabase($_POST["Type"], $target_file);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }


    public function storeImagePathInDatabase($type, $imgPath) {
        $sql = "UPDATE `PRODUCTINFO` SET `IMG`= ? WHERE `Type` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$imgPath, $type]);
    }



    public function csvUpload()
    {

        $target_dir = "uploads/csv/";
        $target_file = $target_dir . basename($_FILES["csv_file"]["name"]);
        $uploadOk = 1;
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        if (isset($_POST["submit"])) {
            $uploadOk = 1;
        }
// Allow certain file formats
        if ($fileType != "csv") {
            echo "Sorry, only CSV files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["csv_file"]["tmp_name"], $target_file)) {
                $this->processCsv($target_file);
                echo "The file " . basename($_FILES["csv_file"]["name"]) . " has been uploaded.";

            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

    function processCsv($path)
    {

        $file = fopen($path, "r");
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sql = "INSERT INTO `PRODUCTINFO` (`Name`, `Type`, `Text`, `Infotext`, `Specs`, `Price`)
                values(?,?,?,?,?,?);";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([$getData[0], $getData[1], $getData[2], $getData[3], $getData[4], $getData[5]]);
        }
        if (isset($_SESSION['list'])) {
            header('location: ' . $_SESSION['list']);
        } else {
            header('location: .');
        }
    }

}