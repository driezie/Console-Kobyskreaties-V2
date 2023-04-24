<?php require_once '../../../../includes/php/actions.php';
$product_id = $_GET['id'];
$product = getProduct($product_id)[0];
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
    <title>Product bewerken - kobyskreaties</title>
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
                'subtitle' => 'Hieronder kunt u een nieuwe product aanmaken.',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard'),
                    array('title' => 'Producten', 'url' => 'dashboard/products'),
                    array('title' => 'Bewerken Product'),
                )
            );

            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>

            <!-- Content -->
            <form action="<?= $main_url ?>dashboard/products/save.php" method="post">
                <div class="p-3 pt-6 flex justify-between items-center">
                    <div class="flex items-left flex-col">
                        <h2 class="text-2xl font-medium textcolor-3">
                            <?= $product['product_title'] ?> bewerken
                        </h2>
                    </div>
                    <div class="flex">
                        <?= createBackButton('Terug', $main_url . 'dashboard/products/') ?>
                        <?= createSaveFormButton('Opslaan') ?>
                    </div>

                </div>
                <div class="grid grid-cols-1">
                    <div class="col-span-1 m-2">
                        <div class="p-3 bg-white shadow-md rounded-md card">
                            <div class="grid grid-cols-1 gap-1">
                                <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">Algemene Informatie</h2>
                                    </div>
                                    <?= createInput('Product naam', 'Product Naam', 'name', 'text', true, $product['product_title']); ?>
                                    <?= createInputArea('Product beschrijving', 'Product beschrijving', 'description', 'text', true, $product['product_description']); ?>
                                    <div class="w-full h-0.5 bg-gray-300 my-2"></div>
                                    <!-- underline -->
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">Productcategorieën</h2>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



                                        <!-- Add an event listener to the category select input -->
                                        <select name="category" id="category" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" required="">
                                            <option value="" disabled="">Selecteer een categorie</option>
                                            <?php
                                            foreach (getCategories() as $category) {
                                                $selected = '';
                                                if ($category['id'] == $product['product_categorie_id']) {
                                                    $selected = 'selected';
                                                }
                                            ?>
                                                <option value="<?= $category['id'] ?>" <?= $selected ?>><?= $category['title'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>

                                        <select name="brand" id="brand" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50" required="">
                                            <option value="" disabled="">Selecteer een subcategorie</option>
                                            <?php
                                            foreach (getBrandsByCategory($product['product_categorie_id']) as $subcategory) {
                                                $selected = '';
                                                if ($subcategory['id'] == $product['product_subcategorie_id']) {
                                                    $selected = 'selected';
                                                }
                                            ?>

                                                <option value="<?= $subcategory['id'] ?>" <?= $selected ?>><?= $subcategory['title'] ?></option>
                                            <?php
                                            }
                                            ?>

                                            

                                        </select>
                                    </div>
                                    <div class="w-full h-0.5 bg-gray-300 my-2"></div>
                                    <!-- underline -->
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">Bezorgingskosten</h2>
                                    </div>

                                    <!-- one side with categories and one with subcategories -->

                                    <div class="grid grid-cols-1 gap-2">
                                        <div class="col-span-1 bg-gray-100 rounded-md">
                                            <?php
                                            $product_delivery_cost = $product['delivery_cost'];
                                            $options3 = array();
                                            $values3 = array();
                                            foreach (getDeliveryCosts() as $category) {
                                                $options3[] = formatPrice($category['title']);
                                                $values3[] = $category['id'];
                                            }

                                            createSelectInput('Bezorgingskosten', 'Selecteer een bezorgingskost', 'delivery_cost', true, $product_delivery_cost, $options3, 'Selecteer een bezorgingskost', $values3);

                                            ?>
                                        </div>

                                    </div>

                                    <div class="w-full h-0.5 bg-gray-300 my-2"></div>

                                    <!-- colors -->
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">Kleuren</h2>
                                    </div>
                                    <?php //createSearch('Zoek een kleur', 'Zoek een kleur', 'color', 'text', false, '', 'Zoek een kleur'); 
                                    ?>

                                    <!-- getColors() -->
                                    <div class="grid grid-cols-2 gap-2" id="tableBody">


                                        <?php

                                        foreach (getColors() as $color) {
                                            echo '<div class="col-span-1 bg-white my-2 p-3 rounded-md">';
                                            echo '<div class="flex justify-between py-2">';
                                            echo '<h2 class="text-lg font-medium textcolor-3">' . $color['title'] . '</h2>';
                                            echo '<div class="flex items-center justify-center">';
                                            echo '<input type="checkbox" name="color[]" value="' . $color['id'] . '"/>';
                                            echo '</div>';
                                            echo '</div>';
                                            createNumberInput('Aantal', 'amount[' . $color['id'] . ']', 'amount[' . $color['id'] . ']', false, '', 'Aantal', '0');
                                            createNumberInput('Prijs', 'price[' . $color['id'] . ']', 'price[' . $color['id'] . ']', false, '', 'Prijs', '0');
                                            echo '</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js">
                < /> <
                script src = "<?= $main_url ?>includes/js/loadFontAwesome.js"
                type = "text/javascript" >
            </script>
            <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>

            <script>
                // Add an event listener to the category select input
                $('#category').on('change', function() {
                    // Get the selected value
                    var selectedValue = $(this).val();
                    console.log(selectedValue);

                    // Send an AJAX request to get the brands by category using updateBrandsByCategory.php

                    $.ajax({
                        url: 'updateBrandsByCategory.php',
                        type: 'POST',
                        data: {
                            category_id: selectedValue
                        },
                        success: function(response) {
                            // Parse the response to JSON
                            var response = JSON.parse(response);

                            // Empty the brand select input
                            $('#brand').empty();

                            // Add the default option
                            $('#brand').append('<option value="" disabled="">Selecteer een subcategorie</option>');

                            // Loop through the response and add the brands to the brand select input
                            for (var i = 0; i < response.length; i++) {
                                $('#brand').append('<option value="' + response[i].id + '">' + response[i].title + '</option>');
                            }
                        }
                    });
                    console.log(selectedValue);
                });
            </script>
    </body>
</html>