<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $mail = $_SESSION["u"]["email"];

    $orderid = $_POST["pid"];
    $type = $_POST["type"];
    // $email = $_POST["email"];
    $feedback = $_POST["feedbackMessage"];
    $product_rs = Database::search("SELECT `product_id` FROM `invoice` WHERE `order_id`='" . $orderid. "' ");
    for ($x = 0; $x < 1; $x++)
        $product_id = $product_rs->fetch_assoc();

    
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `feedback`(`feedback`,`users_email`,`product_id`,`feedback_text`,`date_time`) VALUES 
    ('".$type."','".$mail."','".$product_id["product_id"]."','".$feedback."','".$date."')");

    echo "success";

}else{
    echo "Please login first";
}

?>