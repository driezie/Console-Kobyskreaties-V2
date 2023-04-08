<div class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[250px] overflow-y-auto text-center sidebar-color overflow-auto scrollbar-hide">
        <div class="text-gray-100 text-xl">
            <div class="mt-1 flex flex-col items-center justify-center text-white">
                <a href="<?=$main_url?>dashboard/" class="">
                    <img class="w-[140px] h-auto" src="https://cdn.discordapp.com/attachments/1021413861552828466/1025313412869259284/removal.ai_edf5bed7-5483-4b32-aa6f-cc6da03ce279.png" alt="logo">
                    <h1 class="text-[20px] pt-2 pb-2 textcolor-1 font-poppins">Kobyskreaties</h1>
                </a>

            </div>
            <div class="my-2 bg-gray-600 h-[1px] max-w-[150px] mx-auto"></div>
        </div>
        <a href="<?=$main_url?>dashboard/" class="button">
            <div class="p-2.5 mt-5 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover">
                <i class="animated-icon fa-solid fa-house"></i>
                <span class="text-[16px] ml-4 font-medium">Dashboard</span>
            </div>
        </a>
        <div class="pl-2 text-left text-sm mt-2 mx-auto">
            <h1 class="textcolor-2 text-[14px] select-none">
                WEBSHOP
            </h1>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover text-white active dropdown" data-target="#submenu1">
            <i class="animated-icon fa-solid fa-hammer"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[16px] ml-4 text-gray-200 font-medium">Bestellingen</span>
                <span class="text-sm rotate-180" id="arrow1">
                    <i class="fa-solid fa-chevron-down rotate-180"></i>
                </span>
            </div>
        </div>
        <div class="bgcolor-2 rounded-md mt-2 hidden submenu" id="submenu1">
            <div class="text-left text-sm mt-2 mx-auto text-gray-200 font-medium">
                <!-- First button -->
                <a href="<?=$main_url?>dashboard/orders/new/">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 rounded-t-md mt-1 flex justify-between items-center">
                        Nieuwe Bestelling
                        <i class="animated-icon fa-solid fa-plus text-white"></i>

                    </h1>
                </a>
                <a href="<?=$main_url?>dashboard/orders/">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1 rounded-b-md">
                        Bestellingen
                    </h1>
                </a>
            </div>
        </div>





        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover text-white active dropdown" data-target="#submenu2">
            <i class="animated-icon fa-solid fa-boxes-stacked"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[16px] ml-4 text-gray-200 font-medium">Producten</span>
                <span class="text-sm rotate-180" id="arrow2">
                    <i class="fa-solid fa-chevron-down rotate-180"></i>
                </span>
            </div>
        </div>
        <div class="bgcolor-2 rounded-md mt-2 hidden submenu" id="submenu2">
            <div class="text-left text-sm mt-2 mx-auto text-gray-200 font-medium">
                <!-- First button -->
                <a href="<?=$main_url?>dashboard/products/new">

                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 rounded-t-md mt-1 flex justify-between items-center">
                        Nieuw Product
                        <i class="animated-icon fa-solid fa-plus text-white"></i>

                    </h1>
                </a>
                <!-- Button between (it has no round corners) -->
                <a href="<?=$main_url?>dashboard/products">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1">
                        Producten
                    </h1>
                </a>
                <a href="<?=$main_url?>dashboard/categories">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1">
                        Categorieën
                    </h1>
                </a>
                <a href="<?=$main_url?>dashboard/colors">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1">
                        Kleuren
                    </h1>
                </a>

                <!-- Last button -->
                <a href="<?=$main_url?>dashboard/deliverycosts">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1 rounded-b-md">
                        Bezorgingskosten
                    </h1>
                </a>
            </div>
        </div>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover text-white active dropdown" data-target="#submenu3">
            <i class="animated-icon fa-solid fa-warehouse"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[16px] ml-4 text-gray-200 font-medium">Voorraad</span>
                <span class="text-sm rotate-180" id="arrow3">
                    <i class="fa-solid fa-chevron-down rotate-180"></i>
                </span>
            </div>
        </div>
        <div class="bgcolor-2 rounded-md mt-2 hidden submenu" id="submenu3">
            <div class="text-left text-sm mt-2 mx-auto text-gray-200 font-medium">
                <!-- First button -->
                <a href="<?=$main_url?>dashboard/stock">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 rounded-t-md mt-1">
                        Voorraad
                    </h1>
                </a>

                <a href="<?=$main_url?>dashboard/stock/history">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1 rounded-b-md">
                        Voorraad geschiedenis
                    </h1>
                </a>
            </div>
        </div>
        <div class="pl-2 text-left text-sm mt-2 mx-auto">
            <h1 class="textcolor-2 text-[14px] select-none">
                COMMUNICATION
            </h1>
        </div>

        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover text-white active dropdown" data-target="#submenu4">
            <i class="animated-icon fa-solid fa-envelope"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[16px] ml-4 text-gray-200 font-medium">Mail</span>
                <span class="text-sm rotate-180" id="arrow4">
                    <i class="fa-solid fa-chevron-down rotate-180"></i>
                </span>
            </div>
        </div>
        <div class="bgcolor-2 rounded-md mt-2 hidden submenu" id="submenu4">
            <div class="text-left text-sm mt-2 mx-auto text-gray-200 font-medium">
                <!-- First button -->
                <!-- <a href="https://mail.kobyskreaties.nl/" target="_blank">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 rounded-t-md mt-1">
                        Mijn E-Mail
                    </h1>
                </a> -->
                <!-- Button between (it has no round corners) -->
                <a href="https://kobyskreaties.nl/rainloop/" target="_blank">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1 rounded-md">
                        Mijn E-Mail
                    </h1>
                </a>

                <!-- Last button -->
                <!-- <a href="#">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1 rounded-b-md">
                        Force Daily Summery
                    </h1>
                </a> -->
            </div>
        </div>
        <div class="pl-2 text-left text-sm mt-2 mx-auto">
            <h1 class="textcolor-2 text-[14px] select-none">
                SYSTEM
            </h1>
        </div>
        <a href="<?=$main_url?>dashboard/media" class="button">
            <div class="p-2.5 mt-5 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover">
                <i class="animated-icon fa-solid fa-images"></i>
                <span class="text-[16px] ml-4 font-medium">Media</span>
            </div>
        </a>
        <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover text-white active dropdown" data-target="#submenu5">
            <i class="animated-icon fa-solid fa-hammer"></i>
            <div class="flex justify-between w-full items-center">
                <span class="text-[16px] ml-4 text-gray-200 font-medium">DirectAdmin</span>
                <span class="text-sm rotate-180" id="arrow5">
                    <i class="fa-solid fa-chevron-down rotate-180"></i>
                </span>
            </div>
        </div>
        <div class="bgcolor-2 rounded-md mt-2 hidden submenu" id="submenu5">
            <div class="text-left text-sm mt-2 mx-auto text-gray-200 font-medium">
                <!-- First button -->
                <a href="https://web0150.zxcs.nl:2222/CMD_SHOW_DOMAIN?domain=kobyskreaties.nl" target="_blank">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 rounded-t-md mt-1">
                        Config Kobyskreaties
                    </h1>
                </a>
                <!-- Button between (it has no round corners) -->
                <a href="https://web0150.zxcs.nl:2222/CMD_SHOW_DOMAIN?domain=console.kobyskreaties.nl" target="_blank">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1">
                        Config Console
                    </h1>
                </a>

                <a href="https://web0150.zxcs.nl:2222/CMD_SHOW_LOG?domain=kobyskreaties.nl&type=error&lines=100" target="_blank">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1">
                        Errors Kobyskreaties
                    </h1>
                </a>

                <a href="https://web0150.zxcs.nl:2222/CMD_SHOW_LOG?domain=console.kobyskreaties.nl&type=error&lines=100" target="_blank">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1">
                        Errors Console
                    </h1>
                </a>

                <a href="https://web0150.zxcs.nl/CMD_SHOW_LOG?domain=mail.kobyskreaties.nl&type=error&lines=100" target="_blank">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1">
                        Error Mail
                    </h1>
                </a>

                <!-- Last button -->
                <a href="http://kobyskreaties.nl/letsdebug" target="_blank">
                    <h1 class="px-3 py-3 cursor-pointer p-2 sidebar-button-hover-2 mt-1 rounded-b-md">
                        Let's Debug
                    </h1>
                </a>
            </div>
        </div>
        <a href="http://kobyskreaties.nl/phpmyadmin/" class="button" target="_blank">
            <div class="p-2.5 mt-5 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover">
                <i class="animated-icon fa-solid fa-server"></i>
                <span class="text-[16px] ml-4 font-medium">phpmyadmin</span>
            </div>
        </a>
        <a href="<?=$main_url?>dashboard/logout" class="button">
            <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer sidebar-button-hover text-white">
                <i class="animated-icon fa-solid fa-right-from-bracket"></i>
                <span class="text-[15px] ml-4 text-gray-200 font-medium">Uitloggen</span>
            </div>
        </a>
    </div>