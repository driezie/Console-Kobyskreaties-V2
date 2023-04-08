<?php require_once '../includes/php/actions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php $main_url = "http://localhost/projecten/Console-Kobyskreaties-V2/";?>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?=$main_url?>includes/css/style.css" rel="stylesheet" type="text/css" />
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
        <div class="p-5" style="background-image: url(https://console.kobyskreaties.nl/dashboard/images/products/banner2.png); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <nav class="flex items-center text-gray-400 text-sm my-3">
                <a href="#" class="hover:text-gray-300">Dashboard</a>
                <span class="mx-2 select-none">/</span>
            </nav>

            <h2 class="text-4xl font-medium text-white">Welkom terug, Jelte Cost 🙌✨</h2>
            <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                Hieronder vind je een overzicht van alle bestellingen. Je kan de bestellingen bewerken en verwijderen. Ook kan je via deze dashboard zien hoeveel bestellingen er zijn, hoeveel geld er is verdiend, hoeveel producten er zijn en hoeveel klanten er zijn.
            </p>
            <a href="<?=$main_url?>dashboard/orders/" class="">
                <div class="p-2 bgcolor-3 items-center text-indigo-100 leading-none rounded-full flex inline-flex alert pr-3" role="alert">
                    <span class="flex rounded-full bgcolor-1 uppercase px-2 py-1 text-xs font-bold mr-3 new-animation">NIEUW</span>
                    <!-- bg-indigo-500 -->
                    <span class="font-semibold mr-2 text-left flex-auto text-white">Bestellingen zijn eindelijk aanpasbaar 🥳</span>
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </a>
        </div>

        <!-- Content -->
        <div class="p-3 pt-6">
            <h2 class="text-2xl font-medium textcolor-3">Mijn Dashboard</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-2 p-3">
            <div class="row-span-2">
                <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                <p class="text-sm font-medium text-gray-500">Omzet</p>
                    <p class="euro-animation text-3xl font-medium" data-label="<?= getTotalPrice() ?>">€<?= getTotalPrice() ?></p>
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
                    <p class="amount-animate text-3xl font-medium" data-label="<?= count(getProducts()) ?>"></p>
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
                                <th>Datum & Tijd</th>
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
                                    <td><a href="<?=$main_url?>dashboard/orders/order/?id=<?= $order['id'] ?>" class="text-blue-500 hover:text-blue-600"><?= $order['id'] ?></a></td>
                                    <td><?= $customer['first_name'] . ' ' . $customer['last_name'] ?></td>
                                    <td><?= convertDate($order['created_at']) ?></td>
                                    <td>€<?= getOrderTotalPrice($order['id']) ?></td>
                                    <td><a href="<?=$main_url?>dashboard/orders/order/?id=<?= $order['id'] ?>" class="text-blue-500 hover:text-blue-700">Bekijken</a></td>
                                </tr>
                            <?php } ?>   
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>   
        <script src="<?=$main_url?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/19.0.0/tween.umd.js"></script>
        <script src="<?=$main_url?>includes/js/numberAnimation.js" type="text/javascript"></script>
        <script src="<?=$main_url?>includes/js/main.js" type="text/javascript"></script>
</body>
</html>



