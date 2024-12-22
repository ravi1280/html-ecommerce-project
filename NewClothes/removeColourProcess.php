
<?php
require "connection.php";
if(isset($_GET["id"])){

    $clid = $_GET["id"];

    $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id` = '".$clid."'");
    $colour_num = $colour_rs->num_rows;
    // $colour_data = $colour_rs->fetch_assoc();

    if($colour_num == 0){
        echo("Somthing Went Wrong .. Please Try Again Later");
        
    }else{
      
        Database::iud("DELETE FROM `colour` WHERE `id` ='".$clid."'");
        echo("success");

    }

}else{
    echo("Please Select A Colour");
}
?>