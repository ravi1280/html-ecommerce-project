<?php

require "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Genarate||</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>
<?php
session_start();
if (isset($_SESSION["admin"])) {

    $email = $_SESSION["admin"]["email"];
    ?>

    <body class="b y">

        <div class="container-fluid">
            <div class="row">
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


                <div class="col-12  mb-2">
                    <div class="row">
                        <div class="col-lg-6 mt-4 d-none d-lg-block">
                            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                                aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="homePage2.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="admin.php">Admin Panel</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Report Genarate</li>
                                </ol>
                            </nav>

                        </div>

                        <div class="col-12  mb-3 text-center">
                            <label class="form-label fs-1 fw-bolder  ">Generte Report &nbsp; &nbsp;<i
                                    class="bi bi-card-checklist fw-bold fs-1"></i></label>

                        </div>


                    </div>

                </div>
                <div class="col-12">
                    <div class="row d-flex justify-content-around align-items-center">
                        <div class="card col-lg-2 col-10 col-md-5" >
                            <img src="resource/users.jpg" class="card-img-top" alt="...">
                            <div class="card-body ">
                                <p class="card-text"><button class="btn btn-primary" onclick="userReport();">Users Report </button></p>
                            </div>
                        </div>
                        <div class="card col-lg-2 col-10 col-md-5">
                            <img src="resource/product.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><button class="btn btn-primary"  onclick="productReport();">Product Report </button></p>
                            </div>
                        </div>
                        <div class="card col-lg-2 col-10 col-md-5">
                            <img src="resource/invoice.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><button class="btn btn-primary"  onclick="invoiceReport();">Invoice Report </button></p>
                            </div>
                        </div>
                        <div class="card col-lg-2 col-10 col-md-5">
                            <img src="resource/feedback.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-text"><button class="btn btn-primary"  onclick="feedbackReport();">Feedback Report </button></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>


        <?php
        include "footer.php";
        ?>


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