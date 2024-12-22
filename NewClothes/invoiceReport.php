<?php
require "connection.php";
// $sql = "SELECT * FROM `uesrs`";
$cart_rs = Database::search("SELECT `order_id`,`users_email`,`title`,`invoice`.`qty` AS`qty`,`delivery_fee`,`total`,`status`,`date` FROM `invoice` 
INNER JOIN `product` ON `invoice`.`product_id` = `product`.`id` 
INNER JOIN `orderstatus` ON `invoice`.`orderstatus_id` = `orderstatus`.`id`");
// $result = $conn->query($sql);
$cart_num = $cart_rs->num_rows;

if ($cart_num > 0) {
    // Create a file pointer
    $file = fopen('php://output', 'w');

    // Set the headers for the CSV file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=invoice.csv');

    // Output the column headings
    fputcsv($file, array('Order ID', 'Uesr Email', 'Product', 'quantity', 'Delivery Cost', 'Total', 'Status', 'Date'));

    // Output the rows
    while ($row = $cart_rs->fetch_assoc()) {
        // fputcsv($file, $row);
         // Format the date
         $date = new DateTime($row['date']);
         $row['date'] = $date->format('Y-m-d'); // Adjust format as needed
 
         // Write the formatted row to the CSV file
         fputcsv($file, $row);
    }

    // Close the file pointer
    fclose($file);
} else {
    echo "No records found.";
}

?>