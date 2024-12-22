<?php
require "connection.php";
$category = $_POST["category"];
$title = $_POST["title"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$colour = $_POST["colour"];
$size = $_POST["size"];
$discount = $_POST["discount"];
$deliveryFee = $_POST["deliveryFee"];
$warranty = $_POST["warranty"];
$discription = $_POST["discription"];
if ($category == "0") {
    echo ("Please select a Category");
} else if (empty($title)) {
    echo ("Please select a title");
} else if (empty($price)) {
    echo ("Please enter a price");
} else if ($price < 0) {
    echo ("Please enter a price over than 0");
} else if (empty($quantity)) {
    echo ("Please Enter a quantity");
} else if ($quantity < 0) {
    echo ("Please Enter a quantity over than 0");
}else if (empty($colour)) {
    echo ("Please select a colour");
} else if (empty($size)) {
    echo ("Please select a size");
} else if (empty($discount)) {
    echo ("Please Enter a discount.");
}  else if ($discount<0) {
    echo ("Please Enter a discount.");
}else if (empty($deliveryFee)) {
    echo ("Please Enter a deliveryFee.");
} else if (empty($warranty)) {
    echo ("Please Enter a warranty.");
} else if (empty($discription)) {
    echo ("Please Enter a discription.");
} else {
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("y-m-d H:i:s");
    $status = 1;
    $id = 11;
    Database::iud("INSERT INTO `product`(`price` ,`qty` ,`discount` ,`title`, `description` ,`delivery_fee`,
     `datetime_added`, `colour_id`, `size_id`,`category_id`, `status_id` , `warrenty`) VALUES
     ('" . $price . "','" . $quantity . "','" . $discount. "','" . $title . "','" . $discription . "','" . $deliveryFee . "','" . $date. "','" . $colour. "',
     '" . $size . "','" . $category . "','".$status."','" . $warranty . "')");

    echo ("Product Save Successfully");
    $product_id = Database::$connection->insert_id;
    $length = sizeof($_FILES);
    if ($length <= 3 && $length > 0) {
        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+aml");
        for ($x = 0; $x < $length; $x++) {
            if (isset($_FILES["image" . $x])) {
                $img_file = $_FILES["image" . $x];
                $file_extention = $img_file["type"];

                if (in_array($file_extention, $allowed_img_extentions)) {
                    $new_img_extention;

                    if ($file_extention == "image/jpg") {
                        $new_img_extention = ".jpg";
                    } else if ($file_extention == "image/jpeg") {
                        $new_img_extention = ".jpeg";
                    } else if ($file_extention == "image/png") {
                        $new_img_extention = ".png";
                    } else if ($file_extention == "image/svg+xml") {
                        $new_img_extention = ".svg";
                    }
                    $file_name = "resource/Clothes/product/" . $title . "_" . $x . "_" . uniqid() . $new_img_extention;
                    move_uploaded_file($img_file["tmp_name"], $file_name);

                    Database::iud("INSERT INTO `images`(`code`,`product_id`) VALUES ('" . $file_name . "','" . $product_id . "')");
                } else {
                    echo ("invalid  Image Type");
                }
            }
        }
        echo ("Poduct image saved success");
    } else {
        echo ("invalid image count");
    }
}
?>


