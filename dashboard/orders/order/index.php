<?php require_once '../../../includes/php/actions.php';
$orderId = $_GET['id'];
$order = getOrder($orderId);
$orderid = $order[0]['id'];
$customer = getCustomerFromorder($order[0]['customer_id'])[0];
$products = getProductsFromOrder($orderId);

console_log($order);
console_log($customer);
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
            <div class="p-5" style="background-image: url(https://console.kobyskreaties.nl/dashboard/images/products/banner2.png); background-size: cover; background-position: center; background-repeat: no-repeat;">

                <nav class="flex items-center text-gray-400 text-sm my-3">
                    <a href="<?= $main_url ?>dashboard/" class="hover:text-gray-300">Dashboard</a>
                    <span class="mx-2 select-none">/</span>
                    <a href="<?= $main_url ?>dashboard/orders" class="hover:text-gray-300">Bestellingen</a>
                    <span class="mx-2 select-none">/</span>
                    <a href="" class="text-white hover:text-gray-300"><?= $orderId ?></a>
                </nav>

                <h2 class="text-4xl font-medium text-white">Welkom terug, Jelte Cost 🙌✨</h2>
                <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                    Hieronder vind je een overzicht van de bestellingen van <?= $orderId ?> gemaakt door
                    <a href="<?= $main_url ?>dashboard/customers/customer?id=<?= $customer['id'] ?>" class="text-white hover:text-gray-300">
                        <?= $customer['first_name'] ?> <?= $customer['last_name'] ?>.
                    </a>
                </p>
            </div>

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
                                            <a href="https://www.kobyskreaties.nl/product/?id=<?= $product['id'] ?>" class="text-gray-500 hover:text-gray-400" target="_blank">
                                                <?= $product['product_title'] ." - ". $product['product_color'] ?>
                                            </a>
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

                        <div class="flex justify-between py-1 mx-2">
                            <p class="text-sm text-gray-500">Status: </p>
                            <p class="text-sm text-gray-500">
                                <select data-te-select-init class="form-select block w-full text-gray-500 border border-gray-300 rounded-md" name="status" id="status">
                                    <option value="1"><?= $order[0]['status'] ?></option>
                                </select>

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
    </body>
</html>