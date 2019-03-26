
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href = "database.php" class="navbar-brand">Home</a>
            </li>
            <li class="nav-item">
                <a href = "customer-list.php" class="nav-link">Customers</a>
            </li>
            <li class="nav-item">
                <a href = "reseller-list.php" class="nav-link">Resellers</a>
            </li>
            <li class="nav-item">
                <a href = "product-list.php" class="nav-link">Products</a>
            </li>
            <li class="nav-item">
                <a href = "order-list.php" class="nav-link">Orders</a>
            </li>
            <li class="nav-item">
                <button type="button"
                 class="btn btn-danger navbar-btn" onclick="resetfunction()">Reset Database</button>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="register.php" class="btn btn-success">Register</a>
            </li>
            <p>" "</p>
            <li class="nav-item">
                <a href="login.php" class="btn btn-success navbar-btn">Login</a>
            </li>
            <p>" "</p>
        </ul>

    

<!-- Warning before reset -->
        <script>
            function resetfunction() {
                var txt;
                var r = confirm("Are you sure you want to reset the database?");
                if (r == true) {
                      var myWindow = window.open("create-tables.php", "_self")
                    txt = "Reset";}
                else {txt = "Cancel";}

                }
        </script>