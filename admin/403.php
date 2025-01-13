<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administration &rsaquo; Hansestadt Stettbeck</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/assets/css/style.min.css" />
    <link rel="stylesheet" href="/assets/fonts/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="/assets/fonts/ptsans/css/all.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap-5.3/css/bootstrap.min.css">
    <script src="/assets/bootstrap-5.3/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="/assets/img/favicon.ico" />
    <!-- Metas -->
    <meta name="theme-color" content="#de2b14" />
    <meta property="og:site_name" content="NordNetzwerk" />
    <meta property="og:url" content="https://stettbeck.de/firmenregister" />
    <meta property="og:title" content="Firmenregister - Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="Unser amtliches Firmenregister aller staatlicher, halbstaatlicher und ziviler Firmen in Stettbeck." />
    <?php $activePage = "fr-cp"; ?>
</head>

<body>
    <!-- NAV BEGIN -->
    <?php
    $pageTitle = "Website";
    $pageSubTitle = "Administration";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/php/topnav.php"; ?>
    <!-- NAV END -->
    <hr class="my-5 text-light" />
    <!-- BEARBEITEN -->
    <div class="container rounded-3 bg-danger text-center p-5">
        <img src="/assets/img/1_500px.png" alt="Nordy" height="156" width="auto">
        <h2 class="mt-4 text-light fw-bold">Oh oh! Da ist wohl was schief gelaufen!</h2>
        <p class="text-light">Sieht so aus als könnte nicht mal Nordy dir helfen!<br>Da wo du hinmöchtest, hast du wohl einfach keine Rechte!</p>
        <a href="/admin" class="btn btn-light shadow btn-lg">Zurück zum Dashboard</a>
    </div>
    <!-- BEARBEITEN -->
    <hr class="my-5 text-light" />
    <!-- FOOTER BEGIN -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/php/footerbot.php"; ?>
    <!-- FOOTER END -->

    <!-- Back to top button -->
    <button type="button" class="btn btn-sh-stt shadow btn-floating btn-lg" id="btn-back-to-top">
        <i class="fa-light fa-arrow-up"></i>
    </button>
    <script src="../backtotop.js"></script>
    <script src="../navmenu.js"></script>
    <script src="/biggerimage.js"></script>

    <script src="tablesearch.js"></script>
    <script src="/assets/bootstrap-5.3/js/bootstrap.min.js"></script>
</body>

</html>