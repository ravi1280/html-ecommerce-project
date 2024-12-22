<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Product ||</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="css/homeStyle.css" rel="stylesheet">


</head>

<body>
    <?php
    require "alertBoxContend.php";
    require "connection.php";
    include "header1.php";

    ?>
    <div class="container-fluid vesitable py-5 ">
        <div class="container py-5">
            <div class="row   mt-3 mb-2 ">

            </div>


            <div class="row   mt-2  ">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="homePage2.php">Home</a></li>
                        <li class="breadcrumb-item active text-black" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
            <h1 class="mb-0 text-primary text-start fw-bold  " id="shirt">- Shirt -</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php

                $product_rs = Database::search("SELECT *,`product`.`id`AS`pid` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`category_id`
                INNER JOIN `status` ON `status`.`id`=`product`.`status_id`
                 WHERE  `status`.`name`='Active' AND `category`.`name`= 'Shirt'");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc(); ?>
                    <div class="border border-3 rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["pid"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>

                        <?php
                        if (isset($_SESSION["u"])) {
                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                         `users_email`='" . $_SESSION["u"]["email"] . "'");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {
                                ?>
                                <div class="text-danger border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;"><i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php

                            } else {
                                ?>
                                <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;" onclick='addToWatchlist(<?php echo $product_data["pid"]; ?>);'>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute disabled"
                                style="top: 10px; right: 10px;"><i class="fa fa-heart " aria-hidden="true"></i>
                            </div>

                            <?php
                        }
                        ?>


                        <div class="p-4 rounded-bottom cardH ">

                            <h4 class=" fw-bold"><?php echo $product_data["title"]; ?></h4>

                            <p><?php echo $product_data["description"]; ?></p>
                            <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                                <p class="text-dark fs-5 fw-bold mt-1 mb-0 ">RS:<?php echo $product_data["price"]; ?>.00</p>
                                <?php
                                if (isset($_SESSION["u"])) {
                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                            class="btn border border-secondary rounded-pill px-3 text-primary"> Buy Now</a>
                                        <a class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                class="fa fa-shopping-bag me-2  "
                                                onclick='addToCart(<?php echo $product_data["id"]; ?>);'></i> </a>

                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn border  border-2   px-3 text-primary" onclick="al();"> Buy Now</a>
                                        <a href="" class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary " onclick="al();"></i> </a>

                                        <?php
                                    }

                                } else {
                                    ?>
                                    <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                        class="btn border  border-2   px-3 text-primary"> Buy Now</a>
                                    <a class="btn border border-2 disabled text-center text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary "></i> </a>

                                    <?php
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                    <?php
                }

                ?>

            </div>
        </div>
    </div>
    <div class="container-fluid vesitable  " id="shoes">
        <div class="container ">
            <h1 class="mb-0 text-primary text-start fw-bold  ">- Shoes -</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php

                $product_rs = Database::search("SELECT *,`product`.`id`AS`pid` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`category_id`
                INNER JOIN `status` ON `status`.`id`=`product`.`status_id`
                 WHERE  `status`.`name`='Active' AND `category`.`name`= 'Shoes'");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc(); ?>
                    <div class="border border-3 rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["pid"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>

                        <?php
                        if (isset($_SESSION["u"])) {
                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                         `users_email`='" . $_SESSION["u"]["email"] . "'");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {
                                ?>
                                <div class="text-danger border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;"><i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php

                            } else {
                                ?>
                                <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;" onclick='addToWatchlist(<?php echo $product_data["pid"]; ?>);'>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute disabled"
                                style="top: 10px; right: 10px;"><i class="fa fa-heart " aria-hidden="true"></i>
                            </div>

                            <?php
                        }
                        ?>


                        <div class="p-4 rounded-bottom cardH ">

                            <h4 class=" fw-bold"><?php echo $product_data["title"]; ?></h4>

                            <p><?php echo $product_data["description"]; ?></p>
                            <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                                <p class="text-dark fs-5 fw-bold mt-1 mb-0">RS:<?php echo $product_data["price"]; ?>.00</p>
                                <?php
                                if (isset($_SESSION["u"])) {
                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                            class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn border  border-2   px-3 text-primary" onclick="al();"> Buy Now</a>

                                        <?php
                                    }

                                } else {
                                    ?>
                                    <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                        class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                    <?php
                                }

                                if (isset($_SESSION["u"])) {

                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary "
                                                onclick='addToCart(<?php echo $product_data["pid"]; ?>);'></i> </a>
                                        <?php

                                    } else {
                                        ?>
                                        <a href="" class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary " onclick="al();"></i> </a>
                                        <?php

                                    }
                                } else {
                                    ?>
                                    <a class="btn border border-2 disabled text-center text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary "></i> </a>
                                    <?php

                                }

                                ?>



                            </div>
                        </div>
                    </div>
                    <?php
                }

                ?>

            </div>
        </div>
    </div>
    <div class="container-fluid vesitable " id="cap">
        <div class="container ">
            <h1 class="mb-0 text-primary text-start fw-bold  ">- Cap -</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php

                $product_rs = Database::search("SELECT *,`product`.`id`AS`pid` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`category_id`
                INNER JOIN `status` ON `status`.`id`=`product`.`status_id`
                 WHERE  `status`.`name`='Active' AND `category`.`name`= 'Cap'");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc(); ?>
                    <div class="border border-3 rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["pid"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>

                        <?php
                        if (isset($_SESSION["u"])) {
                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                         `users_email`='" . $_SESSION["u"]["email"] . "'");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {
                                ?>
                                <div class="text-danger border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;"><i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php

                            } else {
                                ?>
                                <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;" onclick='addToWatchlist(<?php echo $product_data["pid"]; ?>);'>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute disabled"
                                style="top: 10px; right: 10px;"><i class="fa fa-heart " aria-hidden="true"></i>
                            </div>

                            <?php
                        }
                        ?>


                        <div class="p-4 rounded-bottom cardH ">

                            <h4 class=" fw-bold"><?php echo $product_data["title"]; ?></h4>

                            <p><?php echo $product_data["description"]; ?></p>
                            <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                                <p class="text-dark fs-5 fw-bold mt-1 mb-0">RS:<?php echo $product_data["price"]; ?>.00</p>
                                <?php
                                if (isset($_SESSION["u"])) {
                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                            class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn border  border-2   px-3 text-primary" onclick="al();"> Buy Now</a>

                                        <?php
                                    }

                                } else {
                                    ?>
                                    <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                        class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                    <?php
                                }

                                if (isset($_SESSION["u"])) {

                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary "
                                                onclick='addToCart(<?php echo $product_data["pid"]; ?>);'></i> </a>
                                        <?php

                                    } else {
                                        ?>
                                        <a href="" class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary " onclick="al();"></i> </a>
                                        <?php

                                    }
                                } else {
                                    ?>
                                    <a class="btn border border-2 disabled text-center text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary "></i> </a>
                                    <?php

                                }

                                ?>



                            </div>
                        </div>
                    </div>
                    <?php
                }

                ?>

            </div>
        </div>
    </div>


    <div class="container-fluid vesitable  " id="tshirt">
        <div class="container ">
            <h1 class="mb-0 text-primary text-start fw-bold  ">- T Shirt -</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php

                $product_rs = Database::search("SELECT *,`product`.`id`AS`pid` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`category_id`
                INNER JOIN `status` ON `status`.`id`=`product`.`status_id`
                 WHERE  `status`.`name`='Active' AND `category`.`name`= 'T-Shirt'");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc(); ?>
                    <div class="border border-3 rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["pid"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>

                        <?php
                        if (isset($_SESSION["u"])) {
                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                         `users_email`='" . $_SESSION["u"]["email"] . "'");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {
                                ?>
                                <div class="text-danger border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;"><i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php

                            } else {
                                ?>
                                <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;" onclick='addToWatchlist(<?php echo $product_data["pid"]; ?>);'>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute disabled"
                                style="top: 10px; right: 10px;"><i class="fa fa-heart " aria-hidden="true"></i>
                            </div>

                            <?php
                        }
                        ?>


                        <div class="p-4 rounded-bottom cardH ">

                            <h4 class=" fw-bold"><?php echo $product_data["title"]; ?></h4>

                            <p><?php echo $product_data["description"]; ?></p>
                            <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                                <p class="text-dark fs-5 fw-bold mt-1 mb-0">RS:<?php echo $product_data["price"]; ?>.00</p>
                                <?php
                                if (isset($_SESSION["u"])) {
                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                            class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn border  border-2   px-3 text-primary" onclick="al();"> Buy Now</a>

                                        <?php
                                    }

                                } else {
                                    ?>
                                    <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                        class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                    <?php
                                }

                                if (isset($_SESSION["u"])) {

                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary "
                                                onclick='addToCart(<?php echo $product_data["pid"]; ?>);'></i> </a>
                                        <?php

                                    } else {
                                        ?>
                                        <a href="" class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary " onclick="al();"></i> </a>
                                        <?php

                                    }
                                } else {
                                    ?>
                                    <a class="btn border border-2 disabled text-center text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary "></i> </a>
                                    <?php

                                }

                                ?>



                            </div>
                        </div>
                    </div>
                    <?php
                }

                ?>

            </div>
        </div>
    </div>
    <div class="container-fluid vesitable  " id="pants">
        <div class="container ">
            <h1 class="mb-0 text-primary text-start fw-bold  ">- Pants -</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php

                $product_rs = Database::search("SELECT *,`product`.`id`AS`pid` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`category_id`
                INNER JOIN `status` ON `status`.`id`=`product`.`status_id`
                 WHERE  `status`.`name`='Active' AND `category`.`name`= 'Pants'");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc(); ?>
                    <div class="border border-3 rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["pid"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>

                        <?php
                        if (isset($_SESSION["u"])) {
                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                         `users_email`='" . $_SESSION["u"]["email"] . "'");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {
                                ?>
                                <div class="text-danger border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;"><i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php

                            } else {
                                ?>
                                <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;" onclick='addToWatchlist(<?php echo $product_data["pid"]; ?>);'>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute disabled"
                                style="top: 10px; right: 10px;"><i class="fa fa-heart " aria-hidden="true"></i>
                            </div>

                            <?php
                        }
                        ?>


                        <div class="p-4 rounded-bottom cardH ">

                            <h4 class=" fw-bold"><?php echo $product_data["title"]; ?></h4>

                            <p><?php echo $product_data["description"]; ?></p>
                            <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                                <p class="text-dark fs-5 fw-bold mt-1 mb-0">RS:<?php echo $product_data["price"]; ?>.00</p>
                                <?php
                                if (isset($_SESSION["u"])) {
                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                            class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn border  border-2   px-3 text-primary" onclick="al();"> Buy Now</a>

                                        <?php
                                    }

                                } else {
                                    ?>
                                    <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                        class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                    <?php
                                }

                                if (isset($_SESSION["u"])) {

                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary "
                                                onclick='addToCart(<?php echo $product_data["pid"]; ?>);'></i> </a>
                                        <?php

                                    } else {
                                        ?>
                                        <a href="" class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary " onclick="al();"></i> </a>
                                        <?php

                                    }
                                } else {
                                    ?>
                                    <a class="btn border border-2 disabled text-center text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary "></i> </a>
                                    <?php

                                }

                                ?>



                            </div>
                        </div>
                    </div>
                    <?php
                }

                ?>

            </div>
        </div>
    </div>
    <div class="container-fluid vesitable  " id="sportKit">
        <div class="container ">
            <h1 class="mb-0 text-primary text-start fw-bold  ">- Sport Kit -</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php

                $product_rs = Database::search("SELECT *,`product`.`id`AS`pid` FROM `product` INNER JOIN `category` ON `category`.`id`=`product`.`category_id`
                INNER JOIN `status` ON `status`.`id`=`product`.`status_id`
                 WHERE  `status`.`name`='Active' AND `category`.`name`= 'Sport Kit'");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc(); ?>
                    <div class="border border-3 rounded position-relative vesitable-item">
                        <div class="vesitable-img">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["pid"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>

                        <?php
                        if (isset($_SESSION["u"])) {
                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["pid"] . "' AND 
                         `users_email`='" . $_SESSION["u"]["email"] . "'");
                            $watchlist_num = $watchlist_rs->num_rows;

                            if ($watchlist_num == 1) {
                                ?>
                                <div class="text-danger border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;"><i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php

                            } else {
                                ?>
                                <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute"
                                    style="top: 10px; right: 10px;" onclick='addToWatchlist(<?php echo $product_data["pid"]; ?>);'>
                                    <i class="fa fa-heart" aria-hidden="true"></i>
                                </div>

                                <?php
                            }
                        } else {
                            ?>
                            <div class="text-secondary border border-2  px-3 py-1 rounded-pill position-absolute disabled"
                                style="top: 10px; right: 10px;"><i class="fa fa-heart " aria-hidden="true"></i>
                            </div>

                            <?php
                        }
                        ?>


                        <div class="p-4 rounded-bottom cardH ">

                            <h4 class=" fw-bold"><?php echo $product_data["title"]; ?></h4>

                            <p><?php echo $product_data["description"]; ?></p>
                            <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                                <p class="text-dark fs-5 fw-bold mt-1 mb-0">RS:<?php echo $product_data["price"]; ?>.00</p>
                                <?php
                                if (isset($_SESSION["u"])) {
                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                            class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn border  border-2   px-3 text-primary" onclick="al();"> Buy Now</a>

                                        <?php
                                    }

                                } else {
                                    ?>
                                    <a href="<?php echo "singleProductView.php?id=" . $product_data["pid"]; ?>"
                                        class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                    <?php
                                }

                                if (isset($_SESSION["u"])) {

                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary "
                                                onclick='addToCart(<?php echo $product_data["pid"]; ?>);'></i> </a>
                                        <?php

                                    } else {
                                        ?>
                                        <a href="" class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary " onclick="al();"></i> </a>
                                        <?php

                                    }
                                } else {
                                    ?>
                                    <a class="btn border border-2 disabled text-center text-primary"><i
                                            class="fa fa-shopping-bag me-2 text-primary "></i> </a>
                                    <?php

                                }

                                ?>



                            </div>
                        </div>
                    </div>
                    <?php
                }

                ?>

            </div>
        </div>
    </div>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top backTopBtn"><i
            class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/homemain.js"></script>
    <script src="script.js"></script>
</body>

</html>