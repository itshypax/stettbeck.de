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
                    Administrative-Benutzer bearbeiten
                </h2>
            </div>
            <div class="col text-end"><a href="create.php" class="btn btn-outline-success"><i class="fa-solid fa-plus"></i> Neuen Benutzer erstellen</a></div>
        </div>

        <table class="table table-hover" id="user-liste-ges">
            <thead>
                <tr class="bg-sh-blue text-light shadow-sm">
                    <th scope="col">ID</th>
                    <th scope="col">Benutzername</th>
                    <th scope="col">Erstellt am</th>
                    <th scope="col">Rechte</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM login");
                while ($row = mysqli_fetch_array($result)) {
                    $datetime = new DateTime($row['created_at']);
                    $date = $datetime->format('d.m.Y H:i:s');

                    if ($row['manage_users'] == 1) {
                        $m_users = "<div class='btn btn-success btn-tag-size me-1'>Benutzer bearbeiten</div>";
                    } else {
                        $m_users = "<div class='btn btn-danger btn-tag-size me-1'>Benutzer bearbeiten</div>";
                    }

                    if ($row['manage_firms'] == 1) {
                        $m_firms = "<div class='btn btn-success btn-tag-size me-1'>Firmen bearbeiten</div>";
                    } else {
                        $m_firms = "<div class='btn btn-danger btn-tag-size me-1'>Firmen bearbeiten</div>";
                    }

                    if ($row['manage_articles'] == 1) {
                        $m_articles = "<div class='btn btn-success btn-tag-size me-1'>Artikel bearbeiten</div>";
                    } else {
                        $m_articles = "<div class='btn btn-danger btn-tag-size me-1'>Artikel bearbeiten</div>";
                    }

                    echo "<tr>";
                    echo "<td >" . $row['id'] . "</td>";
                    if ($row['fullname'] != NULL) {
                        echo "<td>" . $row['username'] . " <em>(" . $row['fullname'] . ")</em></td>";
                    } else {
                        echo "<td>" . $row['username'] . "</td>";
                    }
                    echo "<td>" . $date . "</td>";
                    echo "<td>" . $m_users . $m_firms . $m_articles . "</td>";
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