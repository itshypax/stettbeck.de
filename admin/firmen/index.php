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
                    Unternehmensregister bearbeiten
                </h2>
            </div>
            <div class="col text-end"><a href="create.php" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Neue Firma anlegen</a></div>
        </div>

        <!-- <div class="row">
            <div class="col"><input class="mb-3 w-100" type="text" id="firmenSuche" placeholder="Firmen durchsuchen"></div>
        </div> -->

        <table class="table table-hover" id="firmen-liste-ges">
            <thead>
                <tr class="bg-sh-blue text-light shadow-sm">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Besitzer</th>
                    <th scope="col" class="text-center">Status</th>
                    <th scope="col" class="text-center">Aktionen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM unternehmensregister");
                while ($row = mysqli_fetch_array($result)) {


                    if ($row['firma_geschlossen'] == 1) {
                        $status = "<div class='btn btn-danger btn-tag-size me-1'>Perm. Geschlossen</div>";
                    } elseif ($row['firma_status'] == 0) {
                        $status = "<div class='btn btn-warning btn-tag-size me-1'>Ausstehend</div>";
                    } elseif ($row['firma_status'] == 1) {
                        $status = "<div class='btn btn-success btn-tag-size me-1'>Eröffnet</div>";
                    } else {
                        $status = "<div class='btn btn-danger btn-tag-size me-1'>Temp. Geschlossen</div>";
                    }

                    echo "<tr>";
                    echo "<td >" . $row['id'] . "</td>";
                    echo "<td>" . $row['firma_name'] . "</td>";
                    echo "<td>" . $row['firma_chef'] . "</td>";
                    echo "<td class='text-center'>" . $status . "</td>";
                    if ($row['firma_geschlossen'] != 1) {
                        echo "<td class='text-center'><a href='edit.php?id=" . $row['id'] . "' class='btn btn-outline-sh-blue'><i class='fa-solid fa-pencil'></i></a></td>";
                    } else {
                        echo "<td></td>";
                    }
                    echo "</tr>";
                }
                if (mysqli_num_rows($result) == 0) {
                    echo "<tr>";
                    echo "<td colspan='5'>Keine Firmen vorhanden.</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

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