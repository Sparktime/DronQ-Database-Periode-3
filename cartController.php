<?php
session_start();

class cartController
{

    protected $pdo;

    public function __construct($db)
    {

        $this->pdo = $db;

    }

    //creates cart based on user id
    public function create($id, $type)
    {

        $sql = "INSERT INTO `CART` (User_ID, Type)
        VALUES (?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id, $type]);
        checkSQL($stmt);
    }

    //deletes item to cart based on user id
    public function delete($id, $type)
    {

        $sql = "DELETE FROM `CART` WHERE `Type` = ? AND `User_ID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$type, $id]);
        checkSQL($stmt);

        // return to list
        if (isset($_SESSION['list'])) {
            header('location: ' . $_SESSION['list']);
        } else {
            header('location: .');
        }
    }

    // saves item to cart based on user id
    public function save($id, $data)
    {
        $sql = "UPDATE `ORDER` SET Price = ?, OrderDate = ?, ShippingDate = ?, OrderStatus = ?, Employee = ?, Serial_No = ?, User_ID = ? WHERE Order_ID = ?";
        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$data['Price'], $data['OrderDate'], $data['ShippingDate'], $data['OrderStatus'], $data['Employee'], $data['Serial_No'], $data['User_ID'], $id]);
        checkSQL($stmt);

    // return to list
        if (isset($_SESSION['list'])) {
            header('location: ' . $_SESSION['list']);
        } else {
            header('location: .');
        }
    }

    public function get($id)
    {
        // get record
        $sql = "SELECT * FROM `CART` WHERE `User_ID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        checkSQL($stmt);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAll()
    {
        // get result set
        $sql = "SELECT * FROM `CART` ORDER BY `User_ID` DESC";
        return $this->pdo->query($sql, PDO::FETCH_OBJ);
    }


}