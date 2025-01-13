<?php
require $_SERVER['DOCUMENT_ROOT'] . '/assets/php/db.php';

session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: /admin/login.php");
} elseif ($_SESSION['manage_users'] != 1) {
    header("Location: /admin/403.php");
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

if (isset($_POST['new']) && $_POST['new'] == 1) {
    $username = $_REQUEST['username'];
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    $mfirms = $_REQUEST['mfirms'];
    $martics = $_REQUEST['martics'];
    $jetzt = date("Y-m-d H:i:s");

    mysqli_query($conn, "INSERT INTO login (username, passwort, created_at, manage_firms, manage_articles) VALUES ('$username', '$password', '$jetzt', '$mfirms', '$martics')") or die(mysqli_error($conn));
    header("Location: /admin/benutzer/");
}

?>

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
    <meta property="og:url" content="https://stettbeck.de/" />
    <meta property="og:title" content="Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
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
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-5">
                    Benutzerkonto anlegen
                </h2>
            </div>
            <div class="col text-end">
                <a href="/admin/benutzer/" class="btn btn-outline-sh-blue"><i class="fa-solid fa-arrow-left"></i> Zur Übersicht</a> <span class="mx-1"></span>
            </div>
        </div>

        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <div class="row">
                <div class="col mb-3">
                    <label for="username" class="form-label fw-bold">Benutzername <span class="text-sh-red">*</span></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="" required>
                </div>
                <div class="col mb-3">
                    <label for="password" class="form-label fw-bold">Passwort <span class="text-sh-red">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="mfirms" class="form-label fw-bold">Kann Firmen bearbeiten? <span class="text-sh-red">*</span></label>
                    <select class="form-select" name="mfirms" id="mfirms" autocomplete="off" required>
                        <option hidden disabled selected>Bitte wählen</option>
                        <option value="0">Nein</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="martics" class="form-label fw-bold">Kann Artikel bearbeiten? <span class="text-sh-red">*</span></label>
                    <select class="form-select" name="martics" id="martics" autocomplete="off" required>
                        <option hidden disabled selected>Bitte wählen</option>
                        <option value="0">Nein</option>
                        <option value="1">Ja</option>
                    </select>
                </div>
                <div class="col mb-3">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3 mx-auto">
                    <input class="btn btn-outline-success btn-lg" name="submit" type="submit" value="Benutzer anlegen" />
                </div>
            </div>
        </form>


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
    <script src="/backtotop.js"></script>
    <script src="../navmenu.js"></script>
    <script src="/biggerimage.js"></script>

    <script src="/assets/bootstrap-5.3/js/bootstrap.min.js"></script>
</body>

</html>