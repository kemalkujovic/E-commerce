

<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Shopping Cart
            </h3>
        </a>
        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="mr-auto"></div>
            <div class="navbar-nav align-items-center h4 text-primary">
                      
                        <?php
                             if(isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])){
                                echo '<a href="cart.php" class="nav-item nav-link active">';
                                echo '<h5 class="d-flex align-items-center px-5 cart">';
                                echo "<i class=\"fas fa-shopping-cart\"></i> Cart";
                                if (isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light rounded-circle p-2\">$count</span>";
                                }else{
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light rounded-circle p-2 \">0</span>";
                                }
                                echo '</h5>';
                                echo '</a>';
                             }
                        ?>
                         <?php
           if (isset($_SESSION['admin_name'])) {
            // Prijavljen je admin
            echo '<li class="mr-3">Dobrodošli, ' . $_SESSION['admin_name'] . '!</li>';
            echo '<li><a href="logout.php">Odjava</a></li>';
        } elseif (isset($_SESSION['user_name'])) {
            // Prijavljen je korisnik
            echo '<li class="mr-3">Dobrodošli, ' . $_SESSION['user_name'] . '!</li>';
            echo '<li><a href="logout.php">Odjava</a></li>';
        } else {
            // Korisnik nije prijavljen
            echo '<li class="d-flex mr-2"><a href="login.php">Prijava</a></li>';
            echo '<li><a href="registration.php">Registracija</a></li>';
        }
        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>





