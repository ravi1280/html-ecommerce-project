<?php
require "connection.php";
$size =$_GET["size"];
if(!empty($size)){

    $size_name = $_GET["size"];
    $size_name_no_space = str_replace(' ', '', $size_name); 
    $size_rs = Database::search("SELECT * FROM size WHERE REPLACE(name, ' ', '') = '" . $size_name_no_space . "'");
    $size_num = $size_rs->num_rows;
    
    if($size_num == 0){

        Database::iud("INSERT INTO `size` (`name`,`status_id`) VALUES ('" . $size_name . "','1')");
        echo("success");
        
    }else{
        echo("Somthing Went Wrong .. Already have category");
      
    }

}else{
    echo("Please Select A Size");
}
?>