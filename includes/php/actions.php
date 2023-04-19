<?php

$main_url = "http://localhost/Console-Kobyskreaties-V2/";
$main_title = "Welkom terug, Jelte Cost 🙌✨";
$navbar_account_name = "Jelte Cost";

function getDB() {
    $host = "localhost";
    $dbname = "kobyskreaties";
    $user = "root";
    $pass = "";

    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}

$statusses = array(
    "1" => "In behandeling",
    "2" => "Verzonden",
    "3" => "Afgeleverd",
    "4" => "Geannuleerd",
    "5" => "Vertraagd",
    "6" => "Retour opgestuurd",
    "7" => "Retour ontvangen",
);



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

function getProductsFromOrder($id) {
    $products = getFromDB("*", "order_products", "order_id = $id");
    return $products;
}

// Customer functions

function getCustomers() {
    $customers = getFromDB("*", "customers", "1");
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

function getOrdersFromCustomer($id) {
    $orders = getFromDB("*", "orders", "customer_id = $id");
    return $orders;
}


// Product functions

function getProducts() {
    // try 
    $db = getDB();
    $sql = 'SELECT 
    PG.id AS "id",
    PG.title AS "product_title",
    br.title AS "product_brand",
    ca.title as "product_categorie",
    PG.banner AS "product_banner"
    
    FROM product_groups PG
        LEFT JOIN brands br ON PG.brand = br.id
        LEFT JOIN categories ca ON PG.category = ca.id';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $product;
}


function getProductsAmount() {
    $db = getDB();
    $sql = "SELECT * FROM products";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getProduct($id) {
    $db = getDB();
    $sql = 'SELECT 
    PG.id AS "id",
    PG.title AS "product_title",
    br.title AS "product_brand",
    ca.title as "product_categorie",
    PG.banner AS "product_banner",
    PG.created_at AS "created_at"
    FROM product_groups PG
        LEFT JOIN brands br ON PG.brand = br.id
        LEFT JOIN categories ca ON PG.category = ca.id WHERE PG.id = :id';
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $product;
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

// stock 
function getStock(){
    $db = getDB();
    $sql = 'SELECT stock.*, products.* FROM stock
    LEFT JOIN products ON stock.product_group_id = products.product_group AND stock.color = products.color AND stock.size = products.size';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $stock = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $stock;
}

// get sizes
function getSizes() {
    $sizes = getFromDB("*", "sizes", "1");
    return $sizes;
}

// Extra functions

function getColorTitle($id) {
    $colors = getColors();
    foreach ($colors as $color) {
        if ($color['id'] == $id) {
            return $color['title'];
        }
    }
}

// get size title
function getSizeTitle($id) {
    $sizes = getSizes();
    foreach ($sizes as $size) {
        if ($size['id'] == $id) {
            return $size['title'];
        }
    }
}

function getTotalPrice() {
    try {
        $db = getDB();

        // Calculate the total price of all products bought for orders with status not 4, 6 or 7
        $sql = "SELECT SUM(product_price * quantity) AS total FROM order_products 
                INNER JOIN orders ON order_products.order_id = orders.id
                WHERE orders.status NOT IN (4, 6, 7)";

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
function convertStatus($status, $array) {
    if (isset($array[$status])) { // Check if the status code exists in the array
        return $array[$status]; // Return the corresponding description
    } else {
        return "Unknown status"; // Return a default value if status code is not found in the array
    }
}

function createSearch($placeholder){
    echo '<div class="relative">
    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
        <i class="fa-solid fa-search text-gray-400"></i>
    </div>
    <input type="search" id="searchInput" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="' .$placeholder. '" required>
    </div>' ;
    
}

function showItemsFilter(){
    echo '<caption class="text-sm italic px-2 py-2">
    Aantal items: <span class="text-gray-500" id="itemCount"></span>
    </caption>';
}


function createBanner($array, $main_title, $main_url) {
    $title = $main_title;
    $subtitle = isset($array['subtitle']) ? $array['subtitle'] : '';
    $image = isset($array['image']) ? $array['image'] : '';
    $breadcrumb = isset($array['breadcrumb']) ? $array['breadcrumb'] : array();
    $notify_enabled = isset($array['notify_enabled']) ? $array['notify_enabled'] : false;
    $notify_small_text = isset($array['notify_small_text']) ? $array['notify_small_text'] : '';
    $notify_text = isset($array['notify_text']) ? $array['notify_text'] : '';

    $banner = '<div class="p-5" style="background-image: url(' . $image . '); background-size: cover; background-position: center; background-repeat: no-repeat;">';
    $banner .= '<nav class="flex items-center text-gray-400 text-sm my-3">';
    for ($i = 0; $i < count($breadcrumb); $i++) {
        $title = isset($breadcrumb[$i]['title']) ? $breadcrumb[$i]['title'] : '';
        $url = isset($breadcrumb[$i]['url']) ? $breadcrumb[$i]['url'] : '';
        if ($i === count($breadcrumb) - 1) {
            $banner .= '<span class="mx-2 select-none text-white">' . $title . '</span>';
        } else {
            $banner .= '<a href="'.$main_url . $url . '" class="hover:text-gray-300">' . $title . '</a>';
            $banner .= '<span class="mx-2 select-none">/</span>';
        }
    }
    $banner .= '</nav>';
    if ($notify_enabled) {
        $banner .= '<h2 class="text-4xl font-medium text-white">' . $main_title . '</h2>';
        $banner .= '<p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">' . $subtitle . '</p>';
        $banner .= '<a href="'.$main_url.'dashboard/orders/" class="">';
        $banner .= '<div class="p-2 bgcolor-3 items-center text-indigo-100 leading-none rounded-full flex inline-flex alert pr-3" role="alert">';
        $banner .= '<span class="flex rounded-full bgcolor-1 uppercase px-2 py-1 text-xs font-bold mr-3 new-animation">' . $notify_small_text . '</span>';
        $banner .= '<span class="font-semibold mr-2 text-left flex-auto text-white">' . $notify_text . '</span>';
        $banner .= '<i class="fa-solid fa-chevron-right"></i>';
        $banner .= '</div>';
        $banner .= '</a>';
    } else {
        $banner .= '<h2 class="text-4xl font-medium text-white">' . $main_title . '</h2>';
        $banner .= '<p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">' . $subtitle . '</p>';
    }
    $banner .= '</div>';

    return $banner;
}

function createFormTitle($title){
    echo '<div class="flex justify-between py-1">';
    echo '<h2 class="text-xl font-medium textcolor-3">'.$title.'</h2>';
    echo '</div>';
}


function createInput($label, $placeholder, $name, $type, $ifrequired, $value = ''){
    echo '<div class="flex justify-between pt-2 flex-col">';
    if (!empty($label)) {
        echo '<p class="text-sm text-gray-500 pb-1">' . $label . ': </p>';
    }
    echo '</div>';    
    echo '<div class="flex justify-between py-1 flex-col">';
    echo '<input type="' . $type . '" name="' . $name . '" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="' . $placeholder . '"';
    if (!empty($value)) {
        echo 'value="' . $value . '" ';
    }
    if($ifrequired) {
        echo ' required';
    }
    echo '>';
    echo '</div>';
}

function createSaveFormButton($title){
    echo '<button type="submit" name="submit" class="btn btn-primary text-white p-2 rounded-md bg-green-600 hover:bg-green-700"><i class="fa-solid fa-floppy-disk pr-2"></i>'.$title.'</button>';

}

function createBackButton($title, $href){
    return '<a href="'.$href.'" class="btn btn-primary textcolor-3 hover:bgcolor-3 p-2 rounded-md mr-2 border border-gray-500"><i class="fa-solid fa-arrow-left pr-2"></i>'.$title.'</a>';
}





// console dbh connection
$dbh = getDB();
echo "<script>console.debug('Er is een succesvolle dataverbinding');</script>";
echo "<script>console.debug('Database: " . $dbh->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "');</script>";
