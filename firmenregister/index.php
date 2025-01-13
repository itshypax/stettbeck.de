<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Firmenregister &rsaquo; Hansestadt Stettbeck</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/css/style.min.css" />
    <link rel="stylesheet" href="../assets/fonts/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../assets/fonts/ptsans/css/all.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap-5.3/css/bootstrap.min.css">
    <script src="/assets/bootstrap-5.3/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/favicon.ico" />
    <!-- Metas -->
    <meta name="theme-color" content="#de2b14" />
    <meta property="og:site_name" content="NordNetzwerk" />
    <meta property="og:url" content="https://stettbeck.de/firmenregister" />
    <meta property="og:title" content="Firmenregister - Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="Unser amtliches Firmenregister aller staatlicher, halbstaatlicher und ziviler Firmen in Stettbeck." />
    <?php $activePage = "firmenregister"; ?>
</head>

<body>
    <!-- NAV BEGIN -->
    <?php
    $pageTitle = "Firmenregister";
    $pageSubTitle = "Amt für Wirtschaft, Arbeit und Finanzen";
    include "../assets/php/topnav.php"; ?>
    <!-- NAV END -->
    <!-- BEHÖRDENBANNER BEGIN -->
    <?php include "../assets/php/behbanner.php"; ?>
    <!-- BEHÖRDENBANNER END -->
    <!-- PAGE INFO BEGIN -->
    <div class="container my-5" id="pageInfoNav">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Amt für Wirtschaft, Arbeit und Finanzen</a></li>
                <li class="breadcrumb-item"><a href="/firmenregister/">Firmenregister</a></li>
            </ol>
        </nav>
    </div>
    <!-- CONTENT BEGIN -->
    <h2 class="mb-5 text-center">Firmen-/Unternehmensregister</h2>
    <hr class="my-5 text-light" />
    <!-- PLAYERBASED BEGIN -->
    <div class="container" id="playerbased-business">

        <!-- ! AUTOMATION -->

        <?php
        require "../assets/php/db.php";
        $result = mysqli_query($conn, "SELECT * FROM unternehmensregister WHERE firma_geschlossen = 0");
        // convert result to an array
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        foreach (array_chunk($result, 3) as $parted) {
            echo '<div class="row mb-3">';
            foreach ($parted as $row) {

                if ($row['firma_beschreibung'] != NULL) {
                    $beschreibung = $row['firma_beschreibung'];
                } else {
                    $beschreibung = "[Beschreibung fehlt.]";
                }

                if ($row['firma_telnr'] != NULL) {
                    $telefon = $row['firma_telnr'];
                } else {
                    $telefon = "[TNr. fehlt.]";
                }

                if ($row['firma_hausnr'] > 99) {
                    $hausnr = $row['firma_hausnr'];
                } else {
                    $hausnr = "[HNr. fehlt.]";
                }

                if ($row['firma_chef'] != NULL) {
                    $chef = $row['firma_chef'];
                } else {
                    $chef = "[GF fehlt.]";
                }

                if ($row['firma_bwstatus'] == 1) {
                    $bwstatus = "Offen";
                } else {
                    $bwstatus = "Geschlossen";
                }

                $string = $row['firma_customtag'];
                $string_ex = explode(",", $string);
        ?>

                <div class="col bg-sh-gray mb-3 mx-2 border-top shadow-sm border-4 border-sh-red position-relative">
                    <div>
                        <div class="px-3 pt-3">
                            <div class="row align-self-center">
                                <div class="col text-start">
                                    <h3 class="fw-bold text-sh-blue border-bottom border-1 border-sh-blue mb-0">
                                        <?php echo $row['firma_name']; ?> <?php if ($row['firma_foerder'] == 1) { ?> <i title="Diese Firma ist staatlich gefördert." class="text-sh-red fa-2xs fa-solid fa-rocket-launch"></i> <?php } ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <hr class="my-1 text-sh-gray mx-3" />
                        <div class="mx-3">
                            <?php if ($row['firma_status'] == 0) { ?>
                                <div class="btn btn-warning btn-tag-size me-1">
                                    Ausstehend
                                </div>
                            <?php } elseif ($row['firma_status'] == 1) { ?>
                                <div class="btn btn-success btn-tag-size me-1">
                                    Eröffnet
                                </div>
                            <?php } elseif ($row['firma_status'] == 2) { ?>
                                <div class="btn btn-danger btn-tag-size me-1">
                                    Temp. Geschlossen
                                </div>
                            <?php } ?>
                            <?php
                            if ($row['firma_customtag'] != NULL) {
                                foreach ($string_ex as $ctags) { ?>
                                    <div class="btn btn-sh-tags btn-tag-size">
                                        <i class="fa-solid fa-tag"></i> <?= $ctags ?>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                        <div class="pt-2 px-3 pb-3">
                            <p class="pb-2"><?= $beschreibung ?></p>
                            <div class="row my-2">
                                <div class="col">
                                    <strong>Geschäftsführer:</strong><br /><?= $chef ?>
                                </div>
                            </div>
                            <?php if ($row['firma_bwstatus'] != 0) { ?>
                                <div class="row my-2">
                                    <div class="col">
                                        <strong>Bewerbungsstatus:</strong><br /><?= $bwstatus ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="row my-2">
                                <div class="col">
                                    <strong>Hausnummer:</strong><br /><?= $hausnr ?>
                                </div>
                                <div class="col">
                                    <strong>Telefon:</strong><br /><?= $telefon ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        <?php
            }
            echo '</div>';
        }

        ?>

        <!-- ! AUTOMATION -->
    </div>
    <!-- PLAYERBASED END -->
    <hr class="my-5 text-light" />
    <!-- FOOTER BEGIN -->
    <?php include "../assets/php/footerbot.php"; ?>
    <!-- FOOTER END -->

    <!-- Back to top button -->
    <button type="button" class="btn btn-sh-stt shadow btn-floating btn-lg" id="btn-back-to-top">
        <i class="fa-light fa-arrow-up"></i>
    </button>
    <script src="../backtotop.js"></script>
    <script src="../navmenu.js"></script>
    <script src="/biggerimage.js"></script>

</body>

</html>