<?php
require "connection.php";

if (isset($_GET["id"])) {

    $cid = $_GET["id"];

    $size_rs = Database::search("SELECT * FROM `size` WHERE `id` = '" . $cid . "'");
    $size_data = $size_rs->fetch_assoc();

    $status = $size_data["status_id"];

    if ($status == 1) {
        // Database::iud("UPDATE FROM `category` WHERE `id` = '" . $cid . "'");
        
    Database::iud("UPDATE `size` SET `status_id`='2' WHERE `id` = '" . $cid . "'");

    } elseif ($status == 2) {
        Database::iud("UPDATE `size` SET `status_id`='1' WHERE `id` = '" . $cid . "'");

    }

    echo ("success");

} else {
    echo ("Something Went Wrong");
}
?>