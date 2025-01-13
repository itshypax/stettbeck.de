<?php
require $_SERVER['DOCUMENT_ROOT'] . '/assets/php/db.php';

session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: /admin/login.php");
} elseif ($_SESSION['manage_firms'] != 1) {
    header("Location: /admin/403.php");
}

//Abfrage der Nutzer ID vom Login
$userid = $_SESSION['userid'];

if (isset($_POST['new']) && $_POST['new'] == 1) {
    $firmaname = $_REQUEST['firmaname'];
    $firmagf = $_REQUEST['firmagf'];
    $firmabeschr = $_REQUEST['firmabeschr'];
    $firmahnr = $_REQUEST['firmahnr'];
    $firmatnr = $_REQUEST['firmatnr'];
    $firmabew = $_REQUEST['firmabew'];
    $firmafoerd = $_REQUEST['firmafoerd'];
    $firmastatus = $_REQUEST['firmastatus'];
    $firmactag = $_REQUEST['firmactag'];
    $jetzt = date("Y-m-d");

    mysqli_query($conn, "INSERT INTO unternehmensregister (firma_name, firma_chef, firma_beschreibung, firma_hausnr, firma_telnr, firma_bwstatus, firma_foerder, firma_status, firma_customtag, firma_datum) VALUES ('$firmaname', '$firmagf', '$firmabeschr', '$firmahnr', '$firmatnr', '$firmabew', '$firmafoerd', '$firmastatus', '$firmactag', '$jetzt')") or die(mysqli_error($conn));
    header("Location: /admin/firmen/");
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
                    Unternehmen anlegen
                </h2>
            </div>
            <div class="col text-end">
                <a href="/admin/firmen/" class="btn btn-outline-sh-blue"><i class="fa-solid fa-arrow-left"></i> Zur Übersicht</a> <span class="mx-1"></span>
            </div>
        </div>

        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <div class="row">
                <div class="col mb-3">
                    <label for="firmaname" class="form-label fw-bold">Firmenname <span class="text-sh-red">*</span></label>
                    <input type="text" class="form-control" id="firmaname" name="firmaname" placeholder="Vinumi GmbH" required>
                </div>
                <div class="col mb-3">
                    <label for="firmagf" class="form-label fw-bold">Geschäftsführer</label>
                    <input type="text" class="form-control" id="firmagf" name="firmagf" placeholder="Freiherr Daniel von May">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="firmabeschr" class="form-label fw-bold">Beschreibung</label>
                    <textarea name="firmabeschr" id="firmabeschr" style="resize: none;height:75px" class="form-control"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="firmahnr" class="form-label fw-bold">Hausnummer</label>
                    <input type="text" class="form-control" id="firmahnr" name="firmahnr" placeholder="1234">
                </div>
                <div class="col mb-3">
                    <label for="firmatnr" class="form-label fw-bold">Telefonnummer</label>
                    <input type="text" class="form-control" id="firmatnr" name="firmatnr" placeholder="0800 666 666">
                </div>
                <div class="col mb-3">
                    <label for="firmabew" class="form-label fw-bold">Bewerbungsstatus <span class="text-sh-red">*</span></label>
                    <select class="form-select" name="firmabew" id="firmabew" autocomplete="off" required>
                        <option hidden disabled selected>Bitte wählen</option>
                        <option value="0">Keine Bewerbungen</option>
                        <option value="1">Offen</option>
                        <option value="2">Geschlossen</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="firmafoerd" class="form-label fw-bold">Förderstatus <span class="text-sh-red">*</span></label>
                    <select class="form-select" name="firmafoerd" id="firmafoerd" autocomplete="off" required>
                        <option hidden disabled selected>Bitte wählen</option>
                        <option value="0">Nicht gefördert</option>
                        <option value="1">Gefördert</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="firmastatus" class="form-label fw-bold">Firmenstatus <span class="text-sh-red">*</span></label>
                    <select class="form-select" name="firmastatus" id="firmastatus" autocomplete="off" required>
                        <option hidden disabled selected>Bitte wählen</option>
                        <option value="0">Ausstehend</option>
                        <option value="1">Eröffnet</option>
                        <option value="2">Temp. Geschlossen</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="firmactag" class="form-label fw-bold">Eigener Tag</label>
                    <input type="text" class="form-control" id="firmactag" name="firmactag" placeholder="Dienstleister">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3 mx-auto">
                    <input class="btn btn-outline-success btn-lg" name="submit" type="submit" value="Firma anlegen" />
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