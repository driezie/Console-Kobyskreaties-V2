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
                    <a href="<?= $main_url ?>dashboard/customers/customer/?id=<?= $customer[0]['id'] ?>" class="hover:text-gray-300">Klant <?= $customer[0]['id'] ?></a>
                    <span class="mx-2 select-none">/</span>
                    <a href="" class="text-white hover:text-gray-300">Bewerken</a>

                </nav>

                <h2 class="text-4xl font-medium text-white"><?=$main_title?></h2>
                <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                    Hier vind u de gegevens van <?= $customer[0]['first_name'] . " " . $customer[0]['last_name'] ?>
                </p>
            </div>

            <!-- Content -->
            <form action="<?= $main_url ?>dashboard/customers/customer/edit/save.php?id=<?= $customer[0]['id'] ?>" method="post">
            <div class="p-3 pt-6 flex justify-between items-center">
                <!-- under each other -->
                <div class="flex items-left flex-col" >

                    <h2 class="text-2xl font-medium textcolor-3">
                        Klant bewerken: <?= $customer[0]['first_name'] . " " . $customer[0]['last_name'] ?>
                    </h2>
                    <p class="text-sm text-gray-500 italic">Account aangemaakt op: <?= convertDate($customer[0]['created_at']) ?></p>
                </div>
                <div class= "flex">
                    <a href="<?= $main_url ?>dashboard/customers/customer/?id=<?= $customer[0]['id'] ?>" class="btn btn-primary textcolor-3 hover:bgcolor-3 p-2 rounded-md mr-2 border border-gray-500"><i class="fa-solid fa-arrow-left pr-2"></i>Terug</a>
                    <?= createSaveFormButton('Opslaan')?>
                </div>

            </div>
            <div class="grid grid-cols-1">
                <div class="col-span-1 m-2">
                    <div class="p-3 bg-white shadow-md rounded-md card">
                        <div class="grid grid-cols-1 gap-1">
                        

                        <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                        <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Klant informatie</h2>
                                </div>
                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Voornaam: </p>
                                    <input type="text" name="first_name" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Voornaam" value="<?=$customer[0]['first_name']?>">
                                </div>
                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Achternaam: </p>
                                    <input type="text" name="last_name" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Achternaam" value="<?=$customer[0]['last_name']?>">
                                </div>

                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Email: </p>
                                    <input type="email" name="email" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Voornaam" value="<?=$customer[0]['email']?>">
                                </div>
                                
                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Telefoonnummer: </p>
                                    <input type="text" name="phonenumber" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Telefoonnummer" value="<?=$customer[0]['phonenumber']?>">
                                </div>
                        </div>
                        <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                        <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Bezorgings informatie</h2>
                                </div>

                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Straatnaam: </p>
                                    <input type="text" name="street_name" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Straatnaam" value="<?=$customer[0]['street_name']?>">
                                </div>

                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Huisnummer: </p>
                                    <input type="text" name="house_number" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Huisnummer" value="<?=$customer[0]['house_number']?>">
                                </div>

                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Stad: </p>
                                    <input type="text" name="city" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Stad" value="<?=$customer[0]['city']?>">
                                </div>

                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Postcode: </p>
                                    <input type="text" name="postal" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Postcode" value="<?=$customer[0]['postal']?>">
                                </div>

                                <div class="flex justify-between py-1 flex-col">
                                    <p class="text-sm text-gray-500 pb-1">Land: </p>
                                    <input type="text" name="country" class="block mb-2 text-sm font-medium text-gray-900 textcolor-3 p-2 rounded-md w-full" placeholder="Land" value="<?=$customer[0]['country']?>">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
    </body>

</html>