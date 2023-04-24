<?php

require_once '../../includes/php/actions.php';

$received_data = $_GET;

echo "<pre>";
print_r($received_data);
echo "</pre>";

$dbh = getDB();

$id = $received_data['id'];


// insert into database

$stmt = $dbh->prepare("DELETE FROM delivery_costs WHERE id = '$id'");

// execute but error if not, and send the sql
if ($stmt->execute()) {
    echo "SQL Statement: " . $stmt->queryString . "<br>"; // Print the SQL statement
    header("Location: ./");
    exit;
} else {
    echo "SQL Error: " . $stmt->errorInfo()[2]; // Print the SQL error message
    exit;
}
?>
