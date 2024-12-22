<?php
require "connection.php";

if(isset($_GET["email"])){

    $user_email = $_GET["email"];

    $user_rs = Database::search("SELECT *FROM `users` WHERE `email` = '".$user_email."'");
    $user_num = $user_rs->num_rows;
    if($user_num == 1){
        $user_data = $user_rs->fetch_assoc();
        if($user_data["status_id"] ==1){
            Database::iud("UPDATE `users` SET `status_id`='2' WHERE `email`= '".$user_email."'");
            echo("blocked");
        }elseif($user_data["status_id"] == 2){
            Database::iud("UPDATE `users` SET `status_id`='1' WHERE `email`= '".$user_email."'");
            echo("unblocked");
        }



    }else{
        echo("Cannot Find The User . Please Try Agnain Later.. ");
    }

}else{
    echo("Somthing Went Wrong !");
}

?>