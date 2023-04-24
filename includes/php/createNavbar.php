<nav class="bg-white">
            <div class="flex items-center justify-between mx-auto p-5">
                <div class="relative flex items-center">
                    <input type="text" class="block w-full p-2 pl-10 text-sm text-gray-900 border rounded-lg" placeholder="Zoeken naar producten...">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>

                <!-- Profile icon and dropdown menu -->

                <div class="flex items-center top-menu">
                    <div class="relative flex items-center">
                        <a href="https://kobyskreaties.nl/rainloop/" class="" target="_blank">
                            <div class="h-8 w-8 flex items-center justify-center rounded-full bg-gray-200 text-gray-500 hover:text-gray-600 hover:bg-gray-300 absolute top-1/2 transform -translate-y-1/2 right-0">
                                <i class="animated-icon fas fa-envelope"></i>
                            </div>
                        </a>
                    </div>

                    <div class="h-8 w-[.5px] bg-gray-300 m-2 rounded-lg"></div>

                    <button type="button" class="flex items-center text-gray-500 hover:text-gray-700 focus:outline-none" id="profile">
                        <img class="w-8 h-8 rounded-full" src="<?=$navbar_icon?>" alt="Profile">
                        <span class="ml-2 text-sm font-medium"><?=$navbar_account_name?></span>
                    </button>

                    <div class="absolute top-[60px] right-[5px] z-10 w-48 py-2 mt-8 bg-white rounded-md shadow-xl hidden" id="profile-popup">
                        <a href="<?= $main_url ?>dashboard/profiel.php"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Profile</a>
                        <a href="<?= $main_url ?>dashboard/settings.php"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Settings</a>
                        <a href="<?= $main_url ?>dashboard/logout.php"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">Logout</a>
                    </div>
                </div>
            </div>
            <!-- underline -->
            <!-- <div class="border-b border-gray-200"></div> -->
        </nav>