
<?php
require "connection.php";

$msg = $_POST["msg"];
$email = $_POST["email"];
$adminEmail = "ravishka@gmail.com";

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("y-m-d H:i:s");

if(!empty($msg)){
    Database::iud("INSERT INTO `message`(`message` ,`date` ,`to` ,`from`) 
VALUES ('" . $msg . "','" . $date . "','" . $adminEmail . "','" . $email . "')");
echo ("success");

}else{
    echo("Please enter your message");
}

?>