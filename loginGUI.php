<?php

session_start();
$_SESSION['list'] = 'loginGUI.php';
?>
<!doctype html>
<html lang="nl">
<head>
        <title>loginGUI</title>
        <?php require 'head.php'; ?>
</head>

<body>
<!-- Navbar -->
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <?php require 'menu.inc.php'; ?>
    </nav>
</div>

<!-- Login -->
<div class="container-fluid">
    <div class="col-xl-9 mx-auto" style="margin-top:80px">
        <div class="row">
            <div class="col-sm-6 mx-auto" >
                <h1>Login</h1>
                <form method="post" action="login-check.php">
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="Email">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <label for="pwd">Password:</label>
                        <input type="password"  name="PasswordHash" class="form-control" placeholder="Enter password">
                    </div>  

                    <button type="submit" value="login"class="btn btn-primary">Submit</button>
                </form>
            </div>

    <!-- Register -->
            <div class="col-sm-6 mx-auto">
                <h1>Register</h1>
                <form method="post" action="userManager.php?action=register">
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" placeholder="Enter Email" name="Email">
                    </div>
                    <div class="form-group col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <label for="pwd">Password:</label>
                        <input type="password"  name="PasswordHash" class="form-control" placeholder="Enter password">
                    </div>

                    <button type="submit" value="login"class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
