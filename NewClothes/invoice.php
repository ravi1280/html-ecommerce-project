<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice ||</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="icon" href="resource/icon.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class=" b y">
    <?php
    include "connection.php";
    include "header1.php";

    if (isset($_SESSION["u"])) {
        $umail = $_SESSION["u"]["email"];
        $invoiceId = $_GET["id"];
        // $invoiceId = 2;
    
        ?>
        <div class="mt-5">INVOICE</div>

        <div class="col-12 col-lg-10 offset-lg-1 mb-5  mt-5 invoicebackground " id="page">
            <div class="row mx-lg-3">
                <div class="col-6">

                </div>
                <div class="col-6 mt-4  ">
                    <h1 class=" fw-bold text-end">INVOICE</h1>
                </div>
                <hr>
                <div class="col-6">
                    <?php
                    $user_rs = Database::search("SELECT * FROM `users` INNER JOIN `users_has_address` ON `users_has_address`.`users_email` =`users`.`email` WHERE `email`='" . $umail . "'");
                    $user_data = $user_rs->fetch_assoc();
                    ?>
                    <h3>Bill TO :</h3>
                    <span class=" text-uppercase"><?php echo $user_data["fname"] . " " . $user_data["lname"] ?> <br></span>
                    <span><?php echo $user_data["email"] ?> <br><?php echo $user_data["line1"] ?>,
                        <?php echo $user_data["line2"] ?></span>

                </div>
                <div class="col-6 text-end">
                    <?php
                    $invoice_rs = Database::search("SELECT *,`invoice`.`qty` AS `invoice_qty` FROM `invoice` INNER JOIN `product` ON `invoice`.`product_id` =`product`.`id` WHERE `order_id`='" . $invoiceId . "'");
                    $invoice_num = $invoice_rs->num_rows;
                    $invoice_data = $invoice_rs->fetch_assoc();
                    
                    ?>
                    <span>Invoice NO: <?php echo $invoiceId ?> <br> Date : <?php echo $invoice_data["date"] ?></span>
                </div>
                <hr class="mt-2 mb-1">
                <div class="col-12 col-lg-10 offset-lg-1 mt-3 border border-2 p-2 ">
                    <div class="row ">

                        <div class="col-6">
                            <h5>Item</h5>

                        </div>
                        <div class="col-2 text-end">
                            <h5>Quantity</h5>
                        </div>
                        <div class="col-2 text-end">
                            <h5>Unit Price</h5>
                        </div>
                        <div class="col-2 text-end">
                            <h5>Total</h5>
                        </div>

                        <hr>
                        <?php $sub=0;
                        $dele=0; ?>
                        <?php  $invoice1_rs = Database::search("SELECT *,`invoice`.`qty` AS `invoice_qty` FROM `invoice` INNER JOIN `product` ON `invoice`.`product_id` =`product`.`id` WHERE `order_id`='" . $invoiceId . "'");
                         $invoice1_num = $invoice1_rs->num_rows;
                        for ($z = 0; $z < $invoice1_num; $z++) {
                            $invoice1_data = $invoice1_rs->fetch_assoc();
                            $sub += $invoice1_data["invoice_qty"]*$invoice1_data["price"];
                            $dele += $invoice1_data["delivery_fee"];
                            ?>
                            <div class="col-6">
                                <h5><?php echo $invoice1_data["title"] ?></h5>

                            </div>
                            <div class="col-2 text-end">
                                <h5><?php echo $invoice1_data["invoice_qty"] ?></h5>
                            </div>
                            <div class="col-2 text-end">
                                <h5>Rs:<?php echo $invoice1_data["price"] ?>.00</h5>
                            </div>
                            <div class="col-2 text-end">
                                <h5>Rs.<?php echo $invoice1_data["total"] ?>.00</h5>
                            </div>

                        <?php } ?>

                    </div>
                </div>
            <?php $totalTable = Database::search("SELECT SUM(total) AS total FROM invoice WHERE order_id='" . $invoiceId . "'");
            $totalData = $totalTable->fetch_assoc();
            // $sub = $invoice_data["invoice_qty"]*$invoice_data["price"];
            ?>
             
                <div class="col-12 col-lg-10 offset-lg-1 mt-4">
                    <div class="row  d-flex justify-content-end align-items-center">
                        <div class="col-4 text-end  ">
                            <h5>SubTotal : Rs.<?php echo $sub ?>.00</h5>
                            <h5>Delivery Cost : Rs.<?php echo $dele ?>.00</h5>
                            <h5>Tax : Rs.0.00</h5>

                            <hr>
                            <?php $total1 =$sub+$dele;
                            ?>
                            <h2>Total : Rs.<?php echo $total1 ?>.00 </h2>
                            <hr>
                        </div>

                    </div>
                </div>
                <div class="col-12 mt-4 text-center">
                    <h2>Thank You!</h2>
                </div>
                <div class="col-12 mt-4 mb-4 text-end">
                    <h4>New Clothes</h4>
                    <span>(+94)71 6585856 <br>NewClothes@gmail.com <br> Contact@NewClothes.com <br> </span>
                    <span>Bambalapitiya, Colombo 10<br> SriLanka</span>
                </div>
                <div class="col-12 text-center mb-3">
                    <label class="form-label fs-5 ">
                        Invoice was created on a computer and is valid without the Signature and Seal.
                    </label>
                </div>



            </div>
        </div>
        <div class="mt-5 mb-4  p-3 text-end">
            <button class=" btn btn-danger" onclick="printInvoice();">Download Invoice PDF</button>
        </div>


        <?php
    } else {
        ?>
        <script>
            window.location = "homePage2.php";
        </script>
        <?php
    }
    ?>

</body>
<?php include "footer.php" ?>
<script src="bootstrap.bundle.js"></script>
<script src="script.js"></script>

</html>