<?php require_once '../../../includes/php/actions.php';
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
    <title>Bewerken product - kobyskreaties</title>
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
                    <a href="" class="text-white hover:text-gray-300"><?= $product[0]['product_title'] ?></a>
                </nav>

                <h2 class="text-4xl font-medium text-white"><?= $main_title ?></h2>
                <p class="my-4 text-md text-gray-300 w-1/1 lg:w-1/2">
                    Hier vind u de gegevens van het product: <?= $product[0]['product_title'] ?>
                </p>
            </div>

            <!-- Content -->


            <div class="p-3 pt-6 flex justify-between items-center">
                <!-- under each other -->
                <div class="flex items-left flex-col">

                    <h2 class="text-2xl font-medium textcolor-3">
                        <?= $product[0]['product_title'] ?>
                    </h2>
                </div>
                <div class="flex">
                    <?= createBackButton('Terug', $main_url . 'dashboard/products/') ?>
                </div>

            </div>
            <div class="grid grid-cols-1">
                <div class="col-span-1 m-2">
                    <div class="p-3 bg-white shadow-md rounded-md card">
                        <div class="grid grid-cols-4 gap-1">
                            <div class="col-span-1 my-2">



                                <div class="flex justify-between items-center">
                                    <?php
                                    $view_id = isset($_GET['view']) ? intval($_GET['view']) : 0; // Get the view ID from the URL parameter
                                    $setView = 1; // Set the value of $setView here
                                    $ViewText = "Algemeen"; // Set the text of the view here
                                    ?>
                                    <a href="<?= $main_url ?>dashboard/products/product/?id=<?= $product_id ?>&view=<?= $setView ?>" class="<?= $view_id === $setView ? 'bgcolor-3' : 'bg-gray-200 hover:bg-gray-300' ?> px-3 py-3 w-full rounded-md">
                                        <p class="text-md font-medium <?= $view_id === $setView ? 'text-white' : 'textcolor-3' ?>"><?= $ViewText ?></p>
                                    </a>
                                </div>

                                <div class="flex justify-between items-center mt-2">
                                    <?php
                                    $view_id = isset($_GET['view']) ? intval($_GET['view']) : 0; // Get the view ID from the URL parameter
                                    $setView = 2; // Set the value of $setView here
                                    $ViewText = "Afbeeldingen"; // Set the text of the view here
                                    ?>
                                    <a href="<?= $main_url ?>dashboard/products/product/?id=<?= $product_id ?>&view=<?= $setView ?>" class="<?= $view_id === $setView ? 'bgcolor-3' : 'bg-gray-200 hover:bg-gray-300' ?> px-3 py-3 w-full rounded-md">
                                        <p class="text-md font-medium <?= $view_id === $setView ? 'text-white' : 'textcolor-3' ?>"><?= $ViewText ?></p>
                                    </a>
                                </div>

                                <div class="flex justify-between items-center mt-2">
                                    <?php
                                    $view_id = isset($_GET['view']) ? intval($_GET['view']) : 0; // Get the view ID from the URL parameter
                                    $setView = 3; // Set the value of $setView here
                                    $ViewText = "Producten"; // Set the text of the view here
                                    ?>
                                    <a href="<?= $main_url ?>dashboard/products/product/?id=<?= $product_id ?>&view=<?= $setView ?>" class="<?= $view_id === $setView ? 'bgcolor-3' : 'bg-gray-200 hover:bg-gray-300' ?> px-3 py-3 w-full rounded-md">
                                        <p class="text-md font-medium <?= $view_id === $setView ? 'text-white' : 'textcolor-3' ?>"><?= $ViewText ?></p>
                                    </a>
                                </div>

                                <div class="flex justify-between items-center mt-2">
                                    <?php
                                    $view_id = isset($_GET['view']) ? intval($_GET['view']) : 0; // Get the view ID from the URL parameter
                                    $setView = 4; // Set the value of $setView here
                                    $ViewText = "Instellingen"; // Set the text of the view here
                                    ?>
                                    <a href="<?= $main_url ?>dashboard/products/product/?id=<?= $product_id ?>&view=<?= $setView ?>" class="<?= $view_id === $setView ? 'bgcolor-3' : 'bg-gray-200 hover:bg-gray-300' ?> px-3 py-3 w-full rounded-md">
                                        <p class="text-md font-medium <?= $view_id === $setView ? 'text-white' : 'textcolor-3' ?>"><?= $ViewText ?></p>
                                    </a>
                                </div>

                                <div class="flex justify-between items-center mt-2">
                                    <?php
                                    $view_id = isset($_GET['view']) ? intval($_GET['view']) : 0; // Get the view ID from the URL parameter
                                    $setView = 5; // Set the value of $setView here
                                    $ViewText = "Reviews"; // Set the text of the view here
                                    ?>
                                    <a href="<?= $main_url ?>dashboard/products/product/?id=<?= $product_id ?>&view=<?= $setView ?>" class="<?= $view_id === $setView ? 'bgcolor-3' : 'bg-gray-200 hover:bg-gray-300' ?> px-3 py-3 w-full rounded-md">
                                        <p class="text-md font-medium <?= $view_id === $setView ? 'text-white' : 'textcolor-3' ?>"><?= $ViewText ?></p>
                                    </a>
                                </div>

                                <div class="flex justify-between items-center mt-2">
                                    <?php
                                    $view_id = isset($_GET['view']) ? intval($_GET['view']) : 0; // Get the view ID from the URL parameter
                                    $setView = 6; // Set the value of $setView here
                                    $ViewText = "Geschiedenis"; // Set the text of the view here
                                    ?>
                                    <a href="<?= $main_url ?>dashboard/products/product/?id=<?= $product_id ?>&view=<?= $setView ?>" class="<?= $view_id === $setView ? 'bgcolor-3' : 'bg-gray-200 hover:bg-gray-300' ?> px-3 py-3 w-full rounded-md">
                                        <p class="text-md font-medium <?= $view_id === $setView ? 'text-white' : 'textcolor-3' ?>"><?= $ViewText ?></p>
                                    </a>
                                </div>
                            </div>
                            <?php $view_id = isset($_GET['view']) ? intval($_GET['view']) : 0;  ?>

                            <?php $setView = 1; // Set the value of $setView here 
                            ?>

                            <div class="col-span-3 m-2 bg-gray-100 p-3 rounded-md <?= $view_id !== $setView ? 'hidden' : '' ?>">
                                <?= createFormTitle('Algemeen'); ?>
                                <?= createInput('Product naam', 'Product naam', 'title', 'text', true, $product['product_title']); ?>

                                <!-- save button -->
                                <div class="">
                                    <button type="submit" class="px-4 py-2 rounded-md text-white text-sm font-medium transition duration-200 bg-green-500 hover:bg-green-600 hover:text-white">Opslaan</button>
                                </div>

                            </div>
                        </div>


                        <?php $setView = 2; // Set the value of $setView here 
                        ?>

                        <div class="col-span-3 m-2 bg-gray-100 p-3 rounded-md <?= $view_id !== $setView ? 'hidden' : '' ?>">
                            <div class="flex justify-between py-1">
                                <h2 class="text-xl font-medium textcolor-3">Afbeeldingen</h2>
                            </div>
                            <!-- show message that it isnt availible with alert tailwind css -->
                            <div class="flex justify-start items-center mt-4">
                                <!-- alert icon -->
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <p class="text-md textcolor-3 ml-2">Deze functie is nog niet beschikbaar.</p>
                            </div>
                        </div>


                        <?php $setView = 3; // Set the value of $setView here 
                        ?>

                        <div class="col-span-3 m-2 bg-gray-100 p-3 rounded-md <?= $view_id !== $setView ? 'hidden' : '' ?>">
                            <div class="flex justify-between py-1">
                                <h2 class="text-xl font-medium textcolor-3">Producten</h2>
                            </div>
                            <!-- show message that it isnt availible with alert tailwind css -->
                            <div class="flex justify-start items-center mt-4">
                                <!-- alert icon -->
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <p class="text-md textcolor-3 ml-2">Deze functie is nog niet beschikbaar.</p>
                            </div>
                        </div>



                        <?php $setView = 4; // Set the value of $setView here 
                        ?>

                        <div class="col-span-3 m-2 bg-gray-100 p-3 rounded-md <?= $view_id !== $setView ? 'hidden' : '' ?>">
                            <div class="flex justify-between py-1">
                                <h2 class="text-xl font-medium textcolor-3">Instellingen</h2>
                            </div>
                            <!-- delete products -->
                            <div class="flex justify-start items-center mt-4">
                                <form action="" method="post">
                                    <button type="submit" name="delete_product" class="px-3 py-2 rounded-md text-white bg-red-500 hover:bg-red-600">Verwijder alle producten uit deze groep</button>
                                </form>
                            </div>

                            <!-- delete whole product group -->
                            <div class="flex justify-start items-center mt-4">
                                <form action="" method="post">
                                    <button type="submit" name="delete_product_group" class="px-3 py-2 rounded-md text-white bg-red-500 hover:bg-red-600">Verwijder productgroep</button>
                                </form>
                            </div>
                        </div>



                        <?php $setView = 5; // Set the value of $setView here 
                        ?>

                        <div class="col-span-3 m-2 bg-gray-100 p-3 rounded-md <?= $view_id !== $setView ? 'hidden' : '' ?>">
                            <div class="flex justify-between py-1">
                                <h2 class="text-xl font-medium textcolor-3">Reviews</h2>
                            </div>
                            <!-- show message that it isnt availible with alert tailwind css -->
                            <div class="flex justify-start items-center mt-4">
                                <!-- alert icon -->
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <p class="text-md textcolor-3 ml-2">Deze functie is nog niet beschikbaar.</p>
                            </div>
                        </div>

                        <?php $setView = 6; // Set the value of $setView here 
                        ?>

                        <div class="col-span-3 m-2 bg-gray-100 p-3 rounded-md <?= $view_id !== $setView ? 'hidden' : '' ?>">
                            <div class="flex justify-between py-1">
                                <h2 class="text-xl font-medium textcolor-3">Geschiedenis</h2>
                            </div>
                            <!-- show message that it isnt availible with alert tailwind css -->
                            <div class="flex justify-start items-center mt-4">
                                <!-- alert icon -->
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <p class="text-md textcolor-3 ml-2">Deze functie is nog niet beschikbaar.</p>
                            </div>

                            <!-- <div class="flex justify-between items-center mt-2">
                                    <h3 class="text-lg font-medium textcolor-3">Recente activiteiten</h3>
                                    <a href="#" class="textcolor-3 hover:textcolor-2">Bekijk alles</a>
                                </div>
                                -->
                            <!-- <ol class="border-l border-neutral-300 dark:border-neutral-500">
                                    <li>
                                        <div class="flex-start flex items-center pt-3">
                                            <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bgcolor-3"></div>
                                            <p class="text-sm textcolor-2">
                                                2 Dagen geleden
                                            </p>
                                        </div>
                                        <div class="mb-6 ml-4 mt-2">
                                            <h4 class="mb-1.5 text-lg font-semibold">Voorraad Oker van 2 naar 4</h4>
                                            <p class="mb-3 textcolor-2">
                                                Er is een vooraad verandering van de kleur Oker van 2 stuks naar 4 stuks.
                                            </p>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="flex-start flex items-center pt-3">
                                            <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bgcolor-3"></div>
                                            <p class="text-sm textcolor-2">
                                                4 Dagen geleden
                                            </p>
                                        </div>
                                        <div class="mb-6 ml-4 mt-2">
                                            <h4 class="mb-1.5 text-lg font-semibold">Voorraad Oker van 0 naar 2</h4>
                                            <p class="mb-3 textcolor-2">
                                                Er is een vooraad verandering van de kleur Oker van 0 stuks naar 2 stuks.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex-start flex items-center pt-3">
                                            <div class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bgcolor-3"></div>
                                            <p class="text-sm textcolor-2">
                                                4 Dagen geleden
                                            </p>
                                        </div>
                                        <div class="mb-6 ml-4 mt-2">
                                            <h4 class="mb-1.5 text-lg font-semibold">Nieuwe kleur toegevoegd</h4>
                                            <p class="mb-3 textcolor-2">
                                                Er is een nieuwe kleur toegevoegd aan het product. De kleur is Oker.
                                            </p>
                                        </div>
                                    </li>
                                </ol> -->
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