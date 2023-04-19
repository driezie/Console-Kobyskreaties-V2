<?php require_once '../../../../includes/php/actions.php';
$customerid = $_GET['id'];
$customer = getCustomer($customerid)[0];

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
        <?php include_once '../../../../includes/php/createSidebar.php'; ?>

        <div class="data-overview">
            <!-- Navbar -->
            <?php include_once '../../../../includes/php/createNavbar.php'; ?>
            <!-- Header -->
            <?php
            $bannerArray = array(
                'subtitle' => 'Hieronder kunt u de klant bewerken.',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard'),
                    array('title' => 'Klanten', 'url' => 'dashboard/customers'),
                    array('title' => 'Klant ' . $customer[0]['id'] . " bewerken"),
                )
            );

            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>

            <!-- Content -->
            <form action="<?= $main_url ?>dashboard/customers/customer/edit/save.php?id=<?= $customer['id'] ?>" method="post">
                <div class="p-3 pt-6 flex justify-between items-center">
                    <!-- under each other -->
                    <div class="flex items-left flex-col">

                        <h2 class="text-2xl font-medium textcolor-3">
                            Klant bewerken: <?= $customer['first_name'] . " " . $customer['last_name'] ?>
                        </h2>
                        <p class="text-sm text-gray-500 italic">Account aangemaakt op: <?= convertDate($customer['created_at']) ?></p>
                    </div>
                    <div class="flex">
                        <a href="<?= $main_url ?>dashboard/customers/customer/?id=<?= $customer['id'] ?>" class="btn btn-primary textcolor-3 hover:bgcolor-3 p-2 rounded-md mr-2 border border-gray-500"><i class="fa-solid fa-arrow-left pr-2"></i>Terug</a>
                        <?= createSaveFormButton('Opslaan')?>
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="col-span-1 m-2">
                        <div class="p-3 bg-white shadow-md rounded-md card">
                            <div class="grid grid-cols-1 gap-1">
                                <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                    <?= createFormTitle('Klant informatie'); ?>
                                    <?= createInput('Voornaam', 'Voornaam', 'first_name', 'text', true, $customer['first_name']); ?>
                                    <?= createInput('Achternaam', 'Achternaam', 'last_name', 'text', true, $customer['last_name']); ?>
                                    <?= createInput('Email', 'Email', 'email', 'email', true, $customer['email']); ?>
                                    <?= createInput('Telefoonnummer', 'Telefoonnummer', 'phonenumber', 'text', true, $customer['phonenumber']); ?>
                                </div>
                                <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                <?= createFormTitle('Bezorgingsinformatie informatie'); ?>
                                    <?= createInput('Straatnaam', 'Straatnaam', 'street_name', 'text', true, $customer['street_name']);?>
                                    <?= createInput('Huisnummer', 'Huisnummer', 'house_number', 'text', true, $customer['house_number']);?>
                                    <?= createInput('Stad', 'Stad', 'city', 'text', true, $customer['city']);?>
                                    <?= createInput('Postcode', 'Postcode', 'postal', 'text', true, $customer['postal']);?>
                                    <?= createInput('Land', 'Land', 'country', 'text', true, $customer['country']);?>
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