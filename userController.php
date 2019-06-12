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
        $sql = "SELECT `Email` FROM `CUSTOMER` WHERE `Email` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        checkSQL($stmt);
        if ($stmt->rowCount() == 0) {
            /// password wordt gehashed
            $password = password_hash($password, PASSWORD_DEFAULT);
            //gebruiker wordt opgeslagen in de DB
            $sql2 = "INSERT INTO `CUSTOMER` (Email, PasswordHash) VALUES(?,?)";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute([$email, $password]);

            checkSQL($stmt);
            $session = $this->pdo->lastInsertId();
            $_SESSION['customerid'] = $session;
            return $session;
        }
    }

    public function login($email, $password)
    {


        $sql = "SELECT `PasswordHash` FROM `CUSTOMER` WHERE `Email` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        checkSQL($stmt);
        $hash = $stmt->fetch(PDO::FETCH_OBJ);
        $test = $hash->PasswordHash;

        // Check Password/Email combination
        if (password_verify($password, $test)) {
            $sql2 = "SELECT `Customer_ID`  FROM `CUSTOMER` WHERE `Email` = ?";
            $stmt2 = $this->pdo->prepare($sql2);
            $stmt2->execute([$email]);
            checkSQL($stmt2);
            $customerid = $stmt2->fetch(PDO::FETCH_OBJ);
            $id = $customerid->Customer_ID;

// Check AdminLevel

            $sql3 = "SELECT `AdminLevel`  FROM `CUSTOMER` WHERE `Email` = ?";
            $stmt3 = $this->pdo->prepare($sql3);
            $stmt3->execute([$email]);
            checkSQL($stmt3);
            $adminlevel = $stmt3->fetch(PDO::FETCH_OBJ);
            $level = $adminlevel->AdminLevel;

            // Set Session ID
            $_SESSION['customerid'] = $id;


            if ($level == 1) {

                $_SESSION['level'] = admin;

                header('location: customer-list.php');
            }
            elseif ($level == 0) {

                $_SESSION['level'] = user;

                header('location: webstore.php');

            } else {
                echo 'Invalid password.';


            }
        }
    }

    public function create()
    {

        $sql = "INSERT INTO `CUSTOMER` (Customer_Surname, Customer_Firstname, Address, ZipCode, Country, Email, PasswordHash, Telephone, Day_Of_Birth, RegistrationDate, Adminlevel) VALUES('','','','','','','','','',CURDATE(),0)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        checkSQL($stmt);
        $newid = $this->pdo->lastInsertId();
        header('location: customer-edit.php?Customer_ID=' . $newid);

    }

    public function delete($id)
    {

        $sql = 'DELETE FROM `CUSTOMER` WHERE Customer_ID = ?';
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
        $sql = "UPDATE `CUSTOMER` SET Customer_Surname = ?, Customer_Firstname = ?, Address = ?, ZipCode = ?, City = ?, Country = ?, Email = ?, Telephone = ?, Day_Of_Birth = ?, RegistrationDate = ?, AdminLevel = ? WHERE Customer_ID = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$data['Customer_Surname'], $data['Customer_Firstname'], $data['Address'], $data['ZipCode'], $data['City'], $data['Country'], $data['Email'], $data['Telephone'], $data['Day_Of_Birth'], $data['RegistrationDate'], $data['AdminLevel'], $id]);
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

        $sql = "SELECT * FROM `CUSTOMER` WHERE `Customer_ID` = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        checkSQL($stmt);

        return $stmt->fetch(PDO::FETCH_OBJ);

    }

    public function getAll()
    {
        // get result set
        $sql = "SELECT * FROM `CUSTOMER` ORDER BY `Customer_ID` DESC";
        return $this->pdo->query($sql, PDO::FETCH_OBJ);
    }
}
