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

$result = mysqli_query($conn, "SELECT * FROM unternehmensregister WHERE id = " . $_GET['id']) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);

if (isset($_POST['new']) && $_POST['new'] == 1) {
    $id = $_REQUEST['id'];
    $firmaname = $_REQUEST['firmaname'];
    $firmagf = $_REQUEST['firmagf'];
    $firmabeschr = $_REQUEST['firmabeschr'];
    if ($_REQUEST['firmahnr'] > 99) {
        $firmahnr = $_REQUEST['firmahnr'];
    } else {
        $firmahnr = NULL;
    }
    $firmahnr = $_REQUEST['firmahnr'];
    $firmatnr = $_REQUEST['firmatnr'];
    $firmabew = $_REQUEST['firmabew'];
    $firmafoerd = $_REQUEST['firmafoerd'];
    $firmastatus = $_REQUEST['firmastatus'];
    $firmactag = $_REQUEST['firmactag'];
    $jetzt = date("Y-m-d");

    mysqli_query($conn, "UPDATE unternehmensregister SET firma_name='" . $firmaname . "', firma_chef='" . $firmagf . "', firma_beschreibung='" . $firmabeschr . "', firma_hausnr='" . $firmahnr . "', firma_telnr='" . $firmatnr . "', firma_bwstatus='" . $firmabew . "', firma_foerder='" . $firmafoerd . "', firma_status='" . $firmastatus . "', firma_customtag='" . $firmactag . "', firma_lastedit='" . $jetzt . "' WHERE id='" . $id . "'") or die(mysqli_error($conn));
    header("Refresh:0");
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
                    Unternehmen bearbeiten
                </h2>
            </div>
            <div class="col text-end">
                <a href="/admin/firmen/" class="btn btn-outline-sh-blue"><i class="fa-solid fa-arrow-left"></i> Zur Übersicht</a> <span class="mx-1"></span>
                <button class="btn btn-sh-red" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-trash"></i> Firma permanent schließen</button>
            </div>
        </div>

        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <input name="id" type="hidden" value="<?php echo $row['id']; ?>" />
            <div class="row">
                <div class="col mb-3">
                    <label for="firmaname" class="form-label fw-bold">Firmenname</label>
                    <input type="text" class="form-control" id="firmaname" name="firmaname" value="<?= $row['firma_name'] ?>">
                </div>
                <div class="col mb-3">
                    <label for="firmagf" class="form-label fw-bold">Geschäftsführer</label>
                    <input type="text" class="form-control" id="firmagf" name="firmagf" value="<?= $row['firma_chef'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="firmabeschr" class="form-label fw-bold">Beschreibung</label>
                    <textarea name="firmabeschr" id="firmabeschr" style="resize: none;height:75px" class="form-control"><?php
                                                                                                                        echo $row['firma_beschreibung']
                                                                                                                        ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="firmahnr" class="form-label fw-bold">Hausnummer</label>
                    <input type="number" class="form-control" id="firmahnr" name="firmahnr" value="<?= $row['firma_hausnr'] ?>">
                </div>
                <div class="col mb-3">
                    <label for="firmatnr" class="form-label fw-bold">Telefonnummer</label>
                    <input type="text" class="form-control" id="firmatnr" name="firmatnr" value="<?= $row['firma_telnr'] ?>">
                </div>
                <div class="col mb-3">
                    <label for="firmabew" class="form-label fw-bold">Bewerbungsstatus</label>
                    <select class="form-select" name="firmabew" id="firmabew" autocomplete="off">
                        <option value="0" <?php if ($row['firma_bwstatus'] == 0) echo 'selected'; ?>>Keine Bewerbungen</option>
                        <option value="1" <?php if ($row['firma_bwstatus'] == 1) echo 'selected'; ?>>Offen</option>
                        <option value="2" <?php if ($row['firma_bwstatus'] == 2) echo 'selected'; ?>>Geschlossen</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="firmafoerd" class="form-label fw-bold">Förderstatus</label>
                    <select class="form-select" name="firmafoerd" id="firmafoerd" autocomplete="off">
                        <option value="0" <?php if ($row['firma_foerder'] == 0) echo 'selected'; ?>>Nicht gefördert</option>
                        <option value="1" <?php if ($row['firma_foerder'] == 1) echo 'selected'; ?>>Gefördert</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="firmastatus" class="form-label fw-bold">Firmenstatus</label>
                    <select class="form-select" name="firmastatus" id="firmastatus" autocomplete="off">
                        <option value="0" <?php if ($row['firma_status'] == 0) echo 'selected'; ?>>Ausstehend</option>
                        <option value="1" <?php if ($row['firma_status'] == 1) echo 'selected'; ?>>Eröffnet</option>
                        <option value="2" <?php if ($row['firma_status'] == 2) echo 'selected'; ?>>Temp. Geschlossen</option>
                    </select>
                </div>
                <div class="col mb-3">
                    <label for="firmactag" class="form-label fw-bold">Eigener Tag</label>
                    <input type="text" class="form-control" id="firmactag" name="firmactag" value="<?= $row['firma_customtag'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col mb-3 mx-auto">
                    <input class="btn btn-outline-success btn-lg" name="submit" type="submit" value="Änderungen speichern" />
                </div>
            </div>
        </form>


    </div>
    <!-- BEARBEITEN -->
    <hr class="my-5 text-light" />
    <!-- FOOTER BEGIN -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/php/footerbot.php"; ?>
    <!-- FOOTER END -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Bestätigung erforderlich</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Willst du wirklich die Firma <span class="fw-bold"><?= $row['firma_name'] ?></span> löschen?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sh-blue" data-bs-dismiss="modal">Ne, Upsi</button>
                    <button type="button" class="btn btn-sh-red" onclick="window.location.href='delete.php?id=<?= $row['id'] ?>';">Firma löschen</button>
                </div>
            </div>
        </div>
    </div>

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