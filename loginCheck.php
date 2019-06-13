<?php
//// UTF-8 NΟ BOM
//session_start();
//$_SESSION['list'] = 'database.php';
require 'db.php';
require 'userController.php';


//$email = $_POST['email'];
//$password = $_POST['password'];
//$passwordhash = md5($password . $email);
//
//
//// insert record
//$sql = "INSERT INTO `USER` (Email, PasswordHash) VALUES(?,?)";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$email, $passwordhash]);
//checkSQL($stmt);
//
//$sql = "INSERT INTO `USER` (Email) VALUES(?)";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$email]);
//checkSQL($stmt);

//$sql = "SELECT `User_ID` FROM `USER` INNER JOIN `USER` ON `USER`.`Email` = `USER`.`Email` WHERE `USER`.`Email` = ?";
//$stmt = $pdo->prepare($sql);
//$stmt->execute([$email]);
//checkSQL($stmt);
//$userid = $stmt->fetch()[0];
//$_SESSION['email'] = $email;

$login = new userController($pdo);
$id = $login->login($_POST['Email'], $_POST['PasswordHash']); //Check email/password with user in DB
if(isset($id))
    header('location: user-edit.php?User_ID='.$id); //redirect to edit with user ID
else { echo 'Invalid login credentials'; }


//
//echo '<script type="text/javascript">',
//'wrongpw();',
//'</script>'
//;
//}
//?>
<!---->
<!---->
<!--<script>-->
<!--    function wrongpw() {-->
<!--        var txt;-->
<!--        var r = confirm("Wrong login credentials");-->
<!--        if (r == true) {-->
<!--            var myWindow = window.open("loginGIU.php", "_self")-->
<!--            txt = "Reset";-->
<!--        } else {-->
<!--            txt = "Cancel";-->
<!--        }-->
<!---->
<!--    }-->
<!--</script>-->