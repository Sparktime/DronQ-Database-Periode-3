<?php

class cartController {

    protected $pdo;

    public function __construct($db) {

        $this->pdo = $db;

    }

    public function create(){

        $sql = "INSERT INTO `ORDER` (Price, OrderDate, ShippingDate, OrderStatus, Employee) VALUES('',CURDATE(),'','','')";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        checkSQL($stmt);
    }

    public function delete($id){

        $sql = 'DELETE FROM `ORDER` WHERE Order_ID = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        checkSQL($stmt);

        // return to list
        if(isset($_SESSION['list'])) {
            header('location: ' . $_SESSION['list']);
        } else {
            header('location: .');
        }
    }

    public function save($id, $data){
        $sql = "UPDATE `ORDER` SET Price = ?, OrderDate = ?, ShippingDate = ?, OrderStatus = ?, Employee = ?, Serial_No = ?, Customer_ID = ? WHERE Order_ID = ?";
        $stmt = $this->pdo->prepare($sql);
//var_dump($data);
        $stmt->execute([$data['Price'], $data['OrderDate'], $data['ShippingDate'], $data['OrderStatus'], $data['Employee'], $data['Serial_No'], $data['Customer_ID'], $id]);
                checkSQL($stmt);
//
//         return to list
        if(isset($_SESSION['list'])) {
            header('location: ' . $_SESSION['list']);
        } else {
            header('location: .');
        }
    }

    public function get($id){
        // get record
        $sql = "SELECT * FROM `ORDER` WHERE `Order_ID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        checkSQL($stmt);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAll(){
        // get result set
        $sql = "SELECT * FROM `ORDER` ORDER BY `Order_ID` DESC";
        return $this->pdo->query($sql, PDO::FETCH_OBJ);
    }

}