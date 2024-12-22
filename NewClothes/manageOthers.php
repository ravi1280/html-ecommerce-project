<?php
require "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Others ||</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://unpkg.com/scrollreveal"></script>


</head>
<?php
session_start();
if (isset($_SESSION["admin"])) {

    $email = $_SESSION["admin"]["email"];
    ?>

    <body class="b y">
        <?php 
    require "alertBoxContend.php";

        ?>
    <div class="col-12  d-flex justify-content-end align-items-center ">
                    <div class="row ">
                        <button class="bt btn mt-1 text-end" style="height: 45px;" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            <img src="resource/icon.png" style="height: 30px;" class=" mb-4"><i
                                class="bi bi-three-dots-vertical fs-4 "></i>
                        </button>
                    </div>

                    <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">

                            <div class=" ">
                                <img src="resource/icon.png" style="height: 50px;">
                                <span class="t1 fw-bold fs-5  ">New Clothes</span>
                            </div>

                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">
                            <div>
                                <div class="row g-1 text-start">
                                    <div>
                                        <nav class="nav flex-column mt-5">
                                            <a class="nav-link text-black" href="admin.php"> <i
                                                    class="bi bi-check-circle-fill"></i>&nbsp; Admin Dashboard</a>
                                            <a class="nav-link text-black" href="manageUsers.php"><i
                                                    class="bi bi-check-circle-fill"></i>&nbsp; Manage Users</a>
                                            <a class="nav-link text-black" href="manageProduct.php"><i
                                                    class="bi bi-check-circle-fill"></i>&nbsp; Manage Products</a>
                                            <a class="nav-link text-black" href="manageOthers.php"><i
                                                    class="bi bi-check-circle-fill"></i>&nbsp; Manage Others</a>
                                            <a class="nav-link text-black" href="addProduct.php"><i
                                                    class="bi bi-check-circle-fill"></i>&nbsp; Add Products</a>
                                            <a class="nav-link text-black" href="orders.php"><i
                                                    class="bi bi-check-circle-fill"></i>&nbsp; Orders</a>
                                            <a class="nav-link text-black" href="reportGenarate.php"><i
                                                    class="bi bi-check-circle-fill"></i>&nbsp; Generate Report</a>
                                            <a class="nav-link text-black" href="homePage2.php"><i
                                                    class="bi bi-check-circle-fill"></i>&nbsp; Back to Home Page</a>

                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


        <div class="col-11 col-lg-3 mx-3 mt-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="homePage2.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="admin.php">Admin panel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Others </li>
                </ol>
            </nav>
        </div>
        <div class="col-12  mb-3">
            <div class="row">

                <div class="col-12 text-center mt-1 mb-3">
                    <label class=" form-label  fs-1 fw-bolder ">Manage Others </label>
                </div>
            </div>
        </div>

       
        <!-- new  -->

        <div class="col-10 offset-1 mb-3">
            <div class="row d-flex  justify-content-around align-items-center">
                <div class="card border-success mb-3" style="max-width: 25rem;">
                    <div class="card-header bg-transparent border-success text-primary fs-5">Manag Category</div>
                    <div class="card-body text-success">
                        <?php

                        $categorey_rs = Database::search("SELECT * FROM `category`  ");
                        $categorey_num = $categorey_rs->num_rows;

                        for ($x = 0; $x < $categorey_num; $x++) {

                            $categorey_data = $categorey_rs->fetch_assoc();

                            ?>
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="card-text text-center"><?php echo $categorey_data["name"] ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="card-footer bg-transparent border-success text-primary">
                        <input type="text" class=" form-control" id="newCategory" placeholder="Enter New category ...">
                        <a class="btn btn-info d-block mt-2" onclick=" newCategoery();">Add</a>
                    </div>
                </div>

                <div class="card border-success mb-3" style="max-width: 25rem;">
                    <div class="card-header bg-transparent border-success text-primary fs-5">Manage Size</div>
                    <div class="card-body text-success">
                        <?php

                        $size_rs = Database::search("SELECT * FROM `size`  ");
                        $size_num = $size_rs->num_rows;

                        for ($x = 0; $x < $size_num; $x++) {

                            $size_data = $size_rs->fetch_assoc();

                            ?>
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="card-text text-center"><?php echo $size_data["name"] ?></p>
                                    </div>
                                 


                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-footer bg-transparent border-success text-primary">
                        <input type="text" class=" form-control" id="newsize" placeholder="Enter New size ...">
                        <a class="btn btn-info d-block mt-2" onclick=" newsize();">Add</a>
                    </div>
                </div>
                <div class="card border-success mb-3" style="max-width: 25rem;">
                    <div class="card-header bg-transparent border-success text-primary fs-5">Manag Colour</div>
                    <div class="card-body text-success">
                        <?php

                        $colour_rs = Database::search("SELECT * FROM `colour`  ");
                        $colour_num = $colour_rs->num_rows;

                        for ($x = 0; $x < $colour_num; $x++) {

                            $colour_data = $colour_rs->fetch_assoc();

                            ?>
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="card-text text-center"><?php echo $colour_data["colour"] ?></p>
                                    </div>
                                    <!-- <?php
                                    if ($colour_data["status_id"] == 1) {
                                      
                                        ?>
                                        <div class="col-8">
                                            <a href="" class="btn btn-danger d-block"
                                                onclick='colourstatus(<?php echo $colour_data["id"] ?>);'>Deactive</a>
                                        </div>
                                        <?php

                                    } else {
                                       
                                        ?>
                                        <div class="col-8">
                                            <a href="" class="btn btn-warning d-block"
                                                onclick='colourstatus(<?php echo $colour_data["id"] ?>);'>Active</a>
                                        </div>
                                        <?php
                                    }
                                    ?> -->


                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="card-footer bg-transparent border-success text-primary">
                        <input type="text" class=" form-control" id="newColour" placeholder="Enter New Colour ...">
                        <buttton class="btn btn-info d-block mt-2" onclick=" newColour();">Add</>
                    </div>
                </div>



            </div>
        </div>
        <!-- new  -->


        <?php include "footer.php" ?>
        <script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>
    <?php
} else {
    ?>
    <script>
        window.location = "adminSignin.php";
    </script>
    <?php

}
?>

</html>