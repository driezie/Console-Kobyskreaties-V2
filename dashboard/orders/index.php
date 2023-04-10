<?php require_once '../../includes/php/actions.php'; ?>
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
        <?php include_once '../../includes/php/createSidebar.php'; ?>

        <div class="data-overview">
            <!-- Navbar -->
            <?php include_once '../../includes/php/createNavbar.php'; ?>

            <!-- Header -->
            <div class="p-5" style="background-image: url(https://console.kobyskreaties.nl/dashboard/images/products/banner2.png); background-size: cover; background-position: center; background-repeat: no-repeat;">

                <nav class="flex items-center text-gray-400 text-sm my-3">
                    <a href="<?= $main_url ?>dashboard/" class="hover:text-gray-300">Dashboard</a>
                    <span class="mx-2 select-none">/</span>
                    <a href="" class="text-white hover:text-gray-300">Bestellingen</a>
                </nav>

                <h2 class="text-4xl font-medium text-white">Welkom terug, Jelte Cost 🙌✨</h2>
                <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                    Hieronder vind je een overzicht van alle bestellingen. Je kan de bestellingen bewerken en verwijderen.
                </p>
            </div>

            <!-- Content -->
            <div class="p-3 pt-6">
                <h2 class="text-2xl font-medium textcolor-3">Mijn Bestellingen</h2>
            </div>

            <div class="grid grid-rows-3 grid-flow-col gap-4">
                <div class="row-span-3 m-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <div class="relative">
                            <input type="text" class="block w-full p-2 text-sm text-gray-900 border rounded-lg" placeholder="Search..." id="searchInput">
                            <button class="absolute right-0 top-0 h-full px-4 py-2 text-sm text-white bgcolor-3 rounded-r-lg" id="filterButton">Filter</button>
                            <div class="absolute z-10 hidden w-full mt-2 overflow-auto bg-white rounded-lg shadow-lg max-h-60" id="filterDropdown">
                                <div class="px-4 py-2 border-b">Filter door:</div>
                                <div class="px-4 py-2">
                                    <input type="checkbox" id="nameCheckbox" value="1" checked>
                                    <label for="nameCheckbox" class="ml-2">Order nummer</label>
                                </div>
                                <div class="px-4 py-2">
                                    <input type="checkbox" id="nameCheckbox" value="2" checked>
                                    <label for="nameCheckbox" class="ml-2">Totale prijs</label>
                                </div>

                                <div class="px-4 py-2">
                                    <input type="checkbox" id="nameCheckbox" value="3" checked>
                                    <label for="nameCheckbox" class="ml-2">Klant</label>
                                </div>
                                <div class="px-4 py-2">
                                    <input type="checkbox" id="nameCheckbox" value="4" checked>
                                    <label for="nameCheckbox" class="ml-2">Status</label>
                                </div>
                                <div class="px-4 py-2">
                                    <input type="checkbox" id="nameCheckbox" value="5" checked>
                                    <label for="nameCheckbox" class="ml-2">Datum & Tijd</label>
                                </div>

                            </div>
                        </div>


                        <table class="table-auto w-full" id="tableBody" data-label="orderFilters">
                            <caption class="text-sm italic px-2 py-2">
                                Aantal items: <span class="text-gray-500" id="itemCount"></span>
                            </caption>
                            <thead class="border-b border-gray-200">
                                <tr>
                                    <th>Order nummer</th>
                                    <th>Totale prijs</th>
                                    <th>Klant</th>
                                    <th>Status</th>
                                    <th>Datum & Tijd</th>
                                    <th>Acties</th>
                                </tr>
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
                                        <td><?= printgetOrderStatus($item['id']) ?></td>
                                        <td><?= convertDate($item['created_at']) ?></td>
                                        <td><a href="<?= $main_url ?>dashboard/orders/order/?id=<?= $item['id'] ?>" class="text-blue-500 hover:text-blue-700">Bekijken</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script>



</script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/searchinputv2.js" type="text/javascript"></script>

    </body>

</html>