<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Search ||</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

</head>

<body class="b y">
    <?php   require "alertBoxContend.php"; 
    require "connection.php";
    include "header1.php";
    session_start();


    ?>
    <div class=" min-vh-100">
        <div class="col-12 mt-5">
            <div class="row">

                <div class="col-12 text-center mt-5 mb-4">

                </div>
            </div>
        </div>

        <div class="col-11 col-lg-2 mx-3 mt-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="homePage.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Search </li>
                </ol>
            </nav>
        </div>


        <!-- new design -->
        <div class="col-10 offset-1 bg-white rounded-4 mb-4">
            <div class="row p-4">
                <div class="col-lg-6 col-12 mb-2 mb-lg-0">
                    <input type="text" class=" form-control" placeholder="What are you loking for .. " id="searchtext">
                </div>
                <div class="col-12 col-lg-4 mb-2">
                    <select class="form-select" id="searchcategory">
                        <option value="0">Select Catagory ..</option>
                        <?php
                        $category_rs = Database::search("SELECT * FROM `category`");
                        $category_num = $category_rs->num_rows;
                        for ($x = 0; $x < $category_num; $x++) {
                            $category_data = $category_rs->fetch_assoc();
                            ?>
                            <option value="<?php echo $category_data["id"] ?>"><?php echo $category_data["name"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-lg-2  mb-2 mb-lg-0 " onclick="search(0);">
                    <a class=" btn btn-dark text-center d-block ">search</a>
                </div>
                <div class="col-12 col-lg-6 mb-2 mb-lg-0 ">
                    <input type="text" class="form-control" placeholder="Price From .. " id="pf">
                </div>

                <div class="col-12 col-lg-4 mb-2 mb-lg-0 ">
                    <input type="text" class="form-control" placeholder="Price to .. " id="pt">
                </div>
                <div class="col-12 col-lg-2  " onclick="search();">
                    <a class=" btn btn-danger text-white text-center d-block " onclick="clearSort();">clear</a>
                </div>
                <div class="col-12 col-lg-3 mt-3">
                    <select class="form-select" id="searchcolour">
                        <option value="0">Select Colour ..</option>
                        <?php
                        $colour_rs = Database::search("SELECT * FROM `colour`");
                        $colour_num = $colour_rs->num_rows;
                        for ($x = 0; $x < $colour_num; $x++) {
                            $colour_data = $colour_rs->fetch_assoc();
                            ?>
                            <option value="<?php echo $colour_data["id"] ?>"><?php echo $colour_data["colour"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-lg-3  mt-3">
                    <select class="form-select" id="searchsize">
                        <option value="0">Select Size ..</option>
                        <?php
                        $size_rs = Database::search("SELECT * FROM `size`");
                        $size_num = $size_rs->num_rows;
                        for ($x = 0; $x < $size_num; $x++) {
                            $size_data = $size_rs->fetch_assoc();
                            ?>
                            <option value="<?php echo $size_data["id"] ?>"><?php echo $size_data["name"] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-12 col-lg-4  mt-3">
                    <select class="form-select " id="searchsort">
                        <option value="0">Sort By</option>
                        <option value="1">• Price High to Low</option>
                        <option value="2">• Price Low to High</option>
                        <option value="3">• Quntity High To Low</option>
                        <option value="4">• Quntity Low To High</option>


                    </select>
                </div>
            </div>
        </div>
        <!-- new design -->




        <div class="col-10 offset-1  mb-5">
            <div class="row d-flex justify-content-around align-items-center" id="view_area">

                <div class=" col-6 mt-5 text-end d-none d-lg-block">
                    <!-- <span class="fw-bold text-black-50"><i class="bi bi-search" style="font-size: 100px;"></i></span> -->
                    <img src="resource/emptySearch.png" style="width: 600px;" alt="">
                </div>

                <div class=" col-6 mt-5  text-start">
                    <span class="h1 text-black-50 fw-bold">No Items Searched Yet ...</span>
                </div>

            </div>
        </div>


        <?php include "footer.php";

        ?>
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
</body>

</html>