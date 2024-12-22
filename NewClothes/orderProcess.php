<?php
require "connection.php";

if (isset($_GET["id"])) {

    $oid = $_GET["id"];

    $order_rs = Database::search("SELECT *FROM `invoice` WHERE `order_id` = '".$oid."'");
    $order_data = $order_rs->fetch_assoc();
    if ($order_data["orderstatus_id"] ==1) {
        Database::iud("UPDATE `invoice` SET `orderstatus_id`='2' WHERE `order_id` = '".$oid."' ");
        echo ("Process is success");
    } elseif ($order_data["orderstatus_id"] ==2) {
        Database::iud("UPDATE `invoice` SET `orderstatus_id`='3' WHERE `order_id` = '".$oid."'");
        echo ("Process is success");
    } elseif ($order_data["orderstatus_id"] ==3) {
        Database::iud("UPDATE `invoice` SET `orderstatus_id`='4'  WHERE `order_id` = '".$oid."' ");
        echo ("Process is success");
    } elseif ($order_data["orderstatus_id"] ==4) {
        Database::iud("UPDATE `invoice` SET `orderstatus_id`='5' WHERE `order_id` = '".$oid."' ");
        echo ("Process is success");
    } elseif ($order_data["orderstatus_id"] ==5) {
       
        echo ("Completed Order... Please Check another Order");
    }

} else {
    echo ("Somthing Went Wrong !");
}

?>