<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel ||</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<?php
session_start();
if (isset($_SESSION["admin"])) {
    require "connection.php";
    $email = $_SESSION["admin"]["email"];
    ?>


    <body class=" container-fluid b">

        <div class="col-12">
            <div class="row">
                <div class="col-12  d-flex justify-content-end align-items-center ">
                    <div class="row ">
                        <button class=" btn mt-1 text-end" style="height: 45px;" type="button" data-bs-toggle="offcanvas"
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
                <div class="col-12 col-lg-10 offset-lg-1 ">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="row mt-4 mb-5">
                                <h1 class="text-center ">Admin Panel</h1>

                            </div>
                        </div>
                        <div class="col-12 col-lg-6 offset-lg-3 mb-5 ">

                            <div>
                                <canvas id="myChart"></canvas>
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-lg-4 px-1 mt-3 ">
                                    <div class="row g-1">
                                        <div class="col-12 adminCartBg1 text-black text-center rounded c"
                                            style="height: 120px;">
                                            <br />
                                            <span class="fs-4 fw-bold">All Active Products</span>
                                            <br />
                                            <?php $product_rs = Database::search("SELECT * FROM `product` WHERE `status_id`='1' ");
                                            $product_num = $product_rs->num_rows; ?>
                                            <span class="fs-5"><?php echo $product_num ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1 mt-3 mb-3 ">
                                    <div class="row g-1">
                                        <div class="col-12 adminCartBg2 text-black text-center rounded c"
                                            style="height: 120px;">
                                            <br />
                                            <span class="fs-4 fw-bold">All Deactive Products</span>
                                            <br />
                                            <?php $DeactiveProduct_rs = Database::search("SELECT * FROM `product` WHERE `status_id`='2' ");
                                            $DeactiveProduct_num = $DeactiveProduct_rs->num_rows; ?>
                                            <span class="fs-5"><?php echo $DeactiveProduct_num ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1 mt-3 ">
                                    <div class="row g-1">
                                        <div class="col-12 adminCartBg3 text-black text-center rounded c"
                                            style="height: 120px;">
                                            <br />
                                            <span class="fs-4 fw-bold">All Users</span>
                                            <br />
                                            <?php $users_rs = Database::search("SELECT * FROM `users` ");
                                            $users_num = $users_rs->num_rows; ?>
                                            <span class="fs-5"><?php echo $users_num ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1 mt-3 ">
                                    <div class="row g-1">
                                        <div class="col-12 adminCartBg4 text-black text-center rounded c"
                                            style="height: 120px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Active Account</span>
                                            <br />
                                            <?php $ActiveUsers_rs = Database::search("SELECT * FROM `users`WHERE `status_id`='1' ");
                                            $ActiveUsers_num = $ActiveUsers_rs->num_rows; ?>
                                            <span class="fs-5"><?php echo $ActiveUsers_num ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1 mt-3  mb-3 ">
                                    <div class="row g-1">
                                        <div class="col-12 adminCartBg5 text-black text-center rounded c"
                                            style="height: 120px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Pending Account</span>
                                            <br />
                                            <?php $DectiveUsers_rs = Database::search("SELECT * FROM `users`WHERE `status_id`='2' ");
                                            $DectiveUsers_num = $DectiveUsers_rs->num_rows; ?>
                                            <span class="fs-5"><?php echo $DectiveUsers_num ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-lg-4 px-1 mt-3  mb-3 ">
                                    <div class="row g-1">
                                        <div class="col-12 adminCartBg6 text-black text-center rounded c"
                                            style="height: 120px;">
                                            <br />
                                            <span class="fs-4 fw-bold">Total Selling Items</span>
                                            <br />
                                            <?php
                                            $d = new DateTime();
                                            $tz = new DateTimeZone("Asia/Colombo");
                                            $d->setTimezone($tz);
                                            $date = $d->format("y-m-d");

                                            $TodaySell_rs = Database::search("SELECT COUNT(*) AS count FROM `invoice` ");
                                            $TodaySell_data = $TodaySell_rs->fetch_assoc(); ?>
                                            <span class="fs-5"><?php echo $TodaySell_data["count"] ?></span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <script>
            
            
            
        </script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
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