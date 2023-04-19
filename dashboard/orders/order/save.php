<?php

require_once '../../../includes/php/actions.php';

// posts
$recieved_data = $_POST;

$order_id = $_GET['id'];
// gets


// echo "<pre>";
// print_r($recieved_data);
// echo "</pre>";

$dbh = getDB();

$status = $recieved_data['status'];

// echo $status;

$stmt = $dbh->prepare("UPDATE orders SET status = :status WHERE id = :order_id");
$stmt->bindParam(':status', $status);
$stmt->bindParam(':order_id', $order_id);

$stmt->execute();


// echo "Order Updated";

header("Location: ./?id=$order_id");

?>