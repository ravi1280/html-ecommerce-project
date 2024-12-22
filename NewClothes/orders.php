<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Orders ||</title>

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
        <?php require "alertBoxContend.php";
        include "connection.php";
        ?>
        <div class="min-vh-100">
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
                        <li class="breadcrumb-item active" aria-current="page">Orders </li>
                    </ol>
                </nav>
            </div>
            <div class="col-12  mb-3">
                <div class="row">

                    <div class="col-12 text-center mt-1 mb-5">
                        <label class=" form-label  fs-1 fw-bolder ">Orders </label>
                    </div>

                    <div class="col-10 offset-1 ">
                        <table class="table">
                            <thead>
                                <tr class="border border-1 border-secondary">
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th class="text-end">Coustemer Name</th>
                                    <th class="text-end">Address</th>
                                    <th class="text-end">Order Date</th>
                                    <th class="text-end">Price</th>
                                    <th class="text-end">Status</th>
                                </tr>
                            </thead>
                            <?php
                            $order_rs = Database::search("SELECT * FROM `invoice` ORDER BY `date` DESC");

                            $order_num = $order_rs->num_rows;

                            for ($x = 0; $x < $order_num; $x++) {
                                $order_data = $order_rs->fetch_assoc();

                                ?>
                                <tbody>
                                    <tr style="height: 72px;">


                                        <td class=" fw-bold table-success fs-5"><?php echo $x + 1 ?></td>
                                        <td class=" table-success">

                                            <span
                                                class="fw-bold text-danger fs-5 p-2"><?php echo $order_data["order_id"]; ?></span>
                                        </td>
                                        <?php

                                        $user_rs = Database::search("SELECT * FROM `users` WHERE `email`='" . $order_data["users_email"] . "'");
                                        $user_data = $user_rs->fetch_assoc();

                                        ?>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success">
                                            <?php echo $user_data["fname"] . " " . $user_data["lname"]; ?>
                                        </td>
                                        <?php

                                        $address_rs = Database::search("SELECT * FROM `users_has_address` WHERE `users_email`='" . $order_data["users_email"] . "'");
                                        $address_data = $address_rs->fetch_assoc();

                                        ?>
                                        <td class="fw-bold fs-6 text-end pt-3  table-success">
                                            <?php echo $address_data["line1"] . " " . $address_data["line2"]; ?>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success">
                                            <?php echo $order_data["date"]; ?>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success">
                                            Rs.<?php echo $order_data["total"]; ?>.00</td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success">
                                            <?php
                                            if ($order_data["orderstatus_id"] == 1) {
                                                ?>

                                                <button class="btn btn-danger"
                                                    onclick="Orders1('<?php echo $order_data['order_id']; ?>');">• Get
                                                    Order</button>
                                                <?php
                                            } elseif ($order_data["orderstatus_id"] == 2) {
                                                ?>

                                                <button class="btn btn-warning"
                                                    onclick="Orders1('<?php echo $order_data['order_id']; ?>');">• Process
                                                    Order</button>


                                                <?php
                                            } elseif ($order_data["orderstatus_id"] == 3) {
                                                ?>
                                                <button class="btn btn-primary"
                                                    onclick="Orders1('<?php echo $order_data['order_id']; ?>');">• Shipped
                                                    Order</button>


                                                <?php
                                            } elseif ($order_data["orderstatus_id"] == 4) {
                                                ?>
                                                <button class="btn btn-success"
                                                    onclick="Orders1('<?php echo $order_data['order_id']; ?>');">• Deliverd
                                                    Order</button>


                                                <?php
                                            } elseif ($order_data["orderstatus_id"] == 5) {
                                                ?>
                                                <button class="btn btn-black btn"
                                                    onclick="Orders1('<?php echo $order_data['order_id']; ?>');">• Complete
                                                    Order</button>
                                                <?php
                                            }
                                            ?>



                                        </td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                            ?>


                        </table>
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