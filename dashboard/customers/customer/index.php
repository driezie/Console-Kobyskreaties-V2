<?php require_once '../../../includes/php/actions.php';
$customerid = $_GET['id'];
$customer = getCustomer($customerid);

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
                    <a href="<?= $main_url ?>dashboard/customers" class="hover:text-gray-300">Klanten</a>
                    <span class="mx-2 select-none">/</span>
                    <a href="" class="text-white hover:text-gray-300">Klant <?= $customer[0]['id'] ?></a>
                </nav>

                <h2 class="text-4xl font-medium text-white"><?=$main_title?></h2>
                <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                    Hier vind u de gegevens van <?= $customer[0]['first_name'] . " " . $customer[0]['last_name'] ?>
                </p>
            </div>

            <!-- Content -->


            <div class="p-3 pt-6 flex justify-between items-center">
                <!-- under each other -->
                <div class="flex items-left flex-col" >

                    <h2 class="text-2xl font-medium textcolor-3">
                        Klant: <?= $customer[0]['first_name'] . " " . $customer[0]['last_name'] ?>
                    </h2>
                    <p class="text-sm text-gray-500 italic">Account aangemaakt op: <?= convertDate($customer[0]['created_at']) ?></p>
                </div>
                <div class= "flex">
                <?= createBackButton('Terug', $main_url . 'dashboard/products/') ?>

                    <a href="<?= $main_url ?>dashboard/customers/customer/edit?id=<?= $customer[0]['id'] ?>" class="btn btn-primary bgcolor-3 text-white hover:bgcolor-2 p-2 rounded-md"><i class="fa-solid fa-pen-to-square pr-2"></i></i>Bewerken</a>
                </div>

            </div>
            <div class="grid grid-cols-1">
                <div class="col-span-1 m-2">
                    <div class="p-3 bg-white shadow-md rounded-md card">
                        <div class="grid grid-cols-2 gap-1">
                            <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Klant informatie</h2>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Naam: </p>
                                    <p class="text-sm text-gray-500"><b><a href="<?= $main_url ?>dashboard/customers/customer?id=<?= $customer[0]['id'] ?>" class="text-gray-500 hover:text-gray-400"><?= $customer[0]['first_name'] ?> <?= $customer[0]['last_name'] ?></a></b>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Email: </p>
                                    <p class="text-sm text-gray-500"><?= $customer[0]['email'] ?></p>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Telefoonnummer: </p>
                                    <p class="text-sm text-gray-500"><?= $customer[0]['phonenumber'] ?></p>
                                </div>
                            </div>
                            <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Bezorgings informatie</h2>
                                </div>

                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Adres: </p>
                                    <p class="text-sm text-gray-500 text-right"><b><a href="https://www.google.com/maps/place/<?= $customer[0]['street_name'] ?>+<?= $customer[0]['house_number'] ?>+<?= $customer[0]['city'] ?>" target="_blank" class="text-gray-500 hover:text-gray-400"><?= $customer[0]['street_name'] ?> <?= $customer[0]['house_number'] ?>, <?= $customer[0]['city'] ?></a></b>
                                </div>

                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Postcode: </p>
                                    <p class="text-sm text-gray-500"><?= $customer[0]['postal'] ?></p>
                                </div>

                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Land: </p>
                                    <p class="text-sm text-gray-500"><?= $customer[0]['country'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="w-full h-0.5 bg-gray-300 my-2 m-2"></div>
                        <div class="flex justify-between m-2">
                            <h2 class="text-xl font-medium textcolor-3">Bestellingen op dit account</h2>
                        </div>
                        <div class="grid grid-cols-3 gap-1">
                            <?php foreach (getOrdersFromCustomer($customer[0]['id']) as $item) : ?>
                                <?= console_log($item); ?>
                                <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Bestelling: </p>
                                        <p class="text-sm text-gray-500"><b><a href="<?= $main_url ?>dashboard/orders/order?id=<?= $item['id'] ?>" class="text-gray-500 hover:text-gray-400"><?= $item['id'] ?></a></b>
                                    </div>
                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Datum: </p>
                                        <p class="text-sm text-gray-500"><?= convertDate($item['created_at']) ?></p>
                                    </div>
                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Status: </p>
                                        <p class="text-sm text-gray-500"><?= $item['status'] ?></p>
                                    </div>
                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Prijs: </p>
                                        <p class="text-sm text-gray-500"><?= printGetOrderTotalPrice($item['id']) ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
    </body>

</html>