<!DOCTYPE html>
<html lang="en">

<head>

    <?php $main_url = "http://localhost/projecten/Console-Kobyskreaties-V2/"; ?>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= $main_url ?>includes/css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard v2 - kobyskreaties</title>

</head>

<body>

    <body class="">
        <div id="loading">
            <div id="loading-center"></div>
        </div>
        <!-- Main Sidebar -->
        <?php include_once '../../../includes/php/createSidebar.php'; ?>

        <div class="data-overview">
            <!-- All data -->
            <?php include_once '../../../includes/php/createNavbar.php'; ?>

            <!-- Header -->
            <!-- auto fix the height  -->
            <div class="p-5" style="background-image: url(https://console.kobyskreaties.nl/dashboard/images/products/banner2.png); background-size: cover; background-position: center; background-repeat: no-repeat;">

                <nav class="flex items-center text-gray-400 text-sm my-3">
                    <a href="<?= $main_url ?>dashboard" class="hover:text-gray-300">Dashboard</a>
                    <span class="mx-2 select-none">/</span>
                    <a href="<?= $main_url ?>dashboard/orders" class="hover:text-gray-300">Bestellingen</a>
                    <span class="mx-2 select-none">/</span>
                    <a href="<?= $main_url ?>dashboard/orders/new" class="text-white hover:text-gray-300">Nieuwe Bestelling</a>
                </nav>

                <h2 class="text-4xl font-medium text-white">Nieuwe Bestelling</h2>
                <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                    Hier kunt u een nieuwe bestelling aanmaken.
                </p>
            </div>

            <div class="p-3 pt-6">
                <h2 class="text-2xl font-medium textcolor-3">Nieuwe Bestelling</h2>
            </div>



            <div class="grid grid-rows-3 grid-flow-col gap-4">
                <div class="row-span-3 m-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <div class="leading-loose">
                            <form class="">
                                <p class="text-gray-800 font-medium">Klant informatie</p>
                                <div class="">
                                    <label for="first_name">Voornaam</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="first-name" name="first-name" type="text" required="" placeholder="Voornaam" aria-label="First Name">
                                </div>
                                <div class="">
                                    <label for="last_name">Achternaam</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="first-name" name="first-name" type="text" required="" placeholder="Achternaam" aria-label="First Name">
                                </div>
                                <div class="">
                                    <label for="email">E-mail</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="first-name" name="first-name" type="email" required="" placeholder="E-mail" aria-label="First Name">
                                </div>
                                <div class="">
                                    <label for="phonenumber">Telefoonnummer</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="first-name" name="first-name" type="text" required="" placeholder="Telefoonnummer" aria-label="First Name">
                                </div>
                                <p class="text-gray-800 font-medium">Bezorg informatie</p>
                                <div class="">
                                    <label for="street_name">Straatnaam</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="first-name" name="first-name" type="text" required="" placeholder="Straatnaam" aria-label="First Name">
                                </div>

                                <div class="">
                                    <label for="house_number">Huisnummer</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="first-name" name="first-name" type="text" required="" placeholder="Huisnummer" aria-label="First Name">
                                </div>
                                <div class="">
                                    <label for="city">Stad</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="city" name="city" type="text" required="" placeholder="Stad" aria-label="city">
                                </div>
                                <div class="">
                                    <label for="postal">Postcode</label>
                                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="postal" name="postal" type="text" required="" placeholder="Postcode" aria-label="postal">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
    </body>

</html>