
<?php
require "connection.php";
if(isset($_GET["id"])){

    $cid = $_GET["id"];

    $category_rs = Database::search("SELECT * FROM `category` WHERE `id` = '".$cid."'");
    $category_num = $category_rs->num_rows;
    $category_data = $category_rs->fetch_assoc();

    if($category_num == 0){
        echo("Somthing Went Wrong .. Please Try Again Later");
        
    }else{
      
        Database::iud("DELETE FROM `category` WHERE `id` ='".$cid."'");
        echo("success");

    }

}else{
    echo("Please Select A Categoery");
}
?>