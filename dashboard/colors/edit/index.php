<?php require_once '../../../includes/php/actions.php';
$id = $_GET['id'];
$data = getColor($id)[0];

console_log($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= $main_url ?>includes/css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kleuren - kobyskreaties</title>
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
                'subtitle' => 'Hier zijn alle gegevens van de bezorgingskosten',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard'),
                    array('title' => 'Kleuren', 'url' => 'dashboard/colors'),
                    array('title' => 'Bewerken Kleur'),
                )
            );

            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>

            <!-- Content -->
            <form action="<?= $main_url ?>dashboard/colors/edit/save.php" method="post">
                <div class="p-3 pt-6 flex justify-between items-center">
                    <!-- under each other -->
                    <div class="flex items-left flex-col">

                        <h2 class="text-2xl font-medium textcolor-3">
                            Kleur bewerken
                        </h2>
                    </div>
                    <div class="flex">
                        <?= createBackButton('Terug', $main_url . 'dashboard/colors/') ?>
                        <?= createSaveFormButton('Opslaan') ?>
                    </div>

                </div>
                <div class="grid grid-cols-1">
                    <div class="col-span-1 m-2">
                        <div class="p-3 bg-white shadow-md rounded-md card">
                            <div class="grid grid-cols-1 gap-1">
                                <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">Kleur</h2>
                                    </div>
                                    <?= createInput('Kleur', 'Kleur', 'color', 'text', true, $data['title']); ?>

                                    <?php
                                    $products = getProductsFromColor($data['id']);
                                    console_log($products);
                                    echo '<p class="text-sm italic mt-2">Hier zijn alle producten met deze kleur:</p>';
                                    echo '<ul class="list-disc list-inside text-sm italic">';
                                    foreach ($products as $product) {
                                        $color = getColor($product['color'])[0];
                                        $product_group = getProductGroup($product['product_group'])[0];
                                        echo '<li><a href="' . $main_url . 'dashboard/products/product/?id=' . $product_group['id'] . '&view=1" class="text-blue-500 hover:text-blue-600">' . $product_group['title'] . ' (' . $color['title'] . ')</a></li>';
                                    }
                                    echo '</ul>';
                                    echo '<p class="text-red-500 text-sm italic mt-2">Er kunnen producten verbonden zijn aan deze kleur. Als je deze kleur verwijderd worden alle kleuren ook verwijderd die aan deze kleur verbonden zijn.</p>';
                                    echo '<div class="mt-4 mb-2 ">';
                                    echo '<a href="' . $main_url . 'dashboard/colors/delete.php?id=' . $data['id'] . '" class="btn btn-primary text-white p-3 rounded-md bg-red-600 hover:bg-red-700"><i class="fa-solid fa-trash pr-2"></i>Verwijderen</a>';
                                    echo '</div>';
                                    ?>

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