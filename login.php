<?php require_once 'includes/php/actions.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="<?= $main_url ?>includes/css/style.css" rel="stylesheet" type="text/css" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inloggen - kobyskreaties</title>
  <!-- link icon -->
  <link rel="icon" href="https://cdn.discordapp.com/attachments/1021413861552828466/1025313412869259284/removal.ai_edf5bed7-5483-4b32-aa6f-cc6da03ce279.png" type="image/x-icon" />
</head>
<?php
session_start();
?>
<body>

  <body class="">
    <div class="flex min-h-full flex-col justify-center lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-40 w-auto rounded-full" src="http://www.kobyskreaties.nl//includes/images/logo_with_whitebg.jpg" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Inloggen op Console</h2>
      </div>

      <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">
        <!-- error message -->
        <?php
        if (isset($_SESSION['error'])) {
          echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <strong class="font-bold">Error!</strong>
          <span class="block sm:inline">' . $_SESSION['error'] . '</span>
        </div>';
          
          unset($_SESSION['error']);
        }
        ?>
        <form class="space-y-6" action="./logincheck.php" method="POST">
          <div class="mt-2">
              <?= createInput('E-mail', 'E-mail', 'email', 'email', true) ?> 
          </div>

          <div class="mt-2">
            <?= createInput('Wachtwoord', 'Wachtwoord', 'password', 'password', true) ?>
          </div>

          <div>
            <button type="submit" class="p-4 flex w-full justify-center rounded-lg px-3 text-sm font-semibold text-white shadow-sm bg-gray-900 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500
            ">Inloggen</button>
          </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
          Verkeerde pagina?
          <a href="https://kobyskreaties.nl" class="font-semibold leading-6 text-color-3">Klik hier om terug te gaan</a>
        </p>
      </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="<?= $main_url ?>includes/js/loadFontAwesome.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/19.0.0/tween.umd.js"></script>
    <script src="<?= $main_url ?>includes/js/numberAnimation.js" type="text/javascript"></script>
    <script src="<?= $main_url ?>includes/js/main.js" type="text/javascript"></script>
  </body>

</html>