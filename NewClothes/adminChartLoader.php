<?php

require "connection.php";
session_start();

$data = [0, 0, 0];

$query = "SELECT
        (SELECT COUNT(*) FROM users) AS `user`,
        (SELECT COUNT(*) FROM category) AS category,
        (SELECT COUNT(*) FROM product) AS products";
// echo ($query);
$dataTable = Database::search($query);
if ($dataTable->num_rows > 0) {
    $dataValues = $dataTable->fetch_assoc();
    $data[0] = $dataValues["user"];
    $data[1] = $dataValues["category"];
    $data[2] = $dataValues["products"];
}
echo (json_encode($data));


?>