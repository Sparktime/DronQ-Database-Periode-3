<!-- navbar left -->
<div class="container col-xl-9">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="index.php" class="navbar-brand">DronQ Industries</a>
            </li>


            <?php if ($_SESSION['list'] == 'index.php') {
                echo '<li class="nav-item">
                <a href="#info" class="nav-link js-scroll-trigger">Info</a>
            </li>
            <li class="nav-item">
                <a href="#specs" class="nav-link js-scroll-trigger">Specs</a>
            </li>';
            }
            ?>


            <li class="nav-item">
                <a href="webstoreGUI.php" class="navbar-brand">Webstore</a>
            </li>
<!-- checking the user level to allow access -->
            <?php if (isset($_SESSION['level']) == 1) {
                echo '<li class="nav-item">
                <a href="user-list.php" class="nav-link">Users</a>
            </li>';
            }
            ?>
            <?php if (isset($_SESSION['level']) == 1) {
                echo '<li class="nav-item">
                <a href="product-list.php" class="nav-link">Products</a>
            </li>';
            }
            ?>
            <?php if (isset($_SESSION['level']) == 1) {
                echo '<li class="nav-item">
                <a href="productinfo-list.php" class="nav-link">Product Info</a>
            </li>';
            }
            ?>
            <?php if (isset($_SESSION['level']) == 1) {
                echo '<li class="nav-item">
                <a href="order-list.php" class="nav-link">Orders</a>
            </li>';
            }
            ?>
            <?php if (isset($_SESSION['level']) == 1) {
                echo '<li class="nav-item">
                <a href="search-list.php" class="nav-link">Search History</a>
            </li>';
            }
            ?>
            <li class="nav-item">
                <button type="button"
                        class="btn btn-danger navbar-btn" onclick="resetfunction()">Reset Database
                </button>
            </li>
        </ul>

        
        <div class="btn-group" role="group">
                <?php if (isset($_SESSION['userid'])): ?>
                <a type="button" class="btn btn-primary" href="user-edit.php?User_ID=<?= $_SESSION['userid'] ?>"><i class="fas fa-user-edit"></i></a>
            <?php else:?>
            <a type="button" class="btn btn-primary" href="loginGUI.php"><i class="fas fa-user"></i></a>
            <?php endif; ?>


            <?php
            if (isset($_SESSION['userid'])) {
                echo '<a type="button" class="btn btn-primary" href="logout.php"><i class="fas fa-user-alt-slash"></i></a>';
            }
            ?>

            
            <a type="button" class="btn btn-primary" href="cartGUI.php"><i class="fas fa-shopping-cart"></i></a>
        </div>
        <div class="my-auto">
                <form method="post" action="webstoreGUI.php">
                  <input type="text" placeholder="Search.." name="search">
                  <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                </form>
        </div>
        
        
        <button class="btn btn-primary" href="#google_translate_element" data-toggle="collapse"><i class="fas fa-globe"></i></button>
        <div class="collapse" id="google_translate_element"><script type="text/javascript">
            function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE,multilanguagePage: true}, 'google_translate_element');
            }
            </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
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