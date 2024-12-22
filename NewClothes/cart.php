<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cart ||</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://unpkg.com/scrollreveal"></script>


</head>

<body class="b y">
    <?php
     require "alertBoxContend.php";
      require "connection.php";
    include "header.php";

    if (isset($_SESSION["u"])) {
        $email = $_SESSION["u"]["email"];
        $total = 0;
        $subtotal = 0;
        $shipping = 0;

        $allDeliveryFee = 0;
        $allProductFee = 0;
        $allDifferance = 0;

        ?>
        <div class="col-12 text-center mt-5 mb-4">
            <label class=" form-label  fs-1 fw-bolder ">Cart</label>
        </div>
        <div class="col-11 col-lg-2 mx-3 mt-4">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="homePage.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cart </li>
                </ol>
            </nav>
        </div>

        <div class="col-12  mb-3">
            <div class="row">
                <?php
                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `users_email`='" . $email . "' ");
                $cart_num = $cart_rs->num_rows;
                if ($cart_num == 0) {

                    ?>
                    <div class="col-lg-6 col-12 offset-lg-1 mt-2 mb-5">
                        <div class="row">
                            <img src="resource/emptyCart.png" style="height:500px ;width: 500px;">
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1 col-10 offset-1">
                        <div class="row">
                            <button class="btn btn-danger d-block " style="height: 50px;margin-top:200px"
                                onclick="searchCart();"> Add
                                to Cart Item</button>
                        </div>
                    </div>

                <?php } else {

                    ?>

                    <div class="col-lg-8 col-12">
                        <div class="row d-flex justify-content-center align-items-center">
                            <?php


                            for ($x = 0; $x < $cart_num; $x++) {
                                $cart_data = $cart_rs->fetch_assoc();

                                $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart_data["product_id"] . "'");
                                $product_data = $product_rs->fetch_assoc();

                                $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $cart_data["product_id"] . "'");
                                $image_data = $image_rs->fetch_assoc();

                                $allDeliveryFee = $allDeliveryFee + $product_data["delivery_fee"];
                                $allProductFee = $allProductFee + $product_data["price"];

                                $d = $product_data["discount"];
                                $price = $product_data["price"];
                                $adding_price = ($price / 100) * $d;
                                $new_price = $price + $adding_price;
                                $difference = $new_price - $price;
                                $allDifferance = $difference + $allDifferance;

                                ?>


                                <!-- new -->
                                <div class="card mb-3 col-10 mx-2 ">
                                    <div class="row g-0">
                                        <div class="col-12">
                                            <h3 class="card-title text-black  fw-bold fs-2  text-center">-
                                                <?php echo $product_data["title"] ?> -
                                            </h3>
                                            <hr class="border border-2 border-success">
                                        </div>
                                        <div class="col-md-3">
                                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body singleProductBackground text-start ">

                                                <p class="card-text"> <?php
                                                $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                                $colour_data = $colour_rs->fetch_assoc();
                                                ?>

                                                    <span class="fw-bold text-black-50 fs-5">• Colour :</span>&nbsp;
                                                    <span
                                                        class="fw-bold text-black fs-5"><?php echo $colour_data["colour"] ?></span>
                                                    <br>

                                                    <?php
                                                    $size_rs = Database::search("SELECT * FROM `size` WHERE `id`='" . $product_data["size_id"] . "'");
                                                    $size_data = $size_rs->fetch_assoc();
                                                    ?>

                                                    <span class="fw-bold text-black-50 fs-5">• Size :</span>&nbsp;
                                                    <span class="fw-bold text-black fs-5"><?php echo $size_data["name"] ?></span>
                                                    <br>
                                                    <span class="fw-bold text-black-50 fs-5">• Price :</span>&nbsp;
                                                    <span
                                                        class="fw-bold text-black fs-5">Rs.<?php echo $product_data["price"] ?>.00|</span>
                                                    &nbsp;&nbsp; | &nbsp;&nbsp;
                                                    <span
                                                        class=" fs-5 fw-bold text-danger text-decoration-line-through">Rs.<?php echo $new_price; ?>.00</span>
                                                    <br>
                                                    <span class="fw-bold text-black-50 fs-5">• Save Price :</span>&nbsp;
                                                    <?php $discount1 = $product_data["discount"];
                                                    $price1 = $product_data["price"];
                                                    $adding_price1 = ($price1 / 100) * $discount1;
                                                    $new_price1 = $price1 + $adding_price1;
                                                    $difference1 = $new_price1 - $price1;
                                                    ?>
                                                    <span class="fw-bold text-black fs-5">Rs.<?php echo $difference1 ?>.00</span>
                                                    <br>
                                                    <span class="fw-bold text-black-50 fs-5">• Delivery Fee :</span>&nbsp;
                                                    <span
                                                        class="fw-bold text-black fs-5">Rs.<?php echo $product_data["delivery_fee"] ?>.00</span>
                                                    <br>
                                                    <span class="fw-bold fs-5 text-black-50">• Requested Total :</i></span>
                                                    <span class="fw-bold fs-5 text-black ">
                                                        <?php $requestTotal = $product_data["price"] + $product_data["delivery_fee"] ?>
                                                        Rs.<?php echo $requestTotal ?>.00</span>


                                            </div>
                                            <div class=" col-12">
                                                <div class="row">
                                                    <div class="col-lg-6  offset-lg-3  col-10   mt-2  ">

                                                        <span class=" fs-6 fw-bold text-black ">Quantity : </span>
                                                        <input type="text"
                                                            class=" fs-6 fw-bold text-start   rounded-3 border border-5"
                                                            style="outline: none;" pattern="[0-9]" value=" 1" id="qty_input"
                                                            onkeyup='checkValue(<?php echo $product_data["qty"]; ?>);' />
                                                    </div>
                                                    <div class="col-1 ">
                                                        <div class="position-absolute qty-buttons ">
                                                            <div
                                                                class="justify-content-center d-flex flex-column align-items-center border-secondary qty-inc ">
                                                                <i class="bi bi-caret-up-fill text-primary fs-6 "
                                                                    onclick='qty_inc(<?php echo $product_data["qty"]; ?>);'></i>
                                                            </div>
                                                            <div
                                                                class="justify-content-center d-flex flex-column align-items-center  border-secondary qty-dec">
                                                                <i class="bi bi-caret-down-fill text-primary fs-6"
                                                                    onclick="qty_dec();"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="btn btn-danger mb-2 mt-3 d-block"
                                                onclick="deleteFromCart(<?php echo $cart_data['product_id']; ?>);">Remove</a>
                                            <!-- <a class="btn btn-outline-primary mb-2 d-block"
                                                href="<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>">Buy Now</a> -->
                                            <a class="btn btn-primary mb-2 d-block"
                                                onclick='payNow(<?php echo $product_data["id"]; ?>);'>Buy Now</a>
                                        </div>

                                    </div>
                                </div>

                                <!-- new -->





                            <?php } ?>

                        </div>
                    </div>
                    <div class="col-lg-4 col-12  ">
                        <div class="10 border border-4 border-dark-50 rounded-4 mb-3 singleProductBackground gap-2 ">
                            <h4 class=" text-center fw-bold mt-2">Cart Summary</h4>
                            <hr class="border border-4 border-success mb-5">

                            <h5 class="fw-bold mb-3 text-center ">All save Price : <?php echo $allDifferance ?></h5>
                            <h5 class="fw-bold mb-3  text-center ">All Delivery Fee : <?php echo $allDeliveryFee ?></h5>
                            <h5 class="fw-bold  mb-3 text-center ">All Cart Product Price : <?php echo $allProductFee ?>
                            </h5>
                            <div class="col-12 text-center mb-4">
                                <a href="product2.php" class="btn btn-primary text-center mb-3 mt-4"> Add more Products
                                    <i class="bi bi-cart-plus-fill"></i></a>
                                <button onclick="buyCart('<?php echo $allProductFee + $allDeliveryFee ?>');"
                                    class="btn btn-primary text-center mb-3 mt-4"> Checkout
                                    <i class="bi bi-cart-plus-fill"></i></button>
                            </div>



                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php

    } else {
        ?>
        <div class="col-12  mb-3 mt-lg-5">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 mt-2 mb-5 d-none d-lg-block">
                    <div class="row mt-lg-5 mt-1">
                        <img src="resource/cart1 (1).png" style="height:500px ;width: 500px;" class="mt-1 my-5 mt-lg-5">
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-10 offset-1 mb-5 mb-lg-0">
                    <div class="row">
                        <button class="btn btn-danger " style="height: 50px;margin-top:200px" onclick="loginOrSignUp();">
                            Please SignIn
                            or Login First</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
        <div class="modal" tabindex="-1" id="alertBox">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-black">Alert Box</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-5">
                        <div class="col-10 offset-1 rounded-3 alertBoxBackground p-4">
                            <div class="row d-flex justify-content-center align-items-center">
                                <h4 class=" text-black text-center" id="alertContend"></h4>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- modal -->
        <?php


    }
    ?>
    <?php
    include "footer.php";
    ?>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>


</body>

</html>