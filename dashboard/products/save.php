<?php

require_once '../../includes/php/actions.php';

$received_data = $_POST;

// echo "<pre>";
// print_r($received_data);
// echo "</pre>";

$dbh = getDB();



$selectedColors = array();
if (isset($_POST['color']) && is_array($_POST['color'])) {
    foreach ($_POST['color'] as $colorID) {
        if (isset($_POST['amount'][$colorID]) && isset($_POST['price'][$colorID])) {
            $amount = $_POST['amount'][$colorID];
            $price = $_POST['price'][$colorID];
            $selectedColors[$colorID] = array(
                'amount' => $amount,
                'price' => $price
            );
        }
    }
}
// echo "<br><br><br>";
// echo "<pre>";
// print_r($selectedColors);
// echo "</pre>";


// insert into database


$product_name = $received_data['name'];
$product_description = $received_data['description'];
$product_category = $received_data['category'];
$product_brand = $received_data['brand'];
$product_delivery_cost = $received_data['delivery_cost'];

$dbh = getDB();

$stmt = $dbh->prepare("INSERT INTO product_groups (title, description, category, brand, delivery_costs) VALUES ('$product_name', '$product_description', '$product_category', '$product_brand', '$product_delivery_cost')");
if ($stmt->execute()) {
    $product_group_id = $dbh->lastInsertId();
    echo "Created Product group with ID: " . $product_group_id . "<br>";
    foreach ($selectedColors as $colorID => $color) {
        if (empty($color['price'])) {
            $color['price'] = 0.00;
        }
        $stmt = $dbh->prepare("INSERT INTO products (product_group, color, price) VALUES ('$product_group_id', '$colorID', '$color[price]')");
        if ($stmt->execute()) {
            $product_id = $dbh->lastInsertId();
            echo "Created Product with ID: " . $product_id . "<br>";

            // if stock empty, set to 0
            if (empty($color['amount'])) {
                $color['amount'] = 0;
            }
            $stmt = $dbh->prepare("INSERT INTO stock (product_id, stock) VALUES ('$product_id', '$color[amount]')");
            if ($stmt->execute()) {
                header("Location: ./");
                echo "Product saved successfully! <br><br>";
                exit;
            } else {
                echo "SQL Error: " . $stmt->errorInfo()[2]; // Print the SQL error message
                exit;
            }
            
        } else {
            echo "SQL Error: " . $stmt->errorInfo()[2]; // Print the SQL error message
            exit;
        }
    }
    









    
} else {
    echo "SQL Error: " . $stmt->errorInfo()[2]; // Print the SQL error message
    exit;
}