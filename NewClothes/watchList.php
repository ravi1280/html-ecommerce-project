<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Watchlist ||</title>

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

        ?>
        <div class=" min-vh-100">
            <div class="col-11 col-lg-2 mx-3 mt-3">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="homePage.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">watchlist </li>
                    </ol>
                </nav>
            </div>
            <div class="col-12  mb-3">
                <div class="row">

                    <div class="col-12 text-center mt-1 mb-4">
                        <label class=" form-label  fs-1 fw-bolder ">watchlist</label>
                    </div>

                    <?php
                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `users_email`='" . $email . "' ");
                    $watchlist_num = $watchlist_rs->num_rows;
                    if ($watchlist_num == 0) {

                        ?>
                        <div class="col-6 offset-1 mt-2 mb-5">
                            <div class="row">
                                <img src="resource/emptyWatchlist.png" style="height:500px ;width: 500px;">
                            </div>
                        </div>
                        <div class="col-2 offset-1">
                            <div class="row">
                                <button class="btn btn-danger " style="height: 50px;margin-top:200px" onclick="searchCart();">
                                    Add to Watchlist Item</button>
                            </div>
                        </div>

                        <?php
                    } else {
                        ?>

                        <?php
                        for ($x = 0; $x < $watchlist_num; $x++) {
                            $watchlist_data = $watchlist_rs->fetch_assoc();

                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $watchlist_data["product_id"] . "'");
                            $product_data = $product_rs->fetch_assoc();

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $watchlist_data["product_id"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            <!-- new Design -->
                            <div class="row justify-content-around align-items-center p-2">

                                <div class="col-10 col-lg-6   border bg-white border-4 border-dark-50 rounded-5 mb-3   ">
                                    <div class="row dd">
                                        <div class="col-4">
                                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid rounded-5  "
                                                style="max-width: 200px;">
                                        </div>
                                        <div class="col-5 mt-3">
                                            <h4 class=" fw-bold"> <?php echo $product_data["title"] ?></h4>
                                            <hr>
                                            <h5>price: Rs.<?php echo $product_data["price"] ?>.00 </h5>
                                            <?php
                                            $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='" . $product_data["colour_id"] . "'");
                                            $colour_data = $colour_rs->fetch_assoc();
                                            ?>
                                            <h5>Colour: <?php echo $colour_data["colour"] ?></h5>
                                            <?php
                                            $size_rs = Database::search("SELECT * FROM `size` WHERE `id`='" . $product_data["size_id"] . "'");
                                            $size_data = $size_rs->fetch_assoc();
                                            ?>
                                            <h5>Size: <?php echo $size_data["name"] ?> </h5>
                                            <h5>Warrenty: <?php echo $product_data["warrenty"] ?> </h5>
                                            <h5>Delovery Cost: Rs.<?php echo $product_data["price"] ?>.00 </h5>
                                            <hr>

                                        </div>

                                        <div class="col-3 mb-3 d-flex align-items-lg-end">
                                            <div class="card-body d-grid">
                                                <a class="btn btn-outline-primary mb-2"
                                                    href="<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>">Buy
                                                    Now</a>
                                                <a class="btn btn-outline-danger mb-2"
                                                    onclick='removeFromWatchlist(<?php echo $watchlist_data["id"]; ?>);'>Remove</a>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <!-- new Design -->
                        <?php }
                        ?>

                    </div>

                </div>
            </div>
            

        <?php }


    } else {
        ?>
        <div class="col-12  mb-3">
            <div class="row">

                <div class="col-12 text-center mt-1 mb-4">
                    <label class=" form-label  fs-1 fw-bolder ">watchlist</label>
                </div>
                <div class="col-6 offset-1 mt-2 mb-5">
                    <div class="row">
                        <img src="resource/emptyWatchlist.png" style="height:500px ;width: 500px;">
                    </div>
                </div>
                <div class="col-2 offset-1">
                    <div class="row">
                        <button class="btn btn-danger " style="height: 50px;margin-top:200px" onclick="loginOrSignUp();">
                            Please Login First</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

        <?php
        include "footer.php";
        ?>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>

</body>

</html>