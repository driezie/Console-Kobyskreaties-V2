<?php require_once '../../../includes/php/actions.php';
$product_group_id = $_GET['id'];
$product = getProductGroup($product_group_id)[0];

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
    <title>Products bekijken - kobyskreaties</title>
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
            <?php
            $bannerArray = array(
                'subtitle' => 'Hier vind je een overzicht van ' . $product['title'],
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard/'),
                    array('title' => 'Producten', 'url' => 'dashboard/products/'),
                    array('title' => 'Product bekijken'),
                ),
                'notify_enabled' => false,
                'notify_small_text' => 'NIEUW',
                'notify_text' => 'Bestellingen zijn beschikbaar!'
            );

            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>

            <!-- Content -->


            <div class="p-3 pt-6 flex justify-between items-center">
                <div class="flex items-left flex-col">
                    <h2 class="text-2xl font-medium textcolor-3">
                        <?= $product['title'] ?>
                    </h2>
                    <p class="text-sm text-gray-500 italic">Gemaakt op: <?= convertDate($product['created_at']) ?></p>
                </div>
                <div class="flex">
                    <?= createBackButton('Terug', $main_url . 'dashboard/products/') ?>
                    <a href="<?= $main_url ?>dashboard/products/product/edit.php?id=<?= $customer[0]['id'] ?>" class="btn btn-primary bgcolor-3 text-white hover:bgcolor-2 p-2 rounded-md"><i class="fa-solid fa-pen-to-square pr-2"></i></i>Bewerken</a>
                </div>
            </div>
            <div class="grid grid-cols-1">
                <div class="col-span-1 m-2">
                    <div class="p-3 bg-white shadow-md rounded-md card">
                        <div class="grid grid-cols-3 gap-1">
                            <div class="col-span-2 m-2 bg-gray-100 p-3 rounded-md">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Product informatie</h2>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Product naam: </p>
                                    <p class="text-sm text-gray-500"><?= $product['title'] ?></p>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Categorie: </p>
                                    <p class="text-sm text-gray-500"><?= getCategory($product['category']) ?></p>
                                </div>
                                <div class="flex justify-between py-1">
                                    <p class="text-sm text-gray-500">Subcategorie: </p>
                                    <p class="text-sm text-gray-500"><?= getBrand($product['brand']) ?></p>
                                </div>
                                <!-- underline -->
                                <div class="w-full h-0.5 bg-gray-300 my-2"></div>

                                <div class="py-1">
                                    <h3 class="text-xl font-medium textcolor-3">Product beschrijving</h3>
                                    <p class="text-sm text-gray-500"><?= $product['description'] ?></p>
                                </div>
                            </div>
                            <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Algemene afbeeldingen</h2>
                                </div>

                                <div class="grid grid-cols-3 gap-1">
                                    <!-- example image -->
                                    <!-- <div class="col-span-1 flex justify-center items-center rounded-md">
                                        <img src="https://console.kobyskreaties.nl/dashboard/images/products/2264.jpeg" class="h-40 rounded-md object-cover">
                                    </div> -->
                                    <div class="col-span-1 flex justify-center items-center border-2 border-dashed border-gray-400 rounded-md">
                                        <div class="text-center">
                                            <i class="fa-solid fa-plus-circle text-3xl text-gray-400 hover:text-gray-500 p-5"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="grid grid-cols-1 gap-1">
                            <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                <div class="flex justify-between py-1">
                                    <h2 class="text-xl font-medium textcolor-3">Kleuren</h2>
                                </div>

                                <div class="grid grid-cols-3 gap-1">
                                    <!-- <div class="col-span-1 flex justify-start items-center rounded-md text-left bg-white p-2 rounded-md">
                                        <div class="flex flex-col">
                                            <div class="grid grid-cols-2 gap-1 pb-2">
                                                <div class="col-span-1 flex justify-center items-center rounded-md">
                                                    <img src="https://console.kobyskreaties.nl/dashboard/images/products/2264.jpeg" class="h-auto rounded-md object-cover">
                                                </div>
                                                <div class="col-span-1 flex justify-center items-center border-2 border-dashed border-gray-400 rounded-md">
                                                    <div class="text-center">
                                                        <i class="fa-solid fa-plus-circle text-3xl text-gray-400 hover:text-gray-500 p-5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-between py-1">
                                                <p class="text-sm text-gray-500">Prijs: </p>
                                                <p class="text-sm text-gray-500">€ 10,00</p>
                                            </div>
                                            <div class="flex justify-between pt-1">
                                                <p class="text-sm text-gray-500">Voorraad: </p>
                                                <p class="text-sm text-gray-500">10</p>
                                            </div>
                                        </div>
                                    </div> -->
                                    <?php
                                    $colors = getColorsFromGroup($product['id']);

                                    foreach ($colors as $color) {
                                        $color = $color['color'];
                                        $color = getColorProducts($product_group_id,$color)[0];
                                        // $product_id = $color['id'];
                                        console_log($color);
                                        echo '<div class="col-span-1 flex justify-start items-center rounded-md text-left bg-white p-2 rounded-md">';
                                        echo '<div class="flex flex-col">';

                                        echo '<div class="flex justify-between py-1">';
                                        echo '<p class="text-sm text-gray-500">Status: </p>';
                                        echo '<p class="text-sm text-gray-500">' . $color['status'] . '</p>';
                                        echo '</div>';

                                        echo '<div class="flex justify-between py-1">';
                                        echo '<p class="text-sm text-gray-500">Prijs: </p>';
                                        echo '<p class="text-sm text-gray-500">€ ' . $color['price'] . '</p>';
                                        echo '</div>';

                                        echo '<div class="flex justify-between py-1">';
                                        echo '<p class="text-sm text-gray-500">Voorraad: </p>';
                                        echo '<p class="text-sm text-gray-500">' . $color['stock'] . '</p>';
                                        echo '</div>';

                                        echo '<div class="flex justify-between py-1">';
                                        echo '<p class="text-sm text-gray-500">Afbeeldingen: </p>';
                                        echo '<p class="text-sm text-gray-500">' . $color['images'] . '</p>';
                                        echo '</div>';

                                        echo '</div>';
                                        echo '</div>';

                                        

                                    }
                                    ?>




                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
            <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
    </body>

</html>