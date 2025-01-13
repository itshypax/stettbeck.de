<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Die Landespolizei in Stettbeck &rsaquo; Hansestadt Stettbeck</title>
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
    <?php
    $articleName = "Die Landespolizei in Stettbeck";
    $shortDesc = "Alles rund um die Landespolizeidirektion Stettbeck.";
    ?>
    <meta name="theme-color" content="#de2b14" />
    <meta property="og:site_name" content="NordNetzwerk" />
    <meta property="og:url" content="https://stettbeck.de/" />
    <meta property="og:title" content="<?php echo $articleName ?> - Stadtportal der Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="<?php echo $shortDesc ?>" />
    <?php $activePage = "polizei"; ?>
</head>

<body>
    <!-- NAV BEGIN -->
    <?php include "../assets/php/topnav.php"; ?>
    <!-- NAV END -->
    <!-- BEHÖRDENBANNER BEGIN -->
    <?php include "../assets/php/behbanner.php"; ?>
    <!-- BEHÖRDENBANNER END -->
    <!-- PAGE INFO BEGIN -->
    <div class="container my-5" id="pageInfoNav">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="/polizei/index">Landespolizei Stettbeck</a></li>
            </ol>
        </nav>
    </div>
    <div class="container bg-sh-gray px-5 py-3 position-relative" id="pageInfo">
        <div class="row px-5 mt-4 mb-5">
            <div class="col">
            </div>
        </div>
        <div class="row px-5">
            <div class="col">
                <h1 class="text-sh-blue mb-3"><?php echo $articleName ?></h1>
                <h5 class="text-sh-blue">Stand: 19. Februar 2023</h5>
            </div>
        </div>
        <div class="my-5"></div>
        <?php

        $current_file = basename($_SERVER['PHP_SELF']);

        if (strpos($current_file, '.php') == false) {
            // The current file does not have a .php extension
            $current_file = $current_file . '.php';
        }

        $html = file_get_contents($current_file);

        // Load the HTML content into a DOMDocument object
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();

        // Get all the h6 elements
        $h2s = $dom->getElementsByTagName('h2');

        // Check if the amount of h2s is bigger than 0
        if ($h2s->length > 0) {

            // Create a select element
            echo '<hr class="my-3 text-sh-gray">';
            echo '<div id="articleContentNav">';
            echo '<button class="article-button shadow ps-4">Inhalte dieser Seite</button>';

            echo  '<div class="article-dropdown shadow ps-3">';
            // Output the h6 elements
            foreach ($h2s as $h2) {
                $optionValue = '#' . $h2->getAttribute('id');
                $optionText = $h2->nodeValue;
                $optionElement = '<a href="' . $optionValue . '" class="my-2"><i class="fa-light fa-arrow-down" style="color:var(--nn-blue);padding-right:15px;"></i>' . $optionText . '</a>';

                // Add the option to the select element
                echo $optionElement;
            }

            // Close the select element
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
    <!-- PAGE INFO END -->
    <!-- CONTENT BEGIN -->
    <div class="container px-5 py-3 mt-5" id="artikelContent">
        <div class="px-5 text-sh-blue" style="text-align:justify">
            <h2 id="ueber-die-landespolizei">Über die Landespolizei</h2>
            <p>Die Landespolizei SH, genauer die Landespolizeidirektion der Freien Hansestadt Stettbeck, kommt immer dann zum Einsatz wenn Bürgerinnen und Bürger in Ausnahmesituationen sind. Neben der Strafverfolgung und Kriminalprävention übernimmt die Polizei ein breites Spektrum an Aufgaben zur Verbesserung und Erhaltung der Bürgersicherheit.</p>
            <h2 id="aufgaben-der-landespolizei">Aufgaben der Landespolizei</h2>
            <ul>
                <li>
                    <strong>Ordinäre Aufgaben</strong>
                    <br>
                    Zu den ordinären Aufgaben der Landespolizei gehören vor allem die Gefahrenabwehr, Kriminalprävention und Hilfeleistung.
                </li>
                <li>
                    <strong>Sekundäre Aufgaben</strong>
                    <br>
                    Als sekundäre Aufgaben der Landespolizei sind die Strafverfolgung, die Verfolgung von Ordnungswidrigkeiten, die Verkehrsregelung als auch der Verkehrdienst zu sehen. Ferner zählen aber auch die Amts- und Vollzugshilfe zu den Aufgaben der Landespolizei.
                </li>
            </ul>
            <h2 id="organisation-der-landespolizei">Organisation der Landespolizei</h2>
            <p>Die oberste Führung der Landespolizeidirektion stellt die Direktionsleitung dar. Diese besteht aus dem Inspekteur der Polizei (leitender Polizeidirektor) und den zwei eingesetzen Polizeidirektoren. Die eingesetzen Polizeidirektoren sind hierbei die Amtsleiter der zentralen Ämter und Institutionen.</p>
            <p><strong>Amt I</strong> - das Amt für Ausbildung und Personalentwicklung (Ausbildungsamt). Welches nicht nur die zentrale Koordination der eingesetzen Praxisanleiter und Prüfer übernimmt sondern auch für die innerpolizeiliche Aus- und Fortbildung zuständig ist.</p>
            <p><strong>Amt II</strong> - das Amt für Personalwesen (Personalamt). Welches nicht nur primär mit dem Bewerbermanagement sondern auch mit beamtenrechtlichen und arbeitsrechtlichen Anliegen betraut ist.</p>
            <p>In der weiteren polizeilichen Organisation sind auch weitere Führungspersonen (beispielsweise für dezentrale Ämter wie das Landeskriminalamt) oder die Dienstaufsichtsbehörde eingesetzt. </p>
            <div class="row position-relative">
                <div class="col">
                    <img src="/assets/img/polizei/Organigramm_POL.png" alt="Organigramm der Landespolizeidirektion SB" style="max-width:100%" height="auto" class="small-image shadow shadow" role="button" onclick="showLargeImage(event)">
                    <div class="large-image-container">
                        <img style="background-color:#fff" src="/assets/img/polizei/Organigramm_POL.png" alt="Organigramm der Landespolizeidirektion SB" class="large-image" onclick="hideLargeImage(event)" role="button">
                    </div>
                </div>
            </div>
            <p class="decorated-text mt-4">Das Organigramm der Landespolizeidirektion Hansestadt Stettbeck.</p>
        </div>
    </div>
    <!-- CONTENT END -->
    <hr class="my-5 text-light" />
    <!-- FOOTER BEGIN -->
    <?php include "../assets/php/footerbot.php"; ?>
    <!-- FOOTER END -->

    <!-- Back to top button -->
    <button type="button" class="btn btn-sh-stt-3 shadow btn-floating btn-lg" id="btn-back-to-top">
        <i class="fa-light fa-arrow-up"></i>
    </button>
    <script src="../backtotop.js"></script>
    <script src="../navmenu.js"></script>
    <script src="/biggerimage.js"></script>
    <script>
        const dropdownButton = document.querySelector('.article-button');
        const dropdownMenu = document.querySelector('.article-dropdown');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', function(e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });

        dropdownMenu.addEventListener('click', function(e) {
            if (e.target.tagName === 'A') {
                dropdownMenu.classList.remove('show');
            }
        });
    </script>
</body>

</html>