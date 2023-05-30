

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
                                echo '<h5 class="d-flex align-items-center px-2 m-0 cart">';
                                echo "<i class=\"fas fa-shopping-cart\"></i> Cart";
                                if (isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light rounded-circle ml-1 \">$count</span>";
                                }else{
                                    echo "<span id=\"cart_count\" class=\"text-warning bg-light rounded-circle ml-1  \">0</span>";
                                }
                                echo '</h5>';
                                echo '</a>';
                             }
                        ?>
                        
                        
                         <?php

           if (isset($_SESSION['admin_name'])) {
            // Prijavljen je admin
            echo '<li class="mr-3 text-white">Dobrodošli, ' . $_SESSION['admin_name'] . '!</li>';
        } elseif (isset($_SESSION['user_name'])) {
            // Prijavljen je korisnik
            echo '<li class="mr-3 text-white">Dobrodošli, ' . $_SESSION['user_name'] . '!</li>';
        } else {
            // Korisnik nije prijavljen
            echo '<li class="d-flex mr-2 text-white"><a class="text-white btn btn-lg btn-outline-secondary" href="login.php">Prijava</a></li>';
            echo '<li><a class="text-white btn btn-lg btn-outline-secondary" href="registration.php">Registracija</a></li>';
        }
        ?>
    <?php
    if(isset($_SESSION['admin_name']) || isset($_SESSION['user_name'])){
       echo  '<div class="dropdown dropleft">';
        echo '<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo '<i class="fa fa-gear"></i>';
        echo '</button>';
        echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
        echo "<a class='dropdown-item text-center' href='logout.php'>Logout <i class='fa fa-sign-out' aria-hidden='true'></i></a>";
        echo "<a href='settings.php' class='dropdown-item text-center'>Settings <i class='fa fa-gear'></i></a>";
    }
    if(isset($_SESSION['admin_name'])){
        echo '<li><a class="dropdown-item text-center" href="admin.php">Admin <i class="fa fa-user"></i></a></li>';
    }
    
    ?>

</div>
</div>
                    </h5>
                </a>
            </div>
        </div>

    </nav>
</header>





