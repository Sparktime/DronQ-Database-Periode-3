<?php

class productController {

    protected $pdo;

    public function __construct($db){

        $this->pdo = $db;

    }

    public function create(){

        $sql = "INSERT INTO `PRODUCT` (Type, Manufacturing_Date) VALUES('',CURDATE())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
//        $stmt->debugDumpParams();
        checkSQL($stmt);
    }

    public function delete($Serial_No){
        $sql = 'DELETE FROM `PRODUCT` WHERE Serial_No = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$Serial_No]);
        checkSQL($stmt);

        // return to list
        if(isset($_SESSION['list'])) {
            header('location: ' . $_SESSION['list']);
        } else {
            header('location: .');
        }
    }

    public function save($Serial_No, $data){
        $sql = "UPDATE `PRODUCT` SET Type = ?, Manufacturing_Date = ? WHERE Serial_No = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['Type'], $data['Manufacturing_Date'], $Serial_No]);
        checkSQL($stmt);

        // return to list
        if(isset($_SESSION['list'])) {
            header('location: ' . $_SESSION['list']);
        } else {
            header('location: .');
        }
    }

    public function get($Serial_No){
        $sql = "SELECT * FROM `PRODUCT` WHERE `Serial_No` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$Serial_No]);
        checkSQL($stmt);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAll(){
        $sql = "SELECT * FROM `PRODUCT` ORDER BY `Serial_No` DESC";
        return $this->pdo->query($sql, PDO::FETCH_OBJ);
    }

}