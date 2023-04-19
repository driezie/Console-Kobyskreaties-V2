<?php require_once '../../includes/php/actions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?= $main_url ?>includes/css/style.css" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bezorgingskosten - kobyskreaties</title>
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
                'subtitle' => 'Hieronder vind je een overzicht van alle bezorgingskosten.',
                'image' => 'https://console.kobyskreaties.nl/dashboard/images/products/banner2.png',
                'breadcrumb' => array(
                    array('title' => 'Dashboard', 'url' => 'dashboard'),
                    array('title' => 'Bezorgingskosten'),
                )
            );
                        
            $bannerHTML = createBanner($bannerArray, $main_title, $main_url);
            echo $bannerHTML;
            ?>

            <!-- Content -->
            <div class="p-3 pt-6 flex justify-between items-center">
                <div class="flex items-left flex-col">
                    <h2 class="text-2xl font-medium textcolor-3">
                        Bezorgingskosten
                    </h2>
                </div>
                <div class="flex">
                    <a href="<?= $main_url ?>dashboard/deliverycosts/new.php" class="btn btn-primary bgcolor-3 text-white hover:bgcolor-2 p-2 rounded-md"><i class="fa-solid fa-plus pr-2"></i></i>Nieuwe bezorgingskost</a>
                </div>
            </div>

            <div class="grid grid-rows-3 grid-flow-col gap-4">
                <div class="row-span-3 m-2">
                    <div class="py-3 px-3 bg-white shadow-md rounded-md card">
                        <?= createSearch("Zoeken naar bezorgingskosten") ?>
                        <table class="table-auto w-full" id="tableBody">
                            <?= showItemsFilter() ?>
                            <thead class="border-b border-gray-200">
                                <tr>
                                    <th>Id</th>
                                    <th>Bezorgingskosten</th>
                                    <th>Land</th>
                                    <th>Acties</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (getDeliveryCosts() as $item) { ?>
                                    <tr>
                                        <!-- ID: <?= $item['id'] ?> -->
                                        <?php console_log($item) ?>
                                        <td class="border-b border-gray-200 px-2 py-2"><?= $item['id'] ?></td>
                                        <td class="border-b border-gray-200 px-2 py-2"><?= formatPrice($item['title']) ?></td>
                                        <td class="border-b border-gray-200 px-2 py-2"><?= $item['country'] ?></td>
                                        <td><a href="<?= $main_url ?>dashboard/deliverycosts/edit/?id=<?= $item['id'] ?>" class="text-blue-500 hover:text-blue-700">Bekijken</a></td>
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