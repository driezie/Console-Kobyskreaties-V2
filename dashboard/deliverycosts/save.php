<?php

require_once '../../includes/php/actions.php';

$received_data = $_POST;

echo "<pre>";
print_r($received_data);
echo "</pre>";

$dbh = getDB();

$delivery_cost = $received_data['deliverycosts'];
$country = "Netherlands";

// insert into database

$stmt = $dbh->prepare("INSERT INTO delivery_costs (country, title) VALUES ('$country', '$delivery_cost')");


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
