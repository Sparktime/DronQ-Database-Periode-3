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

<!-- Masthead -->
<header class="masthead text-white text-top">
    <div class="overlay">
    </div>
</header>

<div class="row">
    <div>
        <div class="col-xl-6 mx-auto container-fluid" style="margin-top:80px">
            <h1>Login</h1>
            <form method="post" action="login-check.php">
                <div class="form-group col-lg-3">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" placeholder="Enter Email" name="Email">
                </div>
                <div class="form-group col-lg-3">
                    <label for="pwd">Password:</label>
                    <input type="password"  name="PasswordHash" class="form-control" placeholder="Enter password">
                </div>  
                
                <button type="submit" value="login"class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-xl-6 mx-auto container-fluid" style="margin-top:80px">
        <h1>Register</h1>
        <form method="post" action="register-new.php">
            <div class="form-group col-lg-3">
                <label for="email">Email:</label>
                <input type="text" class="form-control" placeholder="Enter Email" name="Email">
            </div>
            <div class="form-group col-lg-3">
                <label for="pwd">Password:</label>
                <input type="password"  name="PasswordHash" class="form-control" placeholder="Enter password">
            </div>

            <button type="submit" value="login"class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
