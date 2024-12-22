<?php
require "connection.php";
// $sql = "SELECT * FROM `uesrs`";
$cart_rs = Database::search("SELECT `product`.`title`AS`product`,`users_email`,`feedback` FROM `feedback`  INNER JOIN `product` ON `feedback`.`product_id`=`product`.`id`");
// $result = $conn->query($sql);
$cart_num = $cart_rs->num_rows;

if ($cart_num > 0) {
    // Create a file pointer
    $file = fopen('php://output', 'w');

    // Set the headers for the CSV file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=feedback.csv');

    // Output the column headings
    fputcsv($file, array('Product','User','FeedBack Count'));

    // Output the rows
    while ($row = $cart_rs->fetch_assoc()) {
        fputcsv($file, $row);
    }

    // Close the file pointer
    fclose($file);
} else {
    echo "No records found.";
}

?>