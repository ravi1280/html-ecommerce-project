<?php
require "connection.php";
if (isset($_GET["clr"])) {

    $clr_name = $_GET["clr"];
    if (empty($clr_name)) {
        echo ("Please enter Colur name");
    } else {
        $clr_name = $_GET["clr"];
        $clr_name_no_space = str_replace(' ', '', $clr_name); // Remove spaces from category nam
        $clr_rs = Database::search("SELECT * FROM colour WHERE REPLACE(colour, ' ', '') = '" . $clr_name_no_space . "'");
        $clr_num = $clr_rs->num_rows;
        if ($clr_num == 0) {
            Database::iud("INSERT INTO colour (`colour`,`status_id`) VALUES ('" . $clr_name . "','1')");
            echo ("success.");

        } else {
            echo ("Somthing Went Wrong .. Already have colour");
        }
    }
} else {
    echo ("Please Select A Colour");
}
?>