<?php
class webstoreController
{

    protected $pdo;

    public function __construct($db)
    {

        $this->pdo = $db;


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