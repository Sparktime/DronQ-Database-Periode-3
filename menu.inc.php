<!-- navbar left -->
<div class="container col-xl-9">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">Menu<i class="fas fa-bars"></i></button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="index.php" class="navbar-brand">DronQ Industries</a>
            </li>
            <li class="nav-item">
                <a href="#info" class="nav-link js-scroll-trigger">Info</a>
            </li>
            <li class="nav-item">
                <a href="#specs" class="nav-link js-scroll-trigger">Specs</a>
            </li>
            <li class="nav-item">
                <a href="webstore.php" class="navbar-brand">Webstore</a>
            </li>
            <li class="nav-item">
                <a href="customer-list.php" class="nav-link">Users</a>
            </li>
            <li class="nav-item">
                <a href="product-list.php" class="nav-link">Products</a>
            </li>
            <li class="nav-item">
                <a href="cart-list.php" class="nav-link">Orders</a>
            </li>
            <li class="nav-item">
                <button type="button"
                        class="btn btn-danger navbar-btn" onclick="resetfunction()">Reset Database
                </button>
            </li>
        </ul>

        <div class="btn-group" role="group">
            <a type="button" class="btn btn-primary" href="loginGUI.php"><i class="fas fa-user"></i></a>
<!--            <a type="button" class="btn btn-primary" href="login.php"><i class="fas fa-user"></i> Login</a>-->
            <a type="button" class="btn btn-primary" href="shoppingcart.php"><i class="fas fa-shopping-cart"></i></a>
            <a type="button" class="btn btn-primary"><i class="fas fa-search"></i></a>
        </div>


    </div>
</div>


<!-- Warning before reset database-->
<script>
    function resetfunction() {
        var txt;
        var r = confirm("Are you sure you want to reset the database?");
        if (r == true) {
            var myWindow = window.open("create-tables.php", "_self")
            txt = "Reset";
        } else {
            txt = "Cancel";
        }

    }
</script>