<?php
// UTF-8 NΟ BOM

// disable caching in browsers and proxies 
// to prevent stale data after refresh or redirect
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// connection parameters to local database could be:
$dsn = 'mysql:dbname=83480Dronq;host=sql1.pcextreme.nl;charset=utf8'; // no hyphen in utf8
//$user = '83480Manager';
//$pass = 'DronQManager';

$user = '83480Dronq';
$pass = 'DronQ2018';


// connect to database
try {
    $pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_LOCAL_INFILE, true,));
} catch (PDOException $e) {
    die('connection failed: ' . $e->getMessage());
}

// enable error messages
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);



//  Create a popup alart for the SQL error`s

function checkSQL($stmt)
{
    $info = $stmt->errorInfo();
    if ($info[0] != '00000') {
        echo "<script type='text/javascript'>alert(\"$info[2]\");</script>";


       exit;
    }
}
