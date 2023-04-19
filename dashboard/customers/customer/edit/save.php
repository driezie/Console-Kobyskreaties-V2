<?php

require_once '../../../../includes/php/actions.php';

// posts
$recieved_data = $_POST;

$customer_id = $_GET['id'];
// gets


echo "<pre>";
print_r($recieved_data);
echo "</pre>";

$dbh = getDB();

$first_name = $recieved_data['first_name'];
$last_name = $recieved_data['last_name'];
$email = $recieved_data['email'];
$phonenumber = $recieved_data['phonenumber'];
$street_name = $recieved_data['street_name'];
$house_number = $recieved_data['house_number'];
$city = $recieved_data['city'];
$postal = $recieved_data['postal'];
$country = $recieved_data['country'];

$stmt = $dbh->prepare("UPDATE customers SET first_name = :first_name, last_name = :last_name, email = :email, phonenumber = :phonenumber, street_name = :street_name, house_number = :house_number, city = :city, postal = :postal, country = :country WHERE id = :customer_id");
$stmt->bindParam(':first_name', $first_name);
$stmt->bindParam(':last_name', $last_name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':phonenumber', $phonenumber);
$stmt->bindParam(':street_name', $street_name);
$stmt->bindParam(':house_number', $house_number);
$stmt->bindParam(':city', $city);
$stmt->bindParam(':postal', $postal);
$stmt->bindParam(':country', $country);
$stmt->bindParam(':customer_id', $customer_id);

$stmt->execute();

header("Location: ../?id=$customer_id");

?>