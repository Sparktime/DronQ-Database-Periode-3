<?php

class orderController {

    protected $pdo;

    public function __construct($db) {

        $this->pdo = $db;


    }


    public function create(){

        $sql = "INSERT INTO `CUSTOMER` (Customer_Surname, Customer_Firstname, Address, ZipCode, Country, Email, Telephone, Day_Of_Birth, RegistrationDate) VALUES('','','','','','','','',CURDATE())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        checkSQL($stmt);

    }

    public function delete($id) {

        $sql = 'DELETE FROM `CUSTOMER` WHERE Customer_ID = ?';
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

    public function save($id, $data) {
        $sql = "UPDATE `CUSTOMER` SET Customer_Surname = ?, Customer_Firstname = ?, Address = ?, ZipCode = ?, City = ?, Country = ?, Email = ?, Telephone = ?, Day_Of_Birth = ?, RegistrationDate = ? WHERE Customer_ID = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['Customer_Surname'], $data['Customer_Firstname'], $data['Address'], $data['ZipCode'], $data['City'], $data['Country'], $data['Email'], $data['Telephone'], $data['Day_Of_Birth'], $data['RegistrationDate'], $id]);
        checkSQL($stmt);
    }

    public function get($id) {

        $sql = "SELECT * FROM `CUSTOMER` WHERE `Customer_ID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        checkSQL($stmt);

        return $stmt->fetch(PDO::FETCH_OBJ);

    }

    public function getAll() {
        // get result set
        $sql = "SELECT * FROM `CUSTOMER` ORDER BY `Customer_ID` DESC";
        return $this->pdo->query($sql, PDO::FETCH_OBJ);
    }
}
