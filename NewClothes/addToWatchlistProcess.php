<?php

session_start();
require "connection.php";

if(isset($_SESSION["u"])){
    if(isset($_GET["id"])){

        $email = $_SESSION["u"]["email"];
        $pid = $_GET["id"];


            Database::iud("INSERT INTO `watchlist`(`product_id`,`users_email`) VALUES ('" . $pid . "','" . $email . "')");
            echo ("added");

    
    }else{
        echo ("Something Went Wrong");
    }

}else{
    echo ("Please Login First");
}
?>
