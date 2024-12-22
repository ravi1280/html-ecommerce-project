<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home Page ||</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="icon" href="resource/icon.png" />
    <!-- Icon Font Stylesheet -->
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="bootstrap.css" rel="stylesheet">
    <link href="css/homeStyle.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <?php
      require "alertBoxContend.php";
    require "connection.php";
    include "header1.php";


    ?>


    <!-- Hero Start -->
    <div class="container-fluid  mb-5 hero-header">
        <div class="container  ">
            <div class="row g-5 justify-content-center align-items-center">
                <div class="col-md-12 col-lg-12">
                    <h4 class="mb-5 mt-3 text-secondary">"Dress Sharp, Feel Sharp"</h4>
                    <h1 class="  display-2 text-white text-center Hometitle mt-5" >Come in and TRY
                        <br /> something new TODAY
                    </h1>

                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <section class=" " id="explore">
        <div>
            <h3 class=" fw-bold text-primary text-center mb-5">- Choose Your Category -</h3>
        </div>
        <div class="col-10 offset-1">
            <div class=" mt-5  ">
                <b>
                    <hr class=" fs-3" />
                </b>

            </div>
        </div>
        <div class="col-8 offset-2  col-lg-8 offset-lg-2   ">

            <div class="row d-flex align-items-center   justify-content-around">


                <div class="col-lg-1 col-12  mt-4    c1 icoBorder " style="width: 120px;" onclick="tshirt()"
                    title="T Shirt">
                    <img src="resource/tShirt.svg" style="width: 50px; height :50px; margin-left:25px;">

                </div>
                <div class="col-lg-1 col-12 mt-4  icoBorder   c2" style="width: 120px;" onclick="sportKit()"
                    title="Sport KIt">
                    <img src="resource/sportKit.svg" style="width: 50px; height :50px; margin-left:25px;">

                </div>

                <div class="col-lg-1 col-12 mt-4  icoBorder c3" style="width: 120px;" onclick="shoes()" title="Shoes">
                    <img src="resource/shoes.svg" style="width: 50px; height :50px; margin-left:25px;">

                </div>
                <div class="col-lg-1 col-12 mt-4   icoBorder c4" style="width: 120px;" onclick="cap()" title="Cap">
                    <img src="resource/cap.svg" style="width: 50px; height :50px; margin-left:25px;">

                </div>
                <div class="col-lg-1 col-12 mt-4  icoBorder c5" style="width: 120px;" onclick="pants()" title="Pants">
                    <img src="resource/pants.svg" style="width: 50px; height :50px; margin-left:25px;">

                </div>
                <div class="col-lg-1 col-12 mt-4  icoBorder c6" style="width: 120px;" onclick="shirt()" title="Shirt">
                    <img src="resource/shirt.svg" style="width: 50px; height :50px; margin-left:25px;">

                </div>

            </div>
        </div>
        <div class="col-10 offset-1">
            <div class=" mt-5 mb-5 ">
                <b>
                    <hr class=" fs-3" />
                </b>

            </div>
        </div>
    </section>


    <!-- Vesitable Shop Start-->
    <div class="container-fluid vesitable py-5">
        <div class="container py-5">
            <h1 class="mb-0 text-primary text-center fw-bold mb-5">- Latest Update -</h1>
            <div class="owl-carousel vegetable-carousel justify-content-center">
                <?php

                $product_rs = Database::search("SELECT * FROM `product` WHERE  `status_id`='1' ORDER BY `datetime_added` DESC LIMIT 10 OFFSET 0");
                $product_num = $product_rs->num_rows;

                for ($z = 0; $z < $product_num; $z++) {
                    $product_data = $product_rs->fetch_assoc(); ?>
                    <div class="border border-3 rounded position-relative ">
                        <div class="">
                            <?php

                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $product_data["id"] . "'");
                            $image_data = $image_rs->fetch_assoc();

                            ?>
                            <img src="<?php echo $image_data["code"]; ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>

                        <?php
                        if (isset($_SESSION["u"])) {
                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $product_data["id"] . "' AND 
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
                                    style="top: 10px; right: 10px;" onclick='addToWatchlist(<?php echo $product_data["id"]; ?>);'><i
                                        class="fa fa-heart" aria-hidden="true"></i>
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
                                        <a href="<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>"
                                            class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                        <?php
                                    } else {
                                        ?>
                                        <a class="btn border  border-2   px-3 text-primary" onclick="al();"> Buy Now</a>

                                        <?php
                                    }

                                } else {
                                    ?>
                                    <a href="<?php echo "singleProductView.php?id=" . $product_data["id"]; ?>"
                                        class="btn border  border-2   px-3 text-primary"> Buy Now</a>

                                    <?php
                                }

                                if (isset($_SESSION["u"])) {

                                    if ($product_data["qty"] > 0) {
                                        ?>
                                        <a class="btn border border-2 text-center text-primary"><i
                                                class="fa fa-shopping-bag me-2 text-primary "
                                                onclick='addToCart(<?php echo $product_data["id"]; ?>);'></i> </a>
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
    <!-- Vesitable Shop End -->

    <!-- curosal -->
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
    <!-- curosal -->



    <section class=" mb-4">
        <div class="col-12">
            <div class="">

                <h1 class="text-center  mb-3 fw-bold text-primary">- partners -</h1>
                <div class="col-10 offset-1">
                    <div class=" mt-5 mb-5 ">
                        <b>
                            <hr class=" fs-3" />
                        </b>

                    </div>
                </div>

                <div class="col-12 mt-3 mb-5  d-lg-block d-none">
                    <div class="d-flex align-items-center">

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
    <section id="contactSec">
        <div class="box mt-1 p-3">
            <div class="mb-5 ">

                <h1 class=" fs-1 fw-bold text-primary text-center  fw-bold">- Service & About Us -</h1>

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

        <div class="col-12 mt-5 mb-5 ">
            <p class="text-center align-text-bottom">&copy;2024 <b>NewClothes.lk</b> || All Right Reserved</p>
        </div>
    </section>

    <div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <?php if (isset($_SESSION["u"])) {
                ?>
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
                                <div class="col-8 bg-primary " style="float: left; border-radius:10px; margin-bottom:10px;">
                                    <div class="row">
                                        <h5 class=" text-white mx-3 mt-2 mb-2 ">
                                            <?php echo $message_data["message"]; ?>
                                        </h5>
                                    </div>

                                </div>
                                <?php

                            } else {
                                ?>
                                <div class="col-8 backTopBtn text-white "
                                    style="float: right; border-radius:10px; margin-bottom:10px;">
                                    <div class="row">
                                        <h5 class="text-white mx-3 mt-2 mb-2 ">
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
                                <div class="col-9">
                                    <input type="text" id="msg" class=" form-control">
                                </div>
                                <div class="col-3">
                                    <button type="button" class="btn btn-primary " onclick="chat('<?php echo $email ?>');">
                                        &nbsp; send
                                        <i class="fa fa-paper-plane-o"></i></button>
                                </div>


                                <!-- <div class="col-2">
                                    <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                                </div> -->

                            </div>
                        </div>

                    </div>

                </div>
                <?php
            } else {
                ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Message Box</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <H3 class=" text-warning">Please Sign Up To access for Chat Box</H3>


                    </div>
                    <div class="modal-footer">

                        <div class="col-3">
                            <a type="button" class="btn btn-primary" href="index.php">
                                <i class="bi bi-send-fill"> &nbsp; Sign Up Here</i></a>
                        </div>


                        <div class="col-2">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>

                </div>
                <?php

            }
            ?>
        </div>
    </div>

    <!-- Back to Top -->
    <a href="" class="btn backTopBtn border-3 border-primary rounded-circle back-to-top"><i
            class="fa fa-arrow-up"></i></a>

    <a class="btn backTopBtn border-3 border-primary rounded-circle message" data-bs-toggle="modal"
        data-bs-target="#exampleModal" id="chat"><i class="fa fa-comments"></i></a>
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
            delay: 600,
            origin: 'left'
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
        ScrollReveal().reveal('.Hometitle', {
            delay: 500,
            origin: 'top'
        });
    </script>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/homemain.js"></script>
    <script src="script.js"></script>
</body>

</html>