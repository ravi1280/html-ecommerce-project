<?php
require "connection.php";
// $sql = "SELECT * FROM `uesrs`";
$cart_rs = Database::search("SELECT `title`,`price`,`qty`,`discount`,`colour`.`colour`AS `colour`,`size`.`name` AS`size`,`category`.`name` AS `category`,`status`.`name` AS `status` ,`warrenty`,`description` FROM `product` 
INNER JOIN `colour` ON `product`.`colour_id` = `colour`.`id` 
INNER JOIN `size` ON `product`.`size_id` = `size`.`id` 
INNER JOIN `category` ON `product`.`category_id` = `category`.`id`
INNER JOIN `status` ON `product`.`status_id` = `status`.`id`");
// $result = $conn->query($sql);
$cart_num = $cart_rs->num_rows;

if ($cart_num > 0) {
    // Create a file pointer
    $file = fopen('php://output', 'w');

    // Set the headers for the CSV file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=products.csv');

    // Output the column headings
    fputcsv($file, array('Product Name','Price','Quantity','Discount','Colour','Size','Category','Status','Warrenty','Description'));

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