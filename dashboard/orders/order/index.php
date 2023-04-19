<?php require_once '../../../includes/php/actions.php';
$orderId = $_GET['id'];
$order = getOrder($orderId);
$orderid = $order[0]['id'];
$customer = getCustomerFromorder($order[0]['customer_id'])[0];
$products = getProductsFromOrder($orderId);

// console_log($order);
// console_log($customer);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= $main_url ?>includes/css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - kobyskreaties</title>
    <!-- link icon -->
    <link rel="icon" href="https://cdn.discordapp.com/attachments/1021413861552828466/1025313412869259284/removal.ai_edf5bed7-5483-4b32-aa6f-cc6da03ce279.png" type="image/x-icon" />
</head>

<body>

    <body class="">
        <div id="loading">
            <div id="loading-center"></div>
        </div>
        <!-- Main Sidebar -->
        <?php include_once '../../../includes/php/createSidebar.php'; ?>

        <div class="data-overview">
            <!-- Navbar -->
            <?php include_once '../../../includes/php/createNavbar.php'; ?>

            <!-- Header -->
            <?php
            $bannerArray = array(
                'subtitle' => 'U ben nu de bestelling aan het bekijken.',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard'),
                    array('title' => 'Bestellingen', 'url' => 'dashboard/orders'),
                    array('title' => 'Bestelling #' . $orderId),
                )
            );
                        
            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>

            <!-- Content -->
            <div class="p-3 pt-6">
                <h2 class="text-2xl font-medium textcolor-3">
                    Bestelling #<?= $orderId ?>
                </h2>
                <p class="text-sm text-gray-500 italic">Besteld op: <?= convertDate($order[0]['created_at']) ?></p>
            </div>
            <div class="grid grid-cols-3">
                <div class="col-span-2 m-2">
                    <div class="p-3 bg-white shadow-md rounded-md card">
                        <div class="grid grid-cols-2 gap-1">
                            <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Klant informatie</h2>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Naam: </p>
                                    <p class="text-sm text-gray-500"><b><a href="<?= $main_url ?>dashboard/customers/customer?id=<?= $customer['id'] ?>" class="text-gray-500 hover:text-gray-400"><?= $customer['first_name'] ?> <?= $customer['last_name'] ?></a></b>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Email: </p>
                                    <p class="text-sm text-gray-500"><?= $customer['email'] ?></p>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Telefoonnummer: </p>
                                    <p class="text-sm text-gray-500"><?= $customer['phonenumber'] ?></p>
                                </div>
                            </div>
                            <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Bezorgings informatie</h2>
                                </div>

                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Adres: </p>
                                    <p class="text-sm text-gray-500 text-right"><b><a href="https://www.google.com/maps/place/<?= $customer['street_name'] ?>+<?= $customer['house_number'] ?>+<?= $customer['city'] ?>" target="_blank" class="text-gray-500 hover:text-gray-400"><?= $customer['street_name'] ?> <?= $customer['house_number'] ?>, <?= $customer['city'] ?></a></b>
                                </div>

                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Postcode: </p>
                                    <p class="text-sm text-gray-500"><?= $customer['postal'] ?></p>
                                </div>

                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Land: </p>
                                    <p class="text-sm text-gray-500"><?= $customer['country'] ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between m-2">
                            <h2 class="text-xl font-medium textcolor-3">Producten</h2>
                        </div>

                        <div class="grid grid-cols-3 gap-1">
                            <?php foreach ($products as $product) : ?>
                                <!-- product <?= $product['id'] ?> -->
                                <div class="col-span-3 m-2 bg-gray-100 p-3 rounded-md">
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">
                                            <?= $product['product_title'] . " - " . $product['product_color'] ?>
                                    </div>
                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Prijs: </p>
                                        <p class="text-sm text-gray-500">€<?= formatPrice($product['product_price']) ?></p>
                                    </div>

                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Aantal: </p>
                                        <p class="text-sm text-gray-500"><?= $product['quantity'] ?></p>
                                    </div>

                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Maat: </p>
                                        <p class="text-sm text-gray-500"><?= $product['product_size'] ?></p>
                                    </div>

                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Merk: </p>
                                        <p class="text-sm text-gray-500"><?= $product['product_brand'] ?></p>
                                    </div>

                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Categorie: </p>
                                        <p class="text-sm text-gray-500"><?= $product['product_category'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="w-full h-0.5 bg-gray-300 my-2 m-2"></div>
                        <div class="flex justify-between py-1 mx-2">
                            <h2 class="text-xl font-medium textcolor-3">Prijs Informatie</h2>
                        </div>
                        <div class="flex justify-between py-1 mx-2">
                            <p class="text-sm text-gray-500">Subtotaal: </p>
                            <p class="text-sm text-gray-500">€<?= formatPrice(getOrderTotalPrice($orderid)) ?></p>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <p class="text-sm text-gray-500">Verzendkosten: </p>
                            <p class="text-sm text-gray-500"><?= printGetHigestDeliveryCost($orderid) ?></p>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <div class="w-full h-0.5 bg-gray-300 my-2"></div>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <p class="text-sm text-gray-500"><b>Totaal: </b></p>
                            <p class="text-sm text-gray-500"><b><?= printGetOrderTotalPrice($orderid) ?></b></p>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 m-2">
                    <div class="p-3 bg-white shadow-md rounded-md card">
                        <div class="flex justify-between py-1 mx-2">
                            <h2 class="text-xl font-medium textcolor-3">Prijs Informatie</h2>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <div class="w-full h-0.5 bg-gray-300 my-2"></div>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <p class="text-sm text-gray-500">Subtotaal: </p>
                            <p class="text-sm text-gray-500">€<?= formatPrice(getOrderTotalPrice($orderid)) ?></p>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <p class="text-sm text-gray-500">Verzendkosten: </p>
                            <p class="text-sm text-gray-500"><?= printGetHigestDeliveryCost($orderid) ?></p>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <div class="w-full h-0.5 bg-gray-300 my-2"></div>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <p class="text-sm text-gray-500"><b>Totaal: </b></p>
                            <p class="text-sm text-gray-500"><b><?= printGetOrderTotalPrice($orderid) ?></b></p>
                        </div>
                    </div>

                    <div class="p-3 bg-white shadow-md rounded-md card mt-4">
                        <div class="flex justify-between py-1 mx-2">
                            <h2 class="text-xl font-medium textcolor-3">Bezorgings Status</h2>
                        </div>

                        <div class="flex justify-between py-1 mx-2">
                            <div class="w-full h-0.5 bg-gray-300 my-2"></div>
                        </div>
                        <form action="save.php?id=<?= $orderid ?>" method="post" id="statusForm">
                            <div class="flex justify-between py-1 mx-2 items-center">
                                <p class="text-sm text-gray-500">Status: </p>
                                <p class="text-sm text-gray-500">
                                    <select data-te-select-init class="p-2 form-select block w-full text-gray-500 border border-gray-300 rounded-md" name="status" id="status">
                                        
                                        <?php foreach ($statusses as $key => $status) : ?>
                                            <option value="<?= $key ?>" <?= $key == $order[0]['status'] ? "selected" : "" ?>><?= $status ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </p>
                            </div>
                        </form>

                        <script>
                            document.getElementById("status").addEventListener("change", function() {
                                document.getElementById("statusForm").submit();
                            });
                        </script>


                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
    </body>

</html>