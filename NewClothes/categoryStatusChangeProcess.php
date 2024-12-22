<?php
require "connection.php";

if (isset($_GET["id"])) {

    $cid = $_GET["id"];

    $category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '" . $cid . "'");
    $category_data = $category_rs->fetch_assoc();

    $status = $category_data["status_id"];

    if ($status == 1) {
        // Database::iud("UPDATE FROM `category` WHERE `id` = '" . $cid . "'");
        
    Database::iud("UPDATE `category` SET `status_id`='2' WHERE `id` = '" . $cid . "'");

    } elseif ($status == 2) {
        Database::iud("UPDATE `category` SET `status_id`='1' WHERE `id` = '" . $cid . "'");

    }

    echo ("success");

} else {
    echo ("Something Went Wrong");
}
?>