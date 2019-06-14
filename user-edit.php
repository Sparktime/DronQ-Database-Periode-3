<?php

session_start();
// user id has equal the user id in the url unless level is admin
if ($_SESSION['userid'] != $_GET['User_ID'] && $_SESSION['level'] != admin)
    header('location: user-edit.php?User_ID=' . $_SESSION['userid']);


$_SESSION['list'] = 'user-edit.php';
require 'db.php';
require 'userController.php';

$user = new userController($pdo);
$row = $user->get($_GET['User_ID']);

?>


<!DOCTYPE html>
<html lang="nl">
<!-- header off each page based off head.php   -->
<head>
    <title>List</title>
    <?php require 'head.php'; ?>
</head>

<body>

<!-- Navigation -->
<form method="post" action="userManager.php?action=save">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container col-xl-12">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php" class="nav-link navbar-brand">Home</a>
                </li>
                <li class="nav-item">
                    <button title="save" type="submit" class="btn btn-primary navbar-btn">Save</button>
                </li>
                <li class="nav-item">
                    <button title="reset" type="reset" class="btn btn-primary navbar-btn">Reset</button>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Input -->


    <div class="container" style="margin-top:80px">
        <div class="row">
            <div class="col-xl-10">
                <h1>Edit User</h1>
                <table class="table">
                    <tr>
                        <th>User ID</th>
                        <th><input type="text" readonly name="User ID" value="<?= $row->User_ID ?>"></th>
                    </tr>
                    <tr>
                        <th>Surname</th>
                        <th><input type="text" name="User Surname" value="<?= $row->User_Surname ?>"></th>
                    </tr>
                    <tr>
                        <th>Firstname</th>
                        <th><input type="text" name="User Firstname" value="<?= $row->User_Firstname ?>"></th>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <th><input type="text" name="Address" value="<?= $row->Address ?>"></th>
                    </tr>
                    <tr>
                        <th>ZipCode</th>
                        <th><input type="text" name="ZipCode" value="<?= $row->ZipCode ?>"></th>
                    </tr>
                    <tr>
                        <th>City</th>
                        <th><input type="text" name="City" value="<?= $row->City ?>"></th>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <th><input type="text" name="Country" value="<?= $row->Country ?>"></th>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <th><input type="text" readonly name="Email" value="<?= $row->Email ?>"></th>
                    </tr>
                    <tr>
                        <th>Telephone</th>
                        <th><input type="text" name="Telephone" value="<?= $row->Telephone ?>"></th>
                    </tr>
                    <tr>
                        <th>Day Of Birth</th>
                        <th><input type="text" name="Day Of Birth" value="<?= $row->Day_Of_Birth ?>"></th>
                    </tr>
                    <tr>
                        <th>RegistrationDate</th>
                        <th><input type="text" name="RegistrationDate" value="<?= $row->RegistrationDate ?>"></th>
                    </tr>
                    <tr>
                        <th>Admin</th>
                        <th><input type="text" name="Admin" value="<?= $row->AdminLevel ?>"></th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</form>
</body>

</html>

