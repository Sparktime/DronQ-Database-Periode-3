<?php
// UTF-8 NΟ BOM

// disable caching in browsers and proxies 
// to prevent stale data after refresh or redirect
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');

// connection parameters to local database could be:
$dsn = 'mysql:dbname=83480Dronq;host=sql1.pcextreme.nl;charset=utf8'; // no hyphen in utf8
$user = '83480Manager';
$pass = 'DronQManager!';

// my connection paramaters are secret
include 'db-settings.php';

// connect to database
try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die('connection failed: ' . $e->getMessage());
}

// enable error messages
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// function to call after execution of statement
function checkSQL($stmt)
{
   $info = $stmt->errorInfo();
    if ($info[0] != '00000') {
        echo $info[2];
        exit;
    }
}

//function checkSQL($stmt)
{
    $info = $stmt->errorInfo();
    if ($info[0] != '00000') {
        $x = $info[2];
        echo '<script type='text/javascript'>';
        echo 'error(x);';
        echo '</script>";';

       exit;
    }
}

?>

<script type="text/JavaScript">
    function error(x) {

        var txt;
        var r = confirm("You Fucked Up Son!");
        if (r == true) {
            var myWindow = window.open("<?=$_SESSION['list']?>//", "_self")
            txt = "Return to list";
        } else {
            txt = "Show Error";
            window.alert(x);
        }
    }

</script>