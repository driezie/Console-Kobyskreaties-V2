<?php require_once '../../includes/php/actions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= $main_url ?>includes/css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producten - kobyskreaties</title>
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
                    <a href="" class="text-white hover:text-gray-300">Producten</a>
                </nav>

                <h2 class="text-4xl font-medium text-white">Welkom terug, Jelte Cost 🙌✨</h2>
                <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                    Hieronder vind je een overzicht van alle producten.
                </p>
            </div>

            <!-- Content -->
            <div class="p-3 pt-6">
                <h2 class="text-2xl font-medium textcolor-3">Producten</h2>
            </div>

            <div class="grid grid-rows-3 grid-flow-col gap-4">
                <div class="row-span-3 m-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <input type="text" class="block w-full p-2 text-sm text-gray-900 border rounded-lg" placeholder="Zoeken door alle producten..." id="searchInput">
                        <table class="table-auto w-full" id="tableBody">
                            <caption class="text-sm italic px-2 py-2">
                                Aantal items: <span class="text-gray-500" id="itemCount"></span>
                            </caption>
                            <thead class="border-b border-gray-200">
                                <tr>
                                    <th>Id</th>
                                    <th>Banner</th>
                                    <th>Product Naam</th>
                                    <th>Categorie</th>
                                    <th>Subcategorie</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (getProducts() as $item) { ?>
                                    <tr>
                                        <td>
                                        <a href="<?= $main_url ?>dashboard/products/edit/?id=<?= $item['id'] ?>" class="text-blue-500 hover:text-blue-700"><?= $item['id'] ?></a></td>
                                        <!-- product_banner -->
                                        <td>
                                            <img src="<?= $item['product_banner'] ?>" alt="" class="w-20 h-20 rounded-full">
                                        </td>
                                        <td><?= $item['product_title'] ?></td>
                                        <td><?= $item['product_categorie'] ?></td>
                                        <td><?= $item['product_brand'] ?></td>
                                        <td>
                                            <a href="<?= $main_url ?>dashboard/products/edit/?id=<?= $item['id'] ?>" class="text-blue-500 hover:text-blue-700">Bekijken</a>
                                        </td>
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
            <script src="<?= $main_url ?>includes/js/searchInput.js" type="text/javascript"></script>
    </body>

</html>