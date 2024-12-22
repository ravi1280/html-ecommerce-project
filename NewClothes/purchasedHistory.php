<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Purchased History ||</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://unpkg.com/scrollreveal"></script>


</head>

<body class="b y">
    <?php require "connection.php";
    include "header.php";

    if (isset($_SESSION["u"])) {
        $email = $_SESSION["u"]["email"];


        ?>


        <div class="col-12  mb-3 min-vh-100">
            <div class="row">
                <div class="col-12 text-center mt-3 mb-4">
                    <label class=" form-label  fs-1 fw-bolder ">Purchased History</label>
                </div>
                <div class="col-11 col-lg-2 mx-3 mt-4 mb-2">
                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="homePage.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Purchased History </li>
                        </ol>
                    </nav>
                </div>

                <?php
                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `users_email`='" . $email . "' ");
                $invoice_num = $invoice_rs->num_rows;
                if ($invoice_num == 0) {

                    ?>
                    <div class="col-lg-4 offset-lg-1 col-12 mt-2 mb-5">
                        <div class="row">
                            <img src="resource/emptyWatchlist.png" style="height:500px ;width: 500px;">
                        </div>
                    </div>
                    <div class="col-lg-2 offset-1 col-10 mb-3">
                        <div class="row">
                            <button class="btn btn-danger " style="height: 50px;margin-top:200px"> No Purchase Items </button>
                        </div>
                    </div>

                    <?php
                } else {
                    ?>
                    <!-- large Device -->
                    <div class="col-10 offset-1 d-none d-lg-block">
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
                                    <th class="text-end">feedback</th>
                                    <th class="text-end">Details</th>
                                </tr>
                            </thead>
                            <?php
                            $order_rs = Database::search("SELECT * FROM `invoice` INNER JOIN `orderstatus` ON `invoice`.`orderstatus_id` = `orderstatus`.`id`
                            
                             WHERE `users_email`='" . $email . "'  ORDER BY `date` DESC");

                            $order_num = $order_rs->num_rows;

                            for ($x = 0; $x < $order_num; $x++) {
                                $order_data = $order_rs->fetch_assoc();

                                ?>
                                <tbody>
                                    <tr style="height: 72px;">


                                        <td class=" fw-bold table-success  fs-5"><?php echo $x + 1 ?></td>
                                        <td class=" table-success">

                                            <span class="fw-bold text-danger fs-5 p-2"><?php echo $order_data["order_id"]; ?></span>
                                        </td>
                                        <?php

                                        $user_rs = Database::search("SELECT * FROM `users` WHERE `email`='" . $order_data["users_email"] . "'");
                                        $user_data = $user_rs->fetch_assoc();

                                        ?>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success ">
                                            <?php echo $user_data["fname"] . " " . $user_data["lname"]; ?>
                                        </td>
                                        <?php

                                        $address_rs = Database::search("SELECT * FROM `users_has_address` WHERE `users_email`='" . $order_data["users_email"] . "'");
                                        $address_data = $address_rs->fetch_assoc();

                                        ?>
                                        <td class="fw-bold fs-6 text-end pt-3  table-success ">
                                            <?php echo $address_data["line1"] . " " . $address_data["line2"]; ?>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success ">
                                            <?php echo $order_data["date"]; ?>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success ">
                                            Rs.<?php echo $order_data["total"]; ?>.00</td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success text-white">
                                            <button class="btn btn-warning">• <?php echo $order_data["status"] ?></button>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success text-white">
                                            <button class="btn btn-primary"
                                                onclick="openfeedbackModel('<?php echo $order_data['order_id']; ?>');">feedback</button>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success text-white">
                                            <button class="btn btn-primary"
                                                onclick="invoiceMoreModel('<?php echo $order_data['order_id']; ?>');">more</button>
                                        </td>

                                    </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <!-- large device -->

                    <!-- small device -->
                    <div class="col-12  d-block d-lg-none">
                        <table class="table ">
                            <thead>
                                <tr class="border border-1 border-secondary">

                                    <th>Order ID</th>
                                    <th class="text-end">Price</th>
                                    <th class="text-end">Feedback</th>
                                    <th class="text-end">Details</th>
                                </tr>
                            </thead>
                            <?php
                            $order_rs = Database::search("SELECT * FROM `invoice` INNER JOIN `orderstatus` ON `invoice`.`orderstatus_id` = `orderstatus`.`id`WHERE `users_email`='" . $email . "'  ORDER BY `date` DESC");

                            $order_num = $order_rs->num_rows;

                            for ($x = 0; $x < $order_num; $x++) {
                                $order_data = $order_rs->fetch_assoc();

                                ?>
                                <tbody>
                                    <tr style="height: 62px;">

                                        <td class="table-success">

                                            <span class="fw-bold text-danger fs-5 p-2"><?php echo $order_data["order_id"]; ?></span>
                                        </td>


                                        <td class="fw-bold fs-6 text-end pt-3 table-success">
                                            Rs.<?php echo $order_data["total"]; ?>.00</td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success text-white">
                                            <button class="btn btn-primary"
                                                onclick="openfeedbackModel('<?php echo $order_data['order_id']; ?>');"><i
                                                    class="bi bi-clipboard2-data-fill"></i></button>
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-3 table-success text-white">
                                            <button class="btn btn-primary"
                                                onclick="invoiceMoreModel('<?php echo $order_data['order_id']; ?>');">More</button>
                                        </td>

                                    </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>

                    <!-- small device -->

                </div>

            </div>
             <!-- feedback modal -->
             <div class="modal" id="feedbackModal<?php echo $order_data['order_id']; ?>" tabindex="-1">
                <!-- <div id="viewArea02"> </div> -->
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><b>Feedback Modal</b> </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body  rounded-3 ">
                            <div class="col-12 mb-2">

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input " type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                        value="option1">
                                    <label class="form-check-label fs-2" for="inlineRadio1">&#128512;</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                        value="option2">
                                    <label class="form-check-label fs-2" for="inlineRadio2">&#128522;</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                                        value="option3">
                                    <label class="form-check-label fs-2" for="inlineRadio3">&#128528;</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4"
                                        value="option3">
                                    <label class="form-check-label fs-2" for="inlineRadio4">&#128545;</label>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer text-start">

                            <input type="text" class=" form-control" placeholder="Type your Feedback" id="feedbackText">
                            <a href="" class="btn btn-warning  d-block mt-2"
                                onclick="feedbackSubmit('<?php echo $order_data['order_id']; ?>');">Add feedback</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- feedback model -->
            <!-- model -->
            <div class="modal" tabindex="-1" id="invoiceMoreModel<?php echo $order_data['order_id']; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><b>More Details</b> </h4>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <div class="col-6 offset-3  col-lg-4 offset-lg-4">
                                <div class="row">
                                    <?php
                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $order_data['product_id'] . "'  ");
                                    for ($x = 0; $x < 1; $x++)
                                        $image_data = $image_rs->fetch_assoc();

                                    ?>
                                    <img src="<?php echo $image_data["code"]; ?>" style="height: 150px;"
                                        class=" rounded-5 mb-2 ">
                                </div>
                            </div>
                            <h6 class="modal-title text-center"><b>Ordr ID :</b>
                                <?php echo $order_data['order_id']; ?></h6>
                            <h6 class="modal-title text-center"><b>Quantity :</b>
                                <?php echo $order_data["qty"]; ?> </h6>
                            <h6 class="modal-title text-center"><b>Price :</b>
                                Rs.<?php echo $order_data['total']; ?>.00</h6>

                            <h6 class="modal-title text-center"><b>Email :</b>
                                <?php echo $order_data['users_email']; ?></h6>

                            <h6 class="modal-title text-center"><b>Order Date :</b>
                                <?php echo $order_data["date"]; ?></h6>
                            <h6 class="modal-title text-center"><b>Status :</b>
                                <?php echo $order_data['status']; ?></h6>



                        </div>

                    </div>
                </div>
            </div>
            <!-- model -->


            <?php
                }
    } else {
        ?>
        <div class="col-12  mb-3 mt-lg-5">
            <div class="row">
                <div class="col-lg-6 offset-lg-1 mt-2 mb-5 d-none d-lg-block">
                    <div class="row mt-lg-5 mt-1">
                        <img src="resource/emptyWatchlist.png" style="height:500px ;width: 500px;"
                            class="mt-1 my-5 mt-lg-5">
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-10 offset-1 mb-5 mb-lg-0">
                    <div class="row">
                        <button class="btn btn-danger " style="height: 50px;margin-top:200px" onclick="loginOrSignUp();">
                            Please SignIn
                            or Login First</button>
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