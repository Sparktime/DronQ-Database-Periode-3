<!doctype html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
        
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

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
    
        <div class="col-xl-12 mx-auto container-fluid" style="margin-top:80px">
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
    </body>
</html>


<html lang="nl">





</html>