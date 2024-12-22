
<?php
require "connection.php";

$msg = $_POST["msg1"];
$email = $_POST["email"];
$adminEmail = "ravishka@gmail.com";
// echo($msg);

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("y-m-d H:i:s");

if(empty($msg)){
    echo("PLEASE ENTER YOUR MESSAGE");
}else{
    
    Database::iud("INSERT INTO `message`(`message` ,`date` ,`to` ,`from`) 
    VALUES ('" . $msg . "','" . $date . "','" . $email . "','" . $adminEmail . "')");
    echo ("success");
}

?>