<?php
 require "Connection.php";

 $email = $_POST["e"];
 $np = $_POST["n"];
$rnp = $_POST["r"];
$vcode = $_POST["v"];

if(empty($email)){
    echo("Missing Email Address");
}else if(empty($np)){
    echo("Please Enter Your New Password");
}else if(strlen($np)<5 || strlen($np)>20){
    echo("Invalid Password");
}else if(empty($rnp)){
    echo("Please Retype Your New Password");
}else if($np != $rnp){
    echo("Password Does Not Match");
}else if(empty($vcode)){
    echo("Please Enter Your Verification Code");
}else{
    $rs = Database::search("SELECT * FROM `users` WHERE `email`='".$email."' AND
    `verification_code`= '".$vcode."' ");
    $n = $rs->num_rows;

    if($n == 1){
         
        Database::iud("UPDATE `users` SET `password`= '".$np."' WHERE `email` ='".$email."'");
        echo("success");
    }else{
        echo("Invalid Email Or Veification Code");
    };
}
?>