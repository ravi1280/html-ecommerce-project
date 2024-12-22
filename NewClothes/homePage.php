<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> HomePage || </title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body class="">
    <div class="container-fluid ">
        <?php
        include "header1.php";
        ?>
        <section>
            <div class="mm">
                <div class="row ">
                    <h1 class=" top text-lg  text-center text-white mt-6" style="position: absolute;">Come in and TRY
                        <br /> something new TODAY
                    </h1>
                </div>
                <button class="ex Ex " onclick="location.href='#explore'"> Explore</button>

            </div>
        </section>


        <section class=" nee  " id="explore">
            <div class="col-12 categoryBox  ">
                <div class="row d-flex align-items-center cbox">

                    <div class="col-lg-1 col-12  mt-2  div1 c1" style="width: 120px;" onclick="tshirt()">
                        <img src="resource/tShirt.svg" style="width: 50px; height :50px; margin-left:25px;">

                    </div>
                    <div class="col-lg-1 col-12 mt-2  div1 c2" style="width: 120px;" onclick="sportKit()">
                        <img src="resource/sportKit.svg" style="width: 50px; height :50px; margin-left:25px;">

                    </div>

                    <div class="col-lg-1 col-12 mt-2 div1 c3" style="width: 120px;" onclick="shoes()">
                        <img src="resource/shoes.svg" style="width: 50px; height :50px; margin-left:25px;">

                    </div>
                    <div class="col-lg-1 col-12 mt-2  div1 c4" style="width: 120px;" onclick="cap()">
                        <img src="resource/cap.svg" style="width: 50px; height :50px; margin-left:25px;">

                    </div>
                    <div class="col-lg-1 col-12 mt-2 div1 c5" style="width: 120px;" onclick="pants()">
                        <img src="resource/pants.svg" style="width: 50px; height :50px; margin-left:25px;">

                    </div>
                    <div class="col-lg-1 col-12 mt-2 div1 c6" style="width: 120px;" onclick="shirt()">
                        <img src="resource/shirt.svg" style="width: 50px; height :50px; margin-left:25px;">

                    </div>

                    <h1 class="text-white mt-5">All Categoery</h1>

                </div>
            </div>
        </section>
        <section class=" sear   ">
            <div class="col-12  " style="padding: 200px;">
                <div class="row ">

                    <p class="text-white mt-5 stext">.Exploer Your best</p>

                </div>
            </div>
        </section>


        <section class=" sear  d-none ">
            <div class="col-12 searchBox ">
                <div class="row ">


                    <Input class=" searchIn form-control" placeholder="Find Your Product....."></Input>
                    <!-- <a href="product.php" class="btn btn-primary"><i class="bi bi-search"></i></a> -->
                    <p class="text-white mt-5 stext">Search</p>

                </div>
            </div>
        </section>

        <section class="" id="tranding">

            <div class="ccontainer mb-5">
                <h1 class="text-center section-subheading fw-bold text-primary">- Latest Product -</h1>

            </div>
            <div class="col-12">
                <div class="row">
                    <div class="ccontainer c6">
                        <div class="swiper tranding-slider">
                            <div class="swiper-wrapper">
                                <!-- Slide-start -->

                                <?php
                                require "connection.php";
                                $product_rs = Database::search("SELECT * FROM `product` WHERE  `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 6 OFFSET 0");
                                $product_num = $product_rs->num_rows;

                                for ($z = 0; $z < $product_num; $z++) {
                                    $product_data = $product_rs->fetch_assoc();

                                    ?>
                                    <div class="swiper-slide tranding-slide ">
                                        <div class="tranding-slide-img ">
                                            <?php

                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                                            $image_data = $image_rs->fetch_assoc();

                                            ?>
                                            <img class="sh" src="<?php echo $image_data["code"]; ?>" alt="Tranding">
                                        </div>
                                        <div class="tranding-slide-content">

                                            <div class="tranding-slide-content-bottom text-center  ">
                                                <?php
                                                if (isset($_SESSION["u"])) {
                                                    if ($product_data["qty"] > 0) {

                                                        ?>
                                                        <div class="col-12  ">
                                                            <div class="row">
                                                                <a class="contend_name text-decoration-none fw-bold  mx-lg-2"
                                                                    href="<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>">
                                                                    Buy Now
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12  ">
                                                            <div class="row">
                                                                <a class="contend_name text-decoration-none fw-bold  mx-lg-2"
                                                                    href="cart.php"
                                                                    onclick='addToCart(<?php echo $product_data["id"]; ?>);'>
                                                                    Add to cart
                                                                </a>
                                                            </div>
                                                        </div>


                                                        <?php

                                                    } else {

                                                        ?>
                                                        <div class="col-12  ">
                                                            <div class="row">
                                                                <a class="contend_name text-decoration-none fw-bold text-black-50 disabled  mx-lg-2"
                                                                    onclick="al();">
                                                                    Buy now
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-12  ">
                                                            <div class="row">
                                                                <a class="contend_name text-decoration-none fw-boldtext-black-50 disabled  mx-lg-2"
                                                                    onclick="al();">
                                                                    Add to cart
                                                                </a>
                                                            </div>
                                                        </div>

                                                        <?php

                                                    }

                                                    $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
                                                   `users_email`='" . $_SESSION["u"]["email"] . "'");
                                                    $watchlist_num = $watchlist_rs->num_rows;

                                                    if ($watchlist_num == 1) {

                                                        ?>
                                                        <div class="col-12 ">
                                                            <div class="row">
                                                                <a
                                                                    class="contend_name  text-decoration-none fw-bold text-black-50 disabled  mx-lg-2">
                                                                    See Watchlist
                                                                </a>
                                                            </div>
                                                        </div>


                                                        <?php
                                                    } else {
                                                        ?>
                                                        <div class="col-12 ">
                                                            <div class="row">
                                                                <a class="contend_name  mx-lg-2  text-decoration-none fw-bold"
                                                                    onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'
                                                                    href="watchList.php">
                                                                    watchlist
                                                                </a>
                                                            </div>
                                                        </div>


                                                        <?php
                                                    }

                                                    ?>


                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="col-12  ">
                                                        <div class="row">
                                                            <a class="contend_name text-decoration-none fw-bold mx-lg-3"
                                                                href="<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>">
                                                                Buy Now
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <?php

                                                }


                                                ?>


                                            </div>


                                        </div>
                                    </div>
                                    <!-- Slide-end -->
                                    <?php
                                }
                                ?>


                            </div>

                            <div class="tranding-slider-control ">
                                <div class="swiper-button-prev slider-arrow">
                                    <ion-icon name="arrow-back-outline"></ion-icon>
                                </div>
                                <div class="swiper-button-next slider-arrow">
                                    <ion-icon name="arrow-forward-outline"></ion-icon>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </section>
        <section class=" mt-5 mb-5">
            <div class="col-12 ">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                            aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                            aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                            aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                            aria-label="Slide 7"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"
                            aria-label="Slide 8"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8"
                            aria-label="Slide 9"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9"
                            aria-label="Slide 10"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10"
                            aria-label="Slide 11"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="11"
                            aria-label="Slide 12"></button>
                        <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 3"></button> -->
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="resource/c1.jpg" class=" rounded-5 d-block w-100 ">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c2.jpg" class=" rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c3.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c4.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c5.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c6.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c7.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c8.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c9.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c10.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c11.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="resource/c12.jpg" class="rounded-5 d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </section>
        <section class="mt-4 mb-4">
            <div class="col-12">
                <div class="row">

                    <h1 class="text-center mt-5 mb-3 fw-bold text-primary">- partners -</h1>
                    <div class="col-10 offset-1">
                        <div class="row mt-5 mb-5 ">
                            <b>
                                <hr class=" fs-3" />
                            </b>

                        </div>
                    </div>

                    <div class="col-12 mt-3 mb-5  d-lg-block d-none">
                        <div class="row">

                            <img src="resource/p image/127.png" class=" c1 rounded-5" style="width: 250px;">
                            <img src="resource/p image/129.png" class=" c2 rounded-5 " style="width: 250px;">
                            <img src="resource/p image/144.png" class="c3 rounded-5" style="width: 250px;">
                            <img src="resource/p image/lacoste_gallery.jpg" class="c4 rounded-5" style="width: 250px;">
                            <img src="resource/p image/95.png" class="c5 rounded-5" style="width: 250px;">
                            <img src="resource/p image/966_hugoboss.jpg" class="c6 rounded-5" style="width: 250px;">

                        </div>
                    </div>

                    <div class="col-12  d-block d-lg-none c2">
                        <div class="row">
                            <div class="col-6 offset-3">
                                <div class="row">
                                    <img src="resource/p image/127.png" class="  rounded-5" style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-6 offset-3">
                                <div class="row">
                                    <img src="resource/p image/129.png" class=" mt-2 rounded-5 " style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-6 offset-3">
                                <div class="row">
                                    <img src="resource/p image/144.png" class=" mt-2 rounded-5" style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-6 offset-3">
                                <div class="row">
                                    <img src="resource/p image/lacoste_gallery.jpg" class=" mt-2 rounded-5"
                                        style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-6 offset-3">
                                <div class="row">
                                    <img src="resource/p image/95.png" class=" mt-2 rounded-5" style="width: 250px;">
                                </div>
                            </div>
                            <div class="col-6 offset-3">
                                <div class="row">
                                    <img src="resource/p image/966_hugoboss.jpg" class=" mt-2 rounded-5"
                                        style="width: 250px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-10 offset-1">
                        <div class="row mt-5 mb-5 ">
                            <hr class=" fw-bold">
                        </div>
                    </div>

                </div>
            </div>
        </section>






        <section class="sec4" id="sec4">
            <div class="box mt-1 ">
                <div class="mt-5 mb-5 ">

                    <h1 class=" fs-1 fw-bold text-primary text-center  fw-bold">Service & About Us</h1>

                </div>
                <div class="bgc mt-5 ser">
                    <div class="col-12 ">
                        <h5 class="text-uppercase text-primary mb-4 ">- Contact Us -</h5>

                        <p><i class="bi bi-house-fill"></i> <b> Bambalapitiya,Colombo 10,SriLanka</b></p>
                        <p><i class="bi bi-envelope-fill"></i> <b> NewClothes@gmail.com</b></p>
                        <p><i class="bi bi-telephone-fill"></i> <b> 0332299999</b></p>
                        <p><i class="bi bi-printer-fill"></i> <b>+94112 445558</b> </p>

                    </div>

                    <div class="col-12 ">
                        <h5 class="text-uppercase text-primary mb-4">- Social Media -</h5>
                        <div class=" ">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="form-floting text-white">
                                        <i class="bi bi-facebook text-black" style="font-size:22px"></i>
                                    </a>

                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="form-floting text-white">
                                        <i class="bi bi-whatsapp text-black" style="font-size:22px"></i>
                                    </a>

                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="form-floting text-white">
                                        <i class="bi bi-youtube text-black" style="font-size:22px"></i>
                                    </a>

                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="form-floting text-white">
                                        <i class="bi bi-linkedin text-black" style="font-size:22px"></i>
                                    </a>

                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="form-floting text-white">
                                        <i class="bi bi-twitter text-black" style="font-size:22px "></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <h5 class="text-uppercase text-primary  mb-4 mt-4">- service -</h5>
                    <p class="text-dark-50 fs-5 fw-bold"> We are always prepared to provid you with amicable support in
                        accordance
                        with the bandwidth <br> you require to operate your divice with 24/7 coverage. Receive immediate
                        support form <br> our live chat
                        our experts. <br> <br>
                        We offer to deliver to meet your requirement straight to where you live within SriLanka borders.
                        <br> We assure you that we are willing to undertake
                        delivery to any part of SriLanka provided that the following <br> conditions are met.. <br> <br>
                        We are providing our service according to the bandwith you need to run your site and potion are
                        available as you wish.We
                        aim to bring about changes that appropriately support our coustomers'value creation..
                    </p>
                </div>

            </div>
            <!-- Button trigger modal -->




            <!-- Modal -->
            <div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Message Box</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            $email = $_SESSION["u"]["email"];

                            $message_rs = Database::search("SELECT * FROM `message` WHERE `from`='" . $email . "' OR`to`='" . $email . "' ");
                            $message_num = $message_rs->num_rows;

                            for ($x = 0; $x < $message_num; $x++) {
                                $message_data = $message_rs->fetch_assoc();
                                if ($message_data["to"] == $email) {
                                    ?>
                                    <div class="col-8 bg-black " style="float: left; border-radius:10px; margin-bottom:10px;">
                                        <div class="row">
                                            <h5 class=" text-white mx-3 mt-2 mb-2 fw-bold">
                                                <?php echo $message_data["message"]; ?>
                                            </h5>
                                        </div>

                                    </div>
                                    <?php

                                } else {
                                    ?>
                                    <div class="col-8 bg-primary text-white "
                                        style="float: right; border-radius:10px; margin-bottom:10px;">
                                        <div class="row">
                                            <h5 class="text-white mx-3 mt-2 mb-2 fw-bold">
                                                <?php echo $message_data["message"]; ?>
                                            </h5>
                                        </div>

                                    </div>
                                    <?php

                                }
                                ?>

                                <?php

                            }

                            ?>


                        </div>
                        <div class="modal-footer">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-7">
                                        <input type="text" id="msg" class=" form-control">
                                    </div>
                                    <div class="col-3">


                                        <button type="button" class="btn btn-primary"
                                            onclick="chat('<?php echo $email ?>');"><i class="bi bi-send-fill"> &nbsp;
                                                send</i></button>

                                    </div>

                                    <div class="col-2">
                                        <button type="button" class="btn btn-secondary "
                                            data-bs-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="d-flex flex-row-reverse  sticky-bottom ">
                <button type="button" class="btn btn-primary fs-4 mt-5  rounded-4   mb-2 " data-bs-toggle="modal"
                    data-bs-target="#exampleModal" id="chat">
                    <i class="bi bi-messenger fs-1"></i></button>
            </div>
            <div class="col-12 mt-5 mb-5 ">
                <p class="text-center align-text-bottom">&copy;2022 <b>NewClothes.lk</b> || All Right Reserved</p>
            </div>

        </section>



    </div>

    <script>
        ScrollReveal({
            reset: true,
            distance: '60px',
            durattion: 2500,
            delay: 600
        });
        ScrollReveal().reveal('.sec', {
            delay: 200,
            origin: 'top'
        });
        ScrollReveal().reveal('.Ex', {
            delay: 800,
            origin: 'bottom'
        });
        ScrollReveal().reveal('.mm', {
            delay: 600,
            origin: 'left'
        });
        ScrollReveal().reveal('.ser', {
            delay: 500,
            origin: 'top'
        });
        ScrollReveal().reveal('.top', {
            delay: 1100,
            origin: 'top'
        });
        ScrollReveal().reveal('.c1', {
            delay: 300,
            origin: 'top'
        });
        ScrollReveal().reveal('.c2', {
            delay: 400,
            origin: 'top'
        });
        ScrollReveal().reveal('.c3', {
            delay: 500,
            origin: 'top'
        });
        ScrollReveal().reveal('.c4', {
            delay: 500,
            origin: 'bottom'
        });
        ScrollReveal().reveal('.c5', {
            delay: 400,
            origin: 'bottom'
        });
        ScrollReveal().reveal('.c6', {
            delay: 300,
            origin: 'bottom'
        });
        ScrollReveal().reveal('.stext', {
            delay: 900,
            origin: 'top'
        });
        ScrollReveal().reveal('.searchIn', {
            delay: 400,
            origin: 'left'
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    <script src="cscript.js"></script>
</body>

</html>