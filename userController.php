<?php
session_start();

class userController
{

    protected $pdo;

    public function __construct($db)
    {

        $this->pdo = $db;


    }

    //Registreer function,
    public function register($email, $password)
    {
        $sql = "SELECT `Email` FROM `USER` WHERE `Email` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        checkSQL($stmt);
        if ($stmt->rowCount() == 0) {
            /// password wordt gehashed
            $password = password_hash($password, PASSWORD_DEFAULT);
            //gebruiker wordt opgeslagen in de DB
            $sql2 = "INSERT INTO `USER` (Email, PasswordHash) VALUES(?,?)";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute([$email, $password]);

            checkSQL($stmt);
            $session = $this->pdo->lastInsertId();
            $_SESSION['userid'] = $session;
            return $session;
        }
    }

    public function login($email, $password)
    {


        $sql = "SELECT `PasswordHash` FROM `USER` WHERE `Email` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        checkSQL($stmt);
        $hash = $stmt->fetch(PDO::FETCH_OBJ);
        $test = $hash->PasswordHash;

        // Check Password/Email combination
        if (password_verify($password, $test)) {
            $sql2 = "SELECT `User_ID`  FROM `USER` WHERE `Email` = ?";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute([$email]);
            checkSQL($stmt2);
            $userid = $stmt2->fetch(PDO::FETCH_OBJ);
            $id = $userid->User_ID;

// Check AdminLevel

            $sql3 = "SELECT `AdminLevel`  FROM `USER` WHERE `Email` = ?";
            $stmt3 = $this->pdo->prepare($sql3);
            $stmt3->execute([$email]);
            checkSQL($stmt3);
            $adminlevel = $stmt3->fetch(PDO::FETCH_OBJ);
            $level = $adminlevel->AdminLevel;

            // Set Session ID
            $_SESSION['userid'] = $id;


            if ($level == 1) {

                $_SESSION['level'] = admin;

                header('location: user-list.php');
            } else {
                header('location: webstoreGUI.php');
            }
        }

    }

    public function create()
    {

        $sql = "INSERT INTO `USER` (User_Surname, User_Firstname, Address, ZipCode, Country, Email, PasswordHash, Telephone, Day_Of_Birth, RegistrationDate, Adminlevel) VALUES('','','','','','','','','',CURDATE(),0)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        checkSQL($stmt);
        $newid = $this->pdo->lastInsertId();
        header('location: user-edit.php?User_ID=' . $newid);

    }

    public function delete($id)
    {

        $sql = 'DELETE FROM `USER` WHERE User_ID = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        checkSQL($stmt);

        // return to list
        if (isset($_SESSION['list'])) {
            header('location: ' . $_SESSION['list']);
        } else {
            header('location: .');
        }
    }

    public function save($id, $data)
    {
        $sql = "UPDATE `USER` SET User_Surname = ?, User_Firstname = ?, Address = ?, ZipCode = ?, City = ?, Country = ?, Email = ?, Telephone = ?, Day_Of_Birth = ?, RegistrationDate = ?, AdminLevel = ? WHERE User_ID = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['User_Surname'], $data['User_Firstname'], $data['Address'], $data['ZipCode'], $data['City'], $data['Country'], $data['Email'], $data['Telephone'], $data['Day_Of_Birth'], $data['RegistrationDate'], $data['AdminLevel'], $id]);
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

        $sql = "SELECT * FROM `USER` WHERE `User_ID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        checkSQL($stmt);

        return $stmt->fetch(PDO::FETCH_OBJ);

    }

    public function getAll()
    {
        // get result set
        $sql = "SELECT * FROM `USER` ORDER BY `User_ID` DESC";
        return $this->pdo->query($sql, PDO::FETCH_OBJ);
    }
}
