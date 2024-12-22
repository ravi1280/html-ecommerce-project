<?php
require "connection.php";

if(isset($_GET["mobile"])){

    $user_mobile = $_GET["mobile"];
    Database::iud("DELETE  FROM `users`  WHERE `mobile`= '".$user_mobile."'");

    // $user_rs = Database::search("SELECT *FROM `users` WHERE `email` = '".$user_email."'");
    // $user_num = $user_rs->num_rows;
    // if($user_num == 1){
        
    //     Database::iud("DELETE  FROM `users`  WHERE `email`= '".$user_email."'");
    //     Database::iud("DELETE FROM `cart` WHERE `product_id` = '".$product."'");


    //     echo("SUCCESS");

    // }else{
    //     echo("Cannot Find The User . Please Try Agnain Later.. ");
    // }

}else{
    echo("Somthing Went Wrong !");
}

?>