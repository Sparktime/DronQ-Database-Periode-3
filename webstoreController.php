<?php

class webstoreController
{

    protected $pdo;

    public function __construct($db)
    {

        $this->pdo = $db;


    }

    public function get($Type)
    {

        $sql = "SELECT * FROM `PRODUCTINFO` WHERE `Type` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$Type]);
        checkSQL($stmt);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }


    public function getAll($search)
    {

        if (($search == NULL)) {

            $sql = "SELECT * FROM `PRODUCTINFO` ORDER BY `Type` DESC";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            checkSQL($stmt);
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } else {
            $sql = "SELECT * FROM `PRODUCTINFO` WHERE `Type` LIKE ? OR `Name` LIKE ? OR `Text` LIKE ? OR `Infotext` LIKE ? OR `Specs` LIKE ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(["%$search%", "%$search%", "%$search%", "%$search%", "%$search%"]);
            checkSQL($stmt);
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (empty($result)) {

                $sql2 = "INSERT INTO `SEARCH` (Searchterm, Entrytime) VALUES (?,CURDATE())";
                $stmt2 = $this->pdo->prepare($sql2);
                $stmt2->execute([$search]);
                return $result;


            } else {
                return $result;

            }



        }
    }
}





//return $stmt->fetchAll(PDO::FETCH_OBJ);

//} else {