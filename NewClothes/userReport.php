<?php
require "connection.php";

$cart_rs = Database::search("SELECT `email`, `fname`, `lname` FROM `users`");
$cart_num = $cart_rs->num_rows;

if ($cart_num > 0) {
    // Create a file pointer
    $file = fopen('php://output', 'w');

    // Set the headers for the CSV file
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=Users.csv');

    // Output the column headings
    fputcsv($file, array('Email', 'First Name', 'Last Name'));

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