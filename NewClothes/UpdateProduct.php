<?php
require "connection.php";


$title = $_POST["title"];
$price = $_POST["price"];
$discount = $_POST["discount"];
$warranty = $_POST["warranty"];
$discription = $_POST["discription"];
$id = $_POST["id"];
if (empty($title)) {
    echo ("Please type a title");
} else if (empty($price)) {
    echo ("Please enter a price");
} else if ($price <= 0) {
    echo ("Please enter a price over than 0");
} else if (empty($discount)) {
    echo ("Please Enter a discount.");
} else if ($discount < 0) {
    echo ("Please Enter a discount over than 0.");
} else if (empty($warranty)) {
    echo ("Please Enter a warranty.");
} else if ($warranty < 0) {
    echo ("Please Enter a discount over than 0.");
} else if (empty($discription)) {
    echo ("Please Enter a discription.");
} else {
    Database::iud("UPDATE `product`SET`title`='" . $title . "' ,`price`='" . $price . "' ,`discount`='" . $discount . "' ,
    `warrenty`='" . $warranty . "', `description`='" . $discription . "'  WHERE `id`='" . $id . "' ");
    echo ("success");
}

?>