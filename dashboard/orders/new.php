<?php require_once '../../includes/php/actions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= $main_url ?>includes/css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe bestelling - kobyskreaties</title>
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
                'subtitle' => 'Hieronder kunt u een nieuwe bestelling aanmaken.',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard'),
                    array('title' => 'Bestellingen', 'url' => 'dashboard/orders'),
                    array('title' => 'Nieuwe bestelling'),
                )
            );

            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>

            <!-- Content -->
            <form action="<?= $main_url ?>dashboard/orders/save.php" method="post">
                <div class="p-3 pt-6 flex justify-between items-center">
                    <!-- under each other -->
                    <div class="flex items-left flex-col">

                        <h2 class="text-2xl font-medium textcolor-3">
                            Bestelling aanmaken
                        </h2>
                    </div>
                    <div class="flex">
                        <a href="<?= $main_url ?>dashboard/orders/" class="btn btn-primary textcolor-3 hover:bgcolor-3 p-2 rounded-md mr-2 border border-gray-500"><i class="fa-solid fa-arrow-left pr-2"></i>Terug</a>
                    </div>

                </div>
                <div class="grid grid-cols-1">
                    <div class="col-span-1 m-2">
                        <div class="p-3 bg-white shadow-md rounded-md card">
                            <div class="grid grid-cols-1 gap-1">

                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Kies uw klant</h2>
                                </div>

                                <div class="flex justify-between py-1">
                                    <p class="textcolor-2">
                                        Kies hieronder de klant waarvoor u een bestelling wilt aanmaken.
                                    </p>
                                </div>
                                <div class="flex justify-between py-1">
                                    <select name="customer" id="customer" class="select-wrapper block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50">
                                        <option value="0">Kies een klant</option>
                                        <?php
                                        $customers = getCustomers();
                                        foreach ($customers as $customer) {
                                            echo '<option value="' . $customer['id'] . '">' . $customer['first_name'] . ' ' . $customer['last_name'] . ' (' . $customer['email'] . ')</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="grid grid-cols-2 gap-1">

                                <div class="mr-2 py-2 bg-gray-100 p-3 rounded-md">
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">Klant informatie</h2>
                                    </div>
                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Naam: </p>
                                        <p class="text-sm text-gray-500"><b><a href="http://localhost/Console-Kobyskreaties-V2/dashboard/customers/customer?id=70" class="text-gray-500 hover:text-gray-400">Lynn Abbing</a></b>
                                        </p>
                                    </div>
                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Email: </p>
                                        <p class="text-sm text-gray-500">Lynnabbing@gmail.com</p>
                                    </div>
                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Telefoonnummer: </p>
                                        <p class="text-sm text-gray-500">06-23452312</p>
                                    </div>
                                </div>

                                <div class="ml-2 py-2 bg-gray-100 p-3 rounded-md">
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">Bezorgings informatie</h2>
                                    </div>

                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Adres: </p>
                                        <p class="text-sm text-gray-500 text-right"><b><a href="https://www.google.com/maps/place/Sartrestate3875378467834+54+Ede" target="_blank" class="text-gray-500 hover:text-gray-400">Sartrestate3875378467834 54, Ede</a></b>
                                        </p>
                                    </div>

                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Postcode: </p>
                                        <p class="text-sm text-gray-500">6716SE</p>
                                    </div>

                                    <div class="flex justify-between py-1">
                                        <p class="text-sm text-gray-500">Land: </p>
                                        <p class="text-sm text-gray-500">Netherlands</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full h-0.5 bg-gray-300 my-2"></div>

                            </div>

                            <!-- list of products -->
                            <div class="grid grid-cols-1 gap-1 mt-4">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Kies uw producten</h2>
                                </div>

                                <div class="flex justify-between py-1">
                                    <p class="textcolor-2">
                                        Kies hieronder de producten die u wilt toevoegen aan de bestelling.
                                    </p>
                                </div>
                                <div class="flex justify-between py-1">
                                    <select name="product" id="product" class="select-wrapper block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50">
                                        <option value="0">Kies een product</option>
                                        <?php
                                        $products = getProducts();
                                        foreach ($products as $product) {
                                            console_log($product);
                                            echo '<option value="' . $product['id'] . '">' . $product['product_title'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <!-- selector for colors -->
                                <div class="flex justify-between py-1">
                                    <select name="color" id="color" class="select-wrapper block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50">
                                        <option value="0">Kies een kleur</option>
                                        <?php
                                        $colors = getColors();
                                        foreach ($colors as $color) {
                                            echo '<option value="' . $color['id'] . '">' . $color['title'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="flex justify-between py-1">
                                    <input type="number" name="amount" id="amount" class="input-wrapper block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" placeholder="Aantal">
                                </div>
                                <div class="flex justify-between py-1">
                                    <button type="button" id="addProduct" class="btn btn-primary textcolor-3 hover:bgcolor-3 p-2 rounded-md mr-2 border border-gray-500"><i class="fa-solid fa-plus pr-2"></i>Product toevoegen</button>
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