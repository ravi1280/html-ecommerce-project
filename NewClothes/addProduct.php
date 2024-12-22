<?php
require "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Product ||</title>

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
    <?php require "alertBoxContend.php"; ?>
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

        <div class="col-11 col-lg-2 mx-3 mt-3">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="homePage2.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="admin.php">Admin panel</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product </li>
                </ol>
            </nav>
        </div>
        <div class="col-12  mb-3">
            <div class="row">

                <div class="col-12 text-center mt-1 mb-5">
                    <label class=" form-label  fs-1 fw-bolder ">Add Product &nbsp;&nbsp;</label>
                </div>
            </div>
        </div>
        <div class="col-10 offset-1 mb-5">
            <div class="row">

                <div class="offset-lg-1 col-12 col-lg-10 mt-3">
                    <div class="row">
                        <div class="col-lg-3 offset-lg-0  col-10 offset-1 col-md-4 offset-md-0  ">
                            <img src="resource/upload.png" class="img-fluid rounded-4 " style="height: 200px;" id="i0" />

                        </div>
                        <div class="col-lg-3 offset-lg-0 col-10 offset-1 col-md-4 offset-md-0" >
                            <img src="resource/upload.png" class="img-fluid  rounded-4" style="height: 200px;" id="i1" />

                        </div>
                        <div class="col-lg-3 offset-lg-0 col-10 offset-1 col-md-4 offset-md-0" >
                            <img src="resource/upload.png" class="img-fluid  rounded-4 " style="height: 200px; " id="i2" />

                        </div>
                        <div class="col-lg-3 offset-lg-0 col-12  offset-1 col-md-10 offset-md-1  " style="margin-top: 90px; width:250px;">
                            <input type="file" class="d-none" id="imageuploader" multiple />
                            <label for="imageuploader" class="col-12 btn btn-primary " onclick="changeProductImage();">Upload
                                <b>3</b> Images</label>
                        </div>

                    </div>
                </div>




            </div>
        </div>


        <div class="col-10 offset-1  mb-4 ">
            <div class="row ">
                <div class="row mb-3">
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12">
                        <h6 class=" mx-4"><b>Categoery</b></h6>
                        <select class="form-select text-center" id="category">
                            <option value="0">Select Cetegoery</option>
                            <?php

                            $category_rs = Database::search("SELECT * FROM `category`WHERE `status_id`='1'");
                            $category_num = $category_rs->num_rows;

                            for ($x = 0; $x < $category_num; $x++) {
                                $category_data = $category_rs->fetch_assoc();
                                ?>
                                <option value="<?php echo $category_data["id"]; ?>"><?php echo $category_data["name"]; ?>
                                </option>
                                <?php
                            }

                            ?>
                        </select>

                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12 ">
                        <h6 class=" mx-4"><b>Title</b></h6>
                        <input type="text" id="title" class=" form-control">

                    </div>
                </div>

                <div class="row    mb-3">
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12">
                        <h6 class=" mx-4"><b>Price</b></h6>
                        <div class="input-group ">
                            <span class="input-group-text">Rs.</span>
                            <input type="text" id="price" class="form-control" />
                            <span class="input-group-text">.00</span>
                        </div>

                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12">
                        <h6 class=" mx-4"><b>Quantity</b></h6>
                        <input type="text" class=" form-control" id="quantity" placeholder=" enter a value of quantity">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12">
                        <h6 class=" mx-4"><b>Colour</b></h6>
                        <select class="form-select text-center" id="colour">
                            <option value="0">Select Colour</option>
                            <?php

                            $colour_rs = Database::search("SELECT * FROM `colour` WHERE `status_id`='1'");
                            $colour_num = $colour_rs->num_rows;

                            for ($x = 0; $x < $colour_num; $x++) {
                                $colour_data = $colour_rs->fetch_assoc();
                                ?>
                                <option value="<?php echo $colour_data["id"]; ?>"><?php echo $colour_data["colour"]; ?></option>
                                <?php
                            }

                            ?>
                        </select>

                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12">
                        <h6 class=" mx-4"><b>Size</b></h6>
                        <select class="form-select text-center" id="size">
                            <option value="0">Select Size</option>
                            <?php

                            $size_rs = Database::search("SELECT * FROM `size`WHERE `status_id`='1'");
                            $size_num = $size_rs->num_rows;

                            for ($x = 0; $x < $size_num; $x++) {
                                $size_data = $size_rs->fetch_assoc();
                                ?>
                                <option value="<?php echo $size_data["id"]; ?>"><?php echo $size_data["name"]; ?></option>
                                <?php
                            }

                            ?>
                        </select>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12 ">
                        <h6 class=" mx-4"><b>Discount</b></h6>
                        <!-- <input type="text" id="discount" class=" form-control"> -->
                        <div class="input-group ">

                            <input type="text" id="discount" class="form-control" />
                            <span class="input-group-text">%</span>
                        </div>

                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12">
                        <h6 class=" mx-4"><b>Delivery Fee</b></h6>
                        <input type="text" id="deliveryFee" class=" form-control">

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12 ">
                        <h6 class=" mx-4"><b>Warrenty Period</b></h6>
                        <input type="text" id="warranty" class=" form-control">

                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-5 offset-md-1  col-12 ">
                        <h6 class=" mx-4"><b>Discription</b></h6>
                        <input type="text" id="discription" class=" form-control">

                    </div>
                </div>

                <div class="col-8 offset-2 mt-4 mb-4    ">
                    <div class="row">
                        <button class=" btn btn-primary  " onclick="addProduct();">Add this Product In System</button>
                    </div>

                </div>
            </div>
        </div>






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