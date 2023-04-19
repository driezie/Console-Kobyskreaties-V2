<?php require_once '../../includes/php/actions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= $main_url ?>includes/css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellingen - kobyskreaties</title>
    <!-- link icon -->
    <link rel="icon" href="https://cdn.discordapp.com/attachments/1021413861552828466/1025313412869259284/removal.ai_edf5bed7-5483-4b32-aa6f-cc6da03ce279.png" type="image/x-icon" />
</head>

<body>

    <body class="">
        <div id="loading">
            <div id="loading-center"></div>
        </div>
        <!-- Main Sidebar -->
        <?php include_once '../../includes/php/createSidebar.php'; ?>

        <div class="data-overview">
            <!-- Navbar -->
            <?php include_once '../../includes/php/createNavbar.php'; ?>

            <!-- Header -->
            <?php
            $bannerArray = array(
                'subtitle' => 'Hieronder vind u een overzicht van alle bestellingen. Als u een nieuwe bestelling wilt plaatsen, moet u helaas naar de website gaan. Dit feature komt later.',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard'),
                    array('title' => 'Bestellingen'),
                )
            );
                        
            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>
            <!-- Content -->
            <div class="p-3 pt-6 flex justify-between items-center">
                <div class="flex items-left flex-col">
                    <h2 class="text-2xl font-medium textcolor-3">
                        Mijn bestellingen
                    </h2>
                </div>
                <!-- <div class="flex">
                    <a href="<?= $main_url ?>dashboard/orders/new.php" class="btn btn-primary bgcolor-3 text-white hover:bgcolor-2 p-2 rounded-md"><i class="fa-solid fa-plus pr-2"></i></i>Nieuwe bestelling</a>
                </div> -->
            </div>
            <div class="grid grid-rows-3 grid-flow-col gap-4">
                <div class="row-span-3 m-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <?= createSearch("Zoeken naar bestellingen") ?>
                        <table class="table-auto w-full" id="tableBody" data-label="orderFilters">
                            <?= showItemsFilter() ?>

                            <thead class="border-b border-gray-200">
                                <?php
                                $titles = array(
                                    "Order nummer",
                                    "Totale prijs",
                                    "Klant",
                                    "Status",
                                    "Datum",
                                    "Actiesssss"
                                );
                                ?>
                                <tr><?php foreach ($titles as $title) { ?><th><?= $title ?></th><?php } ?></tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach (getOrders(10) as $item) {
                                    $customer = getCustomer($item['customer_id'])[0];
                                ?>
                                    <tr>
                                        <!-- Bestelling ID: <?= $item['id'] ?> -->
                                        <td><a href="<?= $main_url ?>dashboard/orders/order/?id=<?= $item['id'] ?>" class="text-blue-500 hover:text-blue-600"><?= $item['id'] ?></a></td>
                                        <td><?= printGetOrderTotalPrice($item['id']) ?></td>
                                        <td><a href="<?= $main_url ?>dashboard/customers/customer/?id=<?= $customer['id'] ?>" class="text-blue-500 hover:text-blue-600"><?= $customer['first_name'] . ' ' . $customer['last_name'] ?></a>
                                        <td><?= convertStatus($item['status'], $statusses) ?></td>
                                        <td><?= convertDate($item['created_at']) ?></td>
                                        <td><a href="<?= $main_url ?>dashboard/orders/order/?id=<?= $item['id'] ?>" class="text-blue-500 hover:text-blue-700">Bekijken</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/searchinput.js" type="text/javascript"></script>
    </body>

</html>