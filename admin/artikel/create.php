<?php
require $_SERVER['DOCUMENT_ROOT'] . '/assets/php/db.php';

session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: /admin/login.php");
} elseif ($_SESSION['manage_articles'] != 1) {
    header("Location: /admin/403.php");
}

if (isset($_POST['new']) && $_POST['new'] == 1) {
    $type = $_REQUEST['type'];
    $title = $_REQUEST['title'];
    if ($_REQUEST['shortdesc'] == "") {
        $shortdesc = "Keine Kurzbeschreibung vorhanden.";
    } else {
        $shortdesc = $_REQUEST['shortdesc'];
    }
    $content = $_REQUEST['content'];
    $created_by = $_SESSION['name'];
    $created_at = date("Y-m-d H:i:s");


    mysqli_query($conn, "INSERT INTO artikel (type, title, shortdesc, content, created_by, created_at) VALUES ('$type', '$title', '$shortdesc', '$content', '$created_by', '$created_at')") or die(mysqli_error($conn));
    header("Location: /admin/artikel/");
}

// ------------------------------
// ! Artikelbild / Headerbild fehlt noch !
// ------------------------------

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
    <!-- Redactor -->
    <link rel="stylesheet" href="/assets/redactorx/redactorx.min.css">
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
                    Artikel erstellen
                </h2>
            </div>
            <div class="col text-end">
                <a href="/admin/artikel/" class="btn btn-outline-sh-blue"><i class="fa-solid fa-arrow-left"></i> Zur Übersicht</a> <span class="mx-1"></span>
            </div>
        </div>

        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <div class="row">
                <div class="col mb-3">
                    <label for="type" class="form-label fw-bold">Artikelbezeichnung <span class="text-sh-red">*</span></label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="" required>
                </div>
                <div class="col mb-3">
                    <label for="title" class="form-label fw-bold">Titel <span class="text-sh-red">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="" required>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="shortdesc" class="form-label fw-bold">Kurzbeschreibung</label>
                    <textarea class="form-control" name="shortdesc" id="shortdesc" rows="2" style="resize:none"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3">
                    <label for="content" class="form-label fw-bold">Inhalt</label>
                    <textarea class="form-control" name="content" id="content" rows="2"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col mb-3 mx-auto">
                    <input class="btn btn-outline-success btn-lg" name="submit" type="submit" value="Artikel anlegen" />
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
    <!-- REDACTOR X -->
    <script src="/assets/redactorx/redactorx.min.js"></script>
    <script src="/assets/redactorx/plugins/blockcode/blockcode.min.js"></script>
    <script src="/assets/redactorx/plugins/counter/counter.min.js"></script>
    <script src="/assets/redactorx/plugins/imageposition/imageposition.min.js"></script>
    <script src="/assets/redactorx/plugins/selector/selector.min.js"></script>
    <script>
        RedactorX('#content', {
            plugins: ['blockcode'],
            plugins: ['counter'],
            plugins: ['imageposition'],
            plugins: ['selector'],
            classes: {
                blocks: {
                    'figcaption': 'decorated-text',
                    'image': 'shadow'
                }
            },
            format: ['p', 'h2', 'h3', 'ul', 'ol'],
            context: true,
            control: true
        });
    </script>
</body>

</html>