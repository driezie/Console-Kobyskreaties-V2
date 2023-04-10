<?php

$main_url = "http://localhost/Console-Kobyskreaties-V2/";

function getDB() {
    $host = "localhost";
    $dbname = "kobyskreaties";
    $user = "root";
    $pass = "";

    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

// Main function

// get function
function getFromDB($what = "*", $table = "users", $where = "1", $limit = "", $order_by = ""){
    try {
        $db = getDB();

        // If the $what is an array, we need to implode it with a comma.
        if (is_array($what)) {
            $what = implode(', ', $what);
        }

        // Add limit to query if it's provided
        $limit_clause = "";
        if ($limit !== "") {
            $limit_clause = "LIMIT $limit";
        }

        // Add order by to query if it's provided
        $order_by_clause = "";
        if ($order_by !== "") {
            $order_by_clause = "ORDER BY $order_by";
        }

        // query
        $sql = "SELECT $what FROM $table WHERE $where $order_by_clause $limit_clause";

        // prepare and execute query. Then fetch all the results and retype them as an array
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        echo 'Database gegevens ophalen error: ' . $e->getMessage();
    }
}


// delete function
function deleteFromDB($table, $where){
    try {
        $db = getDB();

        // query
        $sql = "DELETE FROM $table WHERE $where";

        // prepare and execute query. Then fetch all the results and retype them as an array
        $stmt = $db->prepare($sql);
        $stmt->execute();
    } catch (PDOException $e) {
        echo 'Database gegevens ophalen error: ' . $e->getMessage();
    }
}

// console log function
function console_log($data) {
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}




// Order functions

function getOrders($limit = "", $sort_by = "created_at", $sort_order = "DESC") {
    $orders = getFromDB("*", "orders", "1", $limit, "$sort_by $sort_order");
    return $orders;
}

function getOrder($id) {
    $order = getFromDB("*", "orders", "id = $id");
    return $order;
}

function getOrderTotalPrice($id) {
    try {
        $db = getDB();

        // Calculate the total price of all products bought
        $sql = "SELECT SUM(product_price * quantity) AS total FROM order_products WHERE order_id = $id";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    } catch (PDOException $e) {
        echo 'Database gegevens ophalen error: ' . $e->getMessage();
    }
}

function getOrdersByUser($id) {
    $orders = getFromDB("*", "orders", "user_id = $id");
    return $orders;
}

function deleteOrder($id) {
    deleteFromDB("orders", "id = $id");
}

// Customer functions

function getCustomers() {
    $customers = getFromDB("*", "users", "1");
    return $customers;
}

function getCustomer($id) {
    $customer = getFromDB("*", "customers", "id = $id");
    return $customer;
}

function getCustomerFromOrder($id) {
    $customer = getFromDB("*", "customers", "id = $id");
    return $customer;
}

function getOrdertotal($id) {
    $total = getOrderTotalPrice($id) + getHigestDeliveryCost($id);
    return $total;
}


// Product functions

function getProducts($limit = "", $sort_by = "date_created", $sort_order = "DESC") {
    $products = getFromDB("*", "products", "1", $limit, "$sort_by $sort_order");
    return $products;
}

function getProduct($id) {
    $product = getFromDB("*", "products", "id = $id");
    return $product;
}

function getProductsFromOrder($id) {
    $products = getFromDB("*", "order_products", "order_id = $id");
    return $products;
}

function printgetOrderStatus($id) {
    // Get the order status
    // show in  orange if "	Processing Payment"
    // show in  red if "	Processing Order"

    $order = getOrder($id);
    $status = $order[0]['status'];

    if ($status == "Processing Payment") {
        echo '<span class="badge text_orange">' . $status . '</span>';
    } else if ($status == "Processing Order") {
        echo '<span class="badge badge-danger">' . $status . '</span>';
    } else {
        echo '<span class="badge badge-success">' . $status . '</span>';
    }
}


// Delivery costs

function getDeliveryCosts() {
    $delivery_costs = getFromDB("*", "delivery_costs", "1");
    return $delivery_costs;
}


// Colors

function getColors() {
    $colors = getFromDB("*", "colors", "1");
    return $colors;
}


// Categories

function getCategories() {
    $categories = getFromDB("*", "categories", "1");
    return $categories;
}


// brands

function getbrands() {
    $subcategories = getFromDB("*", "brands", "1");
    return $subcategories;
}


// Extra functions

function getTotalPrice() {
    try {
        $db = getDB();

        // Calculate the total price of all products bought
        $sql = "SELECT SUM(product_price * quantity) AS total FROM order_products";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    } catch (PDOException $e) {
        echo 'Database gegevens ophalen error: ' . $e->getMessage();
    }
}

function convertDate($date) {
    $date = date("d F Y", strtotime($date));
    return $date;
}

function getHigestDeliveryCost($orderid) {
    $total = getOrderTotalPrice($orderid);
    if ($total > 30) {
        return 0;
    } else {
        $products = getProductsFromOrder($orderid);

        $highest_delivery_cost = 0;
        foreach ($products as $product) {
            if ($product['product_delivery_cost'] > $highest_delivery_cost) {
                $highest_delivery_cost = $product['product_delivery_cost'];
            }
        }
        return $highest_delivery_cost;
    }
}

function printGetHigestDeliveryCost($orderid) {
    $delivery_cost = getHigestDeliveryCost($orderid);
    if ($delivery_cost == 0) {
        echo "Gratis";
    } else {
        echo "€" . formatPrice($delivery_cost);
    }
}

function printGetOrderTotalPrice($orderid) {
    // formatPrice(getOrderTotalPrice($order[0]['id']) + getHigestDeliveryCost($order[0]['id']))
    echo "€" . formatPrice(getOrderTotalPrice($orderid) + getHigestDeliveryCost($orderid));
}

function formatPrice($price) {
    $price = number_format($price, 2, ',', '.');
    return $price;
}



// console dbh connection
$dbh = getDB();
echo "<script>console.log('dbh connection made');</script>";

?>