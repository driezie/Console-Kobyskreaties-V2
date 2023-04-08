<?php
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

        // make the $result['total']; with a comma and 2 decimals
        $total = number_format($result['total'], 2, ',', '.');
        return $total;
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





// Extra functions

function getTotalPrice() {
    try {
        $db = getDB();

        // Calculate the total price of all products bought
        $sql = "SELECT SUM(product_price * quantity) AS total FROM order_products";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // make the $result['total']; with a comma and 2 decimals
        $total = number_format($result['total'], 2, ',', '.');
        return $total;
    } catch (PDOException $e) {
        echo 'Database gegevens ophalen error: ' . $e->getMessage();
    }
}

function convertDate($date) {
    // convert naar dag maan_naam jaar in nederlands
    $date = date("d F Y", strtotime($date));
    return $date;
}




// console dbh connection
$dbh = getDB();
echo "<script>console.log('dbh connection made');</script>";

?>