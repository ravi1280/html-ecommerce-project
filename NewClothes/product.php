<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product || </title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link href="css/homeStyle.css" rel="stylesheet">
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body class=" container-fluid y">



    <?php include "header1.php"; ?>

    <div class="col-12">
        <div class="row">
            <h1 class="text-center text-black mt-5 mb-5 fw-bold ">All Product </h1>
        </div>
    </div>



    <div class="col-12 mt-5 mb-3" id="shirt">

        <h1 class=" text-center fw-bold">- SHIRT -</h1>
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="container-fluid service py-5 ">
                <div class="container py-5">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-4 swiper-slide">
                            <a href="#">
                                <div class="service-item bg-secondary rounded border border-secondary">
                                    <img src="resource/Clothes/8.jpg" class="img-fluid rounded-top w-100" alt="">
                                    <div class="px-4 rounded-bottom">
                                        <div class="service-content bg-primary text-center p-4 rounded">
                                            <h5 class="text-white">Fresh Apples</h5>
                                            <h3 class="mb-0">20% OFF</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 swiper-slide">
                            <a href="#">
                                <div class="service-item bg-dark rounded border border-dark">
                                    <img src="resource/Clothes/8.jpg" class="img-fluid rounded-top w-100" alt="">
                                    <div class="px-4 rounded-bottom">
                                        <div class="service-content bg-light text-center p-4 rounded">
                                            <h5 class="text-primary">Tasty Fruits</h5>
                                            <h3 class="mb-0">Free delivery</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 swiper-slide">
                            <a href="#">
                                <div class="service-item bg-primary rounded border border-primary">
                                    <img src="resource/Clothes/8.jpg" class="img-fluid rounded-top w-100" alt="">
                                    <div class="px-4 rounded-bottom">
                                        <div class="service-content bg-secondary text-center p-4 rounded">
                                            <h5 class="text-white">Exotic Vegitable</h5>
                                            <h3 class="mb-0">Discount 30$</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    
           
                        <div class="col-md-6 col-lg-4 swiper-slide">
                            <a href="#">
                                <div class="service-item bg-secondary rounded border border-secondary">
                                    <img src="resource/Clothes/8.jpg" class="img-fluid rounded-top w-100" alt="">
                                    <div class="px-4 rounded-bottom">
                                        <div class="service-content bg-primary text-center p-4 rounded">
                                            <h5 class="text-white">Fresh Apples</h5>
                                            <h3 class="mb-0">20% OFF</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 swiper-slide">
                            <a href="#">
                                <div class="service-item bg-dark rounded border border-dark">
                                    <img src="resource/Clothes/8.jpg" class="img-fluid rounded-top w-100" alt="">
                                    <div class="px-4 rounded-bottom">
                                        <div class="service-content bg-light text-center p-4 rounded">
                                            <h5 class="text-primary">Tasty Fruits</h5>
                                            <h3 class="mb-0">Free delivery</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 swiper-slide">
                            <a href="#">
                                <div class="service-item bg-primary rounded border border-primary">
                                    <img src="resource/Clothes/8.jpg" class="img-fluid rounded-top w-100" alt="">
                                    <div class="px-4 rounded-bottom">
                                        <div class="service-content bg-secondary text-center p-4 rounded">
                                            <h5 class="text-white">Exotic Vegitable</h5>
                                            <h3 class="mb-0">Discount 30$</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="swiper-pagination "></div>
        </div>

    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,

                },

                1024: {
                    slidesPerView: 4,

                },
            },
        });
    </script>







    <div class="col-12 mt-5 mb-3" id="tshirt">

        <h1 class=" text-center fw-bold"> T- SHIRT </h1>
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="swiper-pagination "></div>
        </div>

    </div>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,

                },

                1024: {
                    slidesPerView: 4,

                },
            },
        });
    </script>

    <div class="col-12 mt-5 mb-5" id="shose">
        <!-- <a href="#" class="text-decoration-none  link-dark fs-3 fw-bold"> &nbsp;&nbsp;Drons</a> &nbsp;&nbsp;
                <a href="#" class="text-decoration-none link-dark fs-6">See All &nbsp; &rarr;</a> -->

        <h1 class=" text-center fw-bold"> Shoes </h1>
    </div>

    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="col-12 col-lg-3 mx-5 mx-lg-0">
                    <div class="row">

                        <div class="container ">
                            <div class="card">
                                <div class="imgBox">
                                    <img src="resource/Clothes/2.jpg">
                                </div>
                                <div class="contentBox ">
                                    <h2>Shirt</h2>
                                    <a href="">Add to Cart</a><br>
                                    <a href="">Buy now</a><br>
                                    <a href="">Watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="swiper-pagination "></div>
        </div>

    </div>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,

                },

                1024: {
                    slidesPerView: 4,

                },
            },
        });
    </script>



    <?php
    include "footer.php";
    ?>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
    JavaScript Libraries
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="lib/easing/easing.min.js"></script> -->
    <!-- <script src="lib/waypoints/waypoints.min.js"></script> -->
    <!-- <script src="lib/lightbox/js/lightbox.min.js"></script> -->
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <!-- <script src="js/homemain.js"></script> -->
    <!-- <script src="script.js"></script> -->

    </div>
</body>

</html>