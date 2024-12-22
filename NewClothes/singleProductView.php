<?php
require "connection.php";
if (isset($_GET["id"])) {

    $pid = $_GET["id"];


    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");

    $product_num = $product_rs->num_rows;

    // if ($product_num == 1) {

    $product_data = $product_rs->fetch_assoc();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ProductView ||</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="icon" href="resource/icon.png" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    </head>

    <body class="b y">
        <?php include "header.php";
          require "alertBoxContend.php"; ?>

        <div class="container-fluid  ">

            <div class="row ">
                <div class="row   mt-5 mb-2 ">

                </div>
                <div class="row   mt-5 mb-2 ">

                </div>

                <div class="row   mt-2  ">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="homePage2.php">Home</a></li>
                            <li class="breadcrumb-item active text-black" aria-current="page">Product View</li>
                        </ol>
                    </nav>
                </div>



                <div class="col-10  offset-1 col-lg-3  offset-lg-2  mb-5 mt-5 ">
                    <div class="row ">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade " data-bs-ride="carousel">
                            <div class="carousel-inner sh rounded-5 ">
                                <?php

                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                $image_num = $image_rs->num_rows;
                                $img = array();

                                if ($image_num != 0) {

                                    for ($x = 0; $x < $image_num; $x++) {
                                        $image_data = $image_rs->fetch_assoc();
                                        $img[$x] = $image_data["code"];
                                        ?>
                                        <div class="carousel-item active">
                                            <img src="<?php echo $img["$x"] ?>" class="  w-100 rounded-5 slide  " alt="...">
                                        </div>
                                    <?php }
                                }
                                ?>

                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon bg-primary rounded-5 " aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleFade"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon bg-primary rounded-5" aria-hidden="true"></span>
                                <span class="visually-hidden ">Next</span>
                            </button>
                        </div>


                    </div>
                </div>

                <div class="col-10 offset-1 col-lg-5 mx-lg-3   rounded-5  border border-5 singleProductBackground">
                    <div class="row mt-3  text-center mb-4">
                        <div class="col-12  col-lg-4 mt-lg-1">
                            <?php
                            $category_rs = Database::search("SELECT * FROM `category` WHERE `id`='" . $product_data["category_id"] . "'");
                            $category_data = $category_rs->fetch_assoc();
                            ?>
                            <span class=" fw-bold text-black-50 fs-5 ">Category -
                                <?php echo $category_data["name"] ?></span>
                        </div>
                        <div class="col-12 col-lg-4 mt-lg-1">
                            <?php
                            $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                            $colour_data = $colour_rs->fetch_assoc();
                            ?>
                            <span class="fw-bold text-black-50 fs-5">Colour - <?php echo $colour_data["colour"] ?></span>
                        </div>
                        <div class="col-12 col-lg-4 mt-lg-1">
                            <?php
                            $size_rs = Database::search("SELECT * FROM `size` WHERE `id`='" . $product_data["size_id"] . "'");
                            $size_data = $size_rs->fetch_assoc();
                            ?>
                            <span class="fw-bold text-black-50 fs-5">Size - <?php echo $size_data["name"] ?></span>
                        </div>
                    </div>


                    <div class="col-12 mt-4 mb-4">
                        <div class="row ">
                            <div class="col-12 text-center my-2">
                                <?php
                                $d = $product_data["discount"];
                                $price = $product_data["price"];
                                $adding_price = ($price / 100) * $d;
                                $new_price = $price + $adding_price;
                                $difference = $new_price - $price;
                                $percentage = ($difference / $price) * 100;

                                ?>
                                <span class="fs-4 fw-bold text-dark">Rs.<?php echo $price ?>.00</span>
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                <span
                                    class="fs-4 fw-bold text-danger text-decoration-line-through">Rs.<?php echo $new_price; ?>.00</span>
                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                <span class="fs-4 fw-bold text-black-50">Save Rs. <?php echo $difference; ?> .00
                                    (<?php echo $percentage; ?>%)</span>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 text-center  my-2">

                        <span class="  fs-5">WARRENTY :
                            <?php echo $product_data["warrenty"] ?> Warrenty</span><br />
                        <span class="  fs-5">Delivery Cost : Rs:
                            <?php echo $product_data["delivery_fee"] ?>.00 </span><br />

                        <span class="  fs-5">In Stock : <?php echo $product_data["qty"] ?>
                            Items Available</span><br />
                        <!-- <span class="   fs-5">Sold : 10 Items* </span> -->
                    </div>
                    <div class="col-lg-10 offset-lg-1 col-12">
                        <div class="row">
                            <div class="col-lg-6  offset-lg-3  col-10 offset-1   mt-2  ">

                                <span class=" fs-6 fw-bold ">Quantity : </span>
                                <input type="text" class=" fs-6 fw-bold text-start   rounded-3 border border-5"
                                    style="outline: none;" pattern="[0-9]" value=" 1" id="qty_input"
                                    onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);' />
                            </div>
                            <div class="col-1 d-none d-lg-block">
                                <div class="position-absolute qty-buttons ">
                                    <div
                                        class="justify-content-center d-flex flex-column align-items-center border-secondary qty-inc ">
                                        <i class="bi bi-caret-up-fill text-primary fs-6 "
                                            onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                    </div>
                                    <div
                                        class="justify-content-center d-flex flex-column align-items-center  border-secondary qty-dec">
                                        <i class="bi bi-caret-down-fill text-primary fs-6" onclick="qty_dec();"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12   ">
                        <div class="row">
                            <?php

                            if (isset($_SESSION["u"])) {
                                ?>
                                <div class="row   mb-4 mt-5">
                                    <?php
                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <div class="col-10  col-lg-3 d-grid  offset-lg-2 offset-1 mt-2 ">
                                            <a class="btn btn-danger " onclick='addToCart(<?php echo $product_data["id"]; ?>);'>Add
                                                to cart</a>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-10  col-lg-3 d-grid  offset-lg-2 offset-1 mt-2 ">
                                            <a class="btn btn-danger " onclick="al();">Add to cart</a>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                    <div class="col-10 col-lg-3 d-grid  offset-lg-0 offset-1  mt-2">
                                        <button type="submit" class="btn btn-primary" id="payhere-payment"
                                            onclick="payNow(<?php echo $pid; ?>);">Buy Now</button>

                                    </div>
                                    <?php

                                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                     `users_email`='" . $_SESSION["u"]["email"] . "'");
                                    $watchlist_num = $watchlist_rs->num_rows;

                                    if ($watchlist_num == 1) {
                                        ?>
                                        <div class="col-10 col-lg-3 d-grid  offset-lg-0 offset-1  mt-2 ">
                                            <a class="btn btn-primary disabled ">Watchlist</a>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="col-10 col-lg-3 d-grid  offset-lg-0 offset-1  mt-2">
                                            <a href="watchList.php" class="btn btn-primary  "
                                                onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'>Watchlist</a>
                                        </div>
                                        <?php
                                    }
                                    ?>

                                </div>

                                <?php

                            } else {
                                ?>
                                <div class=" col-10  offset-1  mt-4 mb-4 ">
                                    <div class="row ">
                                        <div class="col-12 text-center rounded-5 border border-5 my-2">
                                            <span class="badge mt-3 mb-3 ">
                                                <label class="fs-5 text-danger  fw-bold ">• Please Login First •</label>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }

                            ?>

                        </div>
                    </div>
                    <div class="col-10 offset-1 text-center mb-5 mt-3">
                        <div class="row">
                            <div class="col-12">
                                <label class="form-label fw-bold  fs-5">- Product Description -</label>
                            </div>
                            <div class="col-12">
                                <textarea cols="20" rows="2" class="form-control fs-6 text-center "
                                    readonly>   <?php echo $product_data["description"] ?> </textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </div>


        <div class="col-12">
            <diw class="row">
                <div class="col-10 offset-1 mt-lg-2">
                    <div class="row">
                        <hr class="mt-5 mb-4">
                    </div>
                </div>
                <div class="col-12 text-center mb-">
                    <label class="form-label fw-bold " style="font-size: 20px;">- Related Items -</label>
                </div>
                <div class="col-10 offset-1 mt-4">
                    <div class="row">
                        <?php

                        $relatedProduct_rs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $product_data["category_id"] . "' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0 ");
                        $relatedProduct_num = $relatedProduct_rs->num_rows;


                        for ($z = 0; $z <  $relatedProduct_num; $z++) {
                            $relatedProduct_data = $relatedProduct_rs->fetch_assoc();
                            ?>
                            <div class="col-lg-3 col-12 mb-2">
                                <div class="border border-3 rounded position-relative ">
                                    <div class="">
                                        <?php

                                        $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $relatedProduct_data["id"] . "'");
                                        $image_data = $image_rs->fetch_assoc();

                                        ?>
                                        <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top"
                                            alt="">
                                    </div>

                                    <?php
                                    if (isset($_SESSION["u"])) {
                                        $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $relatedProduct_data["id"] . "' AND 
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
                                                style="top: 10px; right: 10px;"
                                                onclick='addToWatchlist(<?php echo $relatedProduct_data["id"]; ?>);'><i class="fa fa-heart"
                                                    aria-hidden="true"></i>
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

                                        <h4 class=" fw-bold"><?php echo $relatedProduct_data["title"]; ?></h4>

                                        <p><?php echo $relatedProduct_data["description"]; ?></p>
                                        <div class="d-flex justify-content-between flex-lg-wrap mt-2">
                                            <p class="text-dark fs-5 fw-bold mt-1 mb-0 ">
                                                RS:<?php echo $relatedProduct_data["price"]; ?>.00
                                            </p>
                                            <?php
                                            if (isset($_SESSION["u"])) {
                                                if ($relatedProduct_data["qty"] > 0) {
                                                    ?>
                                                    <a href="<?php echo "singleProductView.php?id=" . $relatedProduct_data["id"]; ?>"
                                                        class="btn border border-secondary rounded-pill px-3 text-primary"> Buy Now</a>
                                                    <a class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                                            class="fa fa-shopping-bag me-2  "
                                                            onclick='addToCart(<?php echo $relatedProduct_data["id"]; ?>);'></i> </a>

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
                                                <a href="<?php echo "singleProductView.php?id=" . $relatedProduct_data["id"]; ?>"
                                                    class="btn border  border-2   px-3 text-primary"> Buy Now</a>
                                                <a class="btn border border-2 disabled text-center text-primary"><i
                                                        class="fa fa-shopping-bag me-2 text-primary "></i> </a>

                                                <?php
                                            }
                                            ?>


                                        </div>
                                    </div>
                                </div>
                            </div>



                            <?php
                        }

                        ?>
                    </div>
                </div>



        </div>


        <div class="col-10 offset-1">
            <div class="row">
                <hr class="mt-5 mb-5">
            </div>
        </div>
        </div>


        <?php
        include "footer.php";
        ?>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="script.js"></script>
    </body>

    </html>
    <?php


} else {
    echo ("Something went wrong");
}

?>