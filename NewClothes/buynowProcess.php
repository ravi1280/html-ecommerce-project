<?php
session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $id = $_GET["id"];
    $qty = $_GET["qty"];
    $umail = $_SESSION["u"]["email"];
    // echo($id);
    // echo($qty);
    // echo($umail);

    $array;

    $order_id = uniqid();

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$id."'");
    $product_data = $product_rs->fetch_assoc();
    // echo($product_data["title"]);

    $city_rs = Database::search("SELECT * FROM `users_has_address` WHERE `users_email`='".$umail."'");
    $city_num = $city_rs->num_rows;

    if($city_num == 1){
        $city_data = $city_rs->fetch_assoc();

        $city_id = $city_data["city_id"];
        $address = $city_data["line1"].",".$city_data["line2"];

        $district_rs = Database::search("SELECT * FROM `city` WHERE `id`='".$city_id."'");
        $district_data = $district_rs->fetch_assoc();

        $district_id = $district_data["district_id"];

        $delivery = $product_data["delivery_fee"];
        $item = $product_data["title"];
        $amount = ((int)$product_data["price"] * (int)$qty) + (int)$delivery;

        $merchant_secret ="MjgwNTg4OTk1ODQwNzc4OTc2OTIzODg3MTQ0MjA1MzEwMTI2MDkzNA==";
        $currency ="LKR";
        $hash = strtoupper(
            md5(
                $merchant_id ="1221660" .
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $uaddress = $address;
        $city = $district_data["name"];

        $array["id"] = $order_id;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["mobile"] = $mobile;
        $array["address"] = $uaddress;
        $array["city"] = $city;
        $array["umail"] = $umail;
        $array["hash"] = $hash;

        echo json_encode($array);

    }else{
        echo("2");
    }

}else{
    echo ("1");
}


?>