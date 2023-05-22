

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
            <div class="navbar-nav ">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="d-flex px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php

                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light rounded-circle p-2\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light rounded-circle p-2 \">0</span>";
                        }


                        ?>
                         <?php
           if (isset($_SESSION['admin_name'])) {
            // Prijavljen je admin
            echo '<li>Dobrodošli, ' . $_SESSION['admin_name'] . '!</li>';
            echo '<li><a href="logout.php">Odjava</a></li>';
        } elseif (isset($_SESSION['user_name'])) {
            // Prijavljen je korisnik
            echo '<li>Dobrodošli, ' . $_SESSION['user_name'] . '!</li>';
            echo '<li><a href="logout.php">Odjava</a></li>';
        } else {
            // Korisnik nije prijavljen
            echo '<li><a href="login.php">Prijava</a></li>';
            echo '<li><a href="registration.php">Registracija</a></li>';
        }
        ?>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>





