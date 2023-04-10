<?php require_once '../../../includes/php/actions.php';
$product_group_id = $_GET['id'];
$product = getProduct($product_group_id);
console_log($product);
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
                    <a href="<?= $main_url ?>dashboard/products" class="hover:text-gray-300">Producten</a>
                    <span class="mx-2 select-none">/</span>
                    <a href="" class="text-white hover:text-gray-300"><?= $product[0]['product_title'] ?> bewerken</a>
                </nav>

                <h2 class="text-4xl font-medium text-white">Welkom terug, Driezie 🙌✨</h2>
                <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                    Hieronder vind je een overzicht van de product van <?= $product[0]['product_title'] ?>
                </p>
            </div>

            <!-- Content -->
            <div class="p-3 pt-6">
                <h2 class="text-2xl font-medium textcolor-3">
                    Product <?= $product[0]['product_title'] ?>
                </h2>
                <p class="text-sm text-gray-500 italic">Gemaakt op op: <?= $product[0]['created_at'] ?></p>
            </div>
            <div class="grid grid-cols-3">
                <div class="col-span-4 m-2">
                    <div class="p-3 bg-white shadow-md rounded-md card">
                        <div class="grid grid-cols-3 gap-1">
                            <!-- image banner height 50 -->
            
                              
                                
                         
                            <div class="col-span-2 m-2 bg-gray-100 p-3 rounded-md">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Product informatie</h2>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Product: </p>
                                    <p class="text-sm text-gray-500"><b><?= $product[0]['product_title'] ?></b>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Categorie: </p>
                                    <p class="text-sm text-gray-500"><?= $product[0]['product_categorie'] ?></p>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Subcategorie: </p>
                                    <p class="text-sm text-gray-500"><?= $product[0]['product_brand'] ?></p>
                                </div>
                            </div>

                       
                            
                            
                        </div>

                        <div class="flex justify-between m-2">
                            <h2 class="text-xl font-medium textcolor-3">Producten</h2>
                        </div>

                        <div class="grid grid-cols-3 gap-1">
                            
                        </div>
                        <div class="w-full h-0.5 bg-gray-300 my-2 m-2"></div>
                        <div class="flex justify-between py-1 mx-2">
                            <h2 class="text-xl font-medium textcolor-3">Prijs Informatie</h2>
                        </div>
                        
                    </div>
                </div>
                
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
    </body>
</html>