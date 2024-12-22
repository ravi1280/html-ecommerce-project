<?php
require "connection.php";
$category =$_GET["cat"];
if (!empty($category)) {
    $cat_name = $_GET["cat"];
    $cat_name_no_space = str_replace(' ', '', $cat_name); 

    $cat_rs = Database::search("SELECT * FROM category WHERE REPLACE(name, ' ', '') = '" . $cat_name_no_space . "'");
    $cat_num = $cat_rs->num_rows;
    if ($cat_num == 0) {

        Database::iud("INSERT INTO `category` (`name`,`status_id`) VALUES ('" . $cat_name . "','1')");
        echo ("success.");
    } else {
        echo ("Somthing Went Wrong .. Already have category");
    }
} else {
    echo ("Please Select A Category");
}
?>