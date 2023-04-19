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
    <title>Nieuwe Bezorgingskost - kobyskreaties</title>
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
                'subtitle' => 'Hieronder kunt u een nieuwe bezorgingskost aanmaken.',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard'),
                    array('title' => 'Bezorgingskosten', 'url' => 'deliverycosts'),
                    array('title' => 'Nieuwe Bezorgingskost'),
                )
            );
                        
            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>

            <!-- Content -->
            <form action="<?= $main_url ?>dashboard/customers/save.php" method="post">
                <div class="p-3 pt-6 flex justify-between items-center">
                    <!-- under each other -->
                    <div class="flex items-left flex-col">

                        <h2 class="text-2xl font-medium textcolor-3">
                            Bezorgingskost aanmaken
                        </h2>
                    </div>
                    <div class="flex">
                        <?= createBackButton('Terug', $main_url . 'dashboard/products/') ?>
                        <?= createSaveFormButton('Opslaan')?>
                    </div>

                </div>
                <div class="grid grid-cols-1">
                    <div class="col-span-1 m-2">
                        <div class="p-3 bg-white shadow-md rounded-md card">
                            <div class="grid grid-cols-1 gap-1">


                                <div class="col-span-1 m-2 bg-gray-100 p-3 rounded-md">
                                    <div class="flex justify-between py-1">
                                        <h2 class="text-xl font-medium textcolor-3">Bezorgingskost</h2>
                                    </div>
                                    <?= createInput('Bezorgingskosten', 'Bezorgingskosten', 'deliverycosts', 'Bezorgingskosten', true);?>
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