<?php
class webstoreController
{

    protected $pdo;

    public function __construct($db)
    {

        $this->pdo = $db;


    }

    public function get($Type){

        $sql = "SELECT * FROM `PRODUCTINFO` WHERE `Type` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$Type]);
        checkSQL($stmt);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAll(){

        $sql = "SELECT * FROM `PRODUCTINFO` ORDER BY `Type` DESC";
        return $this->pdo->query($sql, PDO::FETCH_OBJ);
    }

    public function search($search){
        
        $sql = "SELECT * FROM `PRODUCTINFO` WHERE 'Type' LIKE ? OR 'Name' LIKE ? OR 'Text' LIKE ? OR 'Infotext' LIKE ? OR 'Specs' LIKE ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([%$search%, %$search%, %$search%, %$search%, %$search%]);
        checkSQL($stmt);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }