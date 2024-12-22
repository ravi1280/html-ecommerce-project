<?php session_start();

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">

    <link href="css/homeStyle.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    
  

    <div class=" hederfix" >

        <div class="container px-0 ">
            <nav class="navbar navbar-light bg-white navbar-expand-xl ">
                <a href="homePage2.php" class="navbar-brand">
                    <h1 class="text-primary display-6">NewClothes</h1>
                </a>
                <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars text-primary"></span>
                </button>
                <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                    <div class="navbar-nav mx-auto">
                        <a href="homePage2.php" class="nav-item nav-link active">Home</a>
                        <a href="product2.php" class="nav-item nav-link">Shop</a>
                        <!-- <a href="shop-detail.html" class="nav-item nav-link">Shop Detail</a> -->
                        <a href="homePage2.php#contactSec" class="nav-item nav-link">Contact</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="cart.php" class="dropdown-item">Cart</a>
                                <a href="watchList.php" class="dropdown-item">Watchlist</a>
                                <a href="purchasedHistory.php" class="dropdown-item">Purchased History</a>
                                <a href="userProfile.php" class="dropdown-item">User Prfofile</a>
                                <a href="adminSignIn.php" class="dropdown-item">Admin</a>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex m-3 me-0">
                        <a class="btn-search btn    bg-white me-4"
                            href="searchPage.php"><i class="fas fa-search border border-1 p-3 border-primary rounded-circle fs-4 mt-1 text-primary"></i>
                        </a>
                        <a href="cart.php" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-bag fa-2x"></i>
                            <?php
                            if (isset($_SESSION["u"])) {
                                // $data = $_SESSION["u"];
                                $email = $_SESSION["u"]["email"];

                                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_email`='" . $email . "' ");
                                $cart_num = $cart_rs->num_rows;
                                if ($cart_num == 0) {
                                    ?>
                                    <span
                                        class="position-absolute bg-warning rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                        style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0</span>
                                    <?php

                                } else {
                                    ?>
                                    <span
                                        class="position-absolute bg-warning rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                        style="top: -5px; left: 15px; height: 20px; min-width: 20px;"><?php echo $cart_num ?></span>
                                    <?php

                                }

                            } else {
                                ?>
                                <span
                                    class="position-absolute bg-warning rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                                    style="top: -5px; left: 15px; height: 20px; min-width: 20px;">0</span>
                                <?php

                            }
                            ?>
                            
                        <?php
                        if (isset($_SESSION["u"])) {
                            $data = $_SESSION["u"];
                            ?>
                            <a href="#" class="my-auto" onclick="signout();">
                                <i class="bi bi-box-arrow-right fa-2x text-danger "></i>
                            </a>
                            <?php
                        } else { ?>
                            <a href="index.php" class="my-auto">
                                <i class="fas fa-user fa-2x text-secondary"></i>
                            </a>
                            <?php

                        }

                        ?>

                    </div>
                </div>
            </nav>
        </div>
    </div>
    

</body>

</html>