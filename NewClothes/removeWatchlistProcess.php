<?php
require "connection.php";
if(isset($_GET["id"])){

    $wid = $_GET["id"];

    $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `id` = '".$wid."'");
    $watch_num = $watch_rs->num_rows;
    $watch_data = $watch_rs->fetch_assoc();

    if($watch_num == 0){
        echo("Somthing Went Wrong .. Please Try Again Later");
        
    }else{
        // Database::iud("INSERT INTO `recent` (`product_id`,`users_email`) VALUES ('".$watch_data["product_id"]."',
        // '".$watch_data["users_email"]."')");

        Database::iud("DELETE FROM `watchlist` WHERE `id` ='".$wid."'");
        echo("success");

    }

}else{
    echo("Please Select A Product");
}
?>