<?php

session_start();
require "connection.php";

$email = $_SESSION["u"]["email"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$cart_rs = Database::search("SELECT * FROM cart WHERE users_email='" . $email . "'");
$cart_num = $cart_rs->num_rows;

$order_id = uniqid();

for ($cart = 0; $cart < $cart_num; $cart++) {
    $cart_data = $cart_rs->fetch_assoc();
    $product = $cart_data["product_id"];

    $rs = Database::search("SELECT * FROM product WHERE product.id='" . $product . "'");
    $data = $rs->fetch_assoc();

    $total = $data["price"] + $data["delivery_fee"];

    Database::iud("INSERT INTO invoice (order_id,`date`,qty,total,product_id,users_email,orderstatus_id) VALUES('" . $order_id . "','" . $date . "','1','" . $total . "','" . $product . "','" . $email . "',(SELECT id FROM orderstatus WHERE status='Order' LIMIT 1))");
}

Database::iud("DELETE FROM cart WHERE users_email='" . $_SESSION["u"]["email"] . "'");

echo ($order_id); // order Id