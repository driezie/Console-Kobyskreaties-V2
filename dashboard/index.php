<?php require_once '../includes/php/actions.php'; ?>
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
        <?php include_once '../includes/php/createSidebar.php'; ?>

        <div class="data-overview">
            <!-- Navbar -->
            <?php include_once '../includes/php/createNavbar.php'; ?>

            <!-- Header -->
            <?php
            $bannerArray = array(
                'subtitle' => 'Welkom op jouw dashboard! Hier vind je een overzicht van jouw gegevens en de gegevens van jouw bedrijf.',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard')

                ),
                'notify_enabled' => false,
                'notify_small_text' => '',
                'notify_text' => ''
            );

            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>
            <!-- Content -->
            <div class="p-3 pt-6">
                <h2 class="text-2xl font-medium textcolor-3">Mijn Dashboard</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-2 p-3">
                <div class="row-span-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <p class="text-sm font-medium text-gray-500">Omzet</p>
                        <p class="euro-animation text-3xl font-medium" data-label="<?= getTotalPrice() ?>"><?= formatPrice(getTotalPrice()) ?></p>
                        <?= console_log(getTotalPrice()) ?>
                    </div>
                </div>
                <div class="row-span-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <p class="text-sm font-medium text-gray-500">Bestellingen</p>
                        <p class="amount-animate text-3xl font-medium" data-label="<?= getFromDB("COUNT(*)", "orders")[0]['COUNT(*)'] ?>"></p>
                    </div>
                </div>
                <div class="row-span-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <p class="text-sm font-medium text-gray-500">Aantal klanten</p>
                        <p class="amount-animate text-3xl font-medium" data-label="<?= getFromDB("COUNT(*)", "customers")[0]['COUNT(*)'] ?>"></p>
                    </div>
                </div>
                <div class="row-span-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <p class="text-sm font-medium text-gray-500">Aantal producten</p>
                        <p class="amount-animate text-3xl font-medium" data-label="<?= count(getProductsAmount()) ?>"></p>
                    </div>
                </div>
            </div>
            <div class="grid grid-rows-3 grid-flow-col gap-4">
                <div class="row-span-3 m-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <table class="table-auto w-full">
                            <caption class="text-sm italic px-2 py-2">
                                10 Bestellingen van de laatste 7 dagen
                            </caption>
                            <thead class="border-b border-gray-200">
                                <tr>
                                    <th>Order nummer</th>
                                    <th>Klant</th>
                                    <th>Datum</th>

                                    <th>Status</th>
                                    <th>Totale Prijs</th>

                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (getOrders(10) as $order) {
                                    $customer = getCustomer($order['customer_id'])[0];
                                    // console_log($customer);
                                ?>
                                    <tr>
                                        <td><a href="<?= $main_url ?>dashboard/orders/order/?id=<?= $order['id'] ?>" class="text-blue-500 hover:text-blue-600"><?= $order['id'] ?></a></td>
                                        <td><a href="<?= $main_url ?>dashboard/customers/customer/?id=<?= $customer['id'] ?>" class="text-blue-500 hover:text-blue-600"><?= $customer['first_name'] . ' ' . $customer['last_name'] ?></a>
                                        <td><?= convertDate($order['created_at']) ?></td>
                                        <td><?= convertStatus($order['status'], $statusses) ?></td>
                                        <td><?= printGetOrderTotalPrice($order['id']) ?></td>
                                        <td><a href="<?= $main_url ?>dashboard/orders/order/?id=<?= $order['id'] ?>" class="text-blue-500 hover:text-blue-700">Bekijken</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/19.0.0/tween.umd.js"></script>
            <script src="<?= $main_url ?>includes/js/numberAnimation.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
    </body>

</html>