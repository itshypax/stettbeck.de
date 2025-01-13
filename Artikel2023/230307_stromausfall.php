<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Komplettausfall des Stettbecker Stromnetzes &rsaquo; Hansestadt Stettbeck</title>
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
    $articleName = "Komplettausfall des Stettbecker Stromnetzes";
    $shortDesc = "Im Verlauf der Nacht vom 07. März 2023 auf den 08. März 2023 kam es im gesamten Stettbecker Kommunalbereich zu einem etwa einstündigen Komplettausfall des Stromnetzes.";
    ?>
    <meta name="theme-color" content="#de2b14" />
    <meta property="og:site_name" content="NordNetzwerk" />
    <meta property="og:url" content="https://stettbeck.de/" />
    <meta property="og:title" content="<?php echo $articleName ?> - Stadtportal der Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="<?php echo $shortDesc ?>" />
    <?php $activePage = "safekun"; ?>
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
                <li class="breadcrumb-item"><a href="#">Kommunalverwaltung</a></li>
            </ol>
        </nav>
    </div>
    <div class="container bg-sh-gray px-5 py-3" id="pageInfo">
        <div class="row px-5 mt-4 mb-5">
            <div class="col">
            </div>
        </div>
        <div class="row px-5">
            <div class="col">
                <h1 class="text-sh-blue mb-3"><?php echo $articleName ?></h1>
                <h5 class="text-sh-blue">Stand: 07. März 2023</h5>
                <?php
                if ($shortDesc != "" or $shortDesc != null) {
                    echo '<hr class="text-sh-gray my-3"></hr>';
                    echo '<h5 class="text-sh-blue">' . $shortDesc . '</h5>';
                }
                ?>
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
            <h2 id="ereignis">Ereignis</h2>
            <div class="col-4 float-end mb-3 ms-3 m-w-100">
                <img src="/assets/img/preview/bhpcasino.png" alt="Behandlungsplatz der Feuerwehr" style="max-width:100%" height="auto" class="small-image shadow shadow" role="button" onclick="showLargeImage(event)">
                <div class="large-image-container">
                    <img src="/assets/img/preview/bhpcasino.png" alt="Behandlungsplatz der Feuerwehr" class="large-image" onclick="hideLargeImage(event)" role="button">
                </div>
                <p class="decorated-text mt-2">Die Feuerwehr richtete auf dem Parkplatz des Casinos einen Behandlungsplatz für Patienten ein.</p>
            </div>
            <p>Am Dienstagabend, den 07.03.2023, um etwa 21:00 Uhr wurde es dunkel in Stettbeck und Region. Aus zu diesem Zeitpunkt noch unbekannten Gründen fällt plötzlich die gesamte Stromversorgung der Freien Hansestadt Stettbeck und umliegenden Ortschaften aus.</p>
            <p>Bereits um 21:15 Uhr kann der kommunale Energieversorgungsbetrieb Beschädigungen am Stromverteiler des Umspannwerks feststellen. Die Reparaturen beginnen sofort und es wird ein etwaiger Ausfallzeitraum von 45 bis 90 Minuten festgelegt.</p>
            <p>Nach dieser Rückmeldung fanden sich sowohl Koordinatoren der Berufsfeuerwehr Stettbeck als auch der Landespolizeidirektion Stettbeck zusammen, um ein weiteres Vorgehen zu planen. Im Zuge dessen wurde alles daran gesetzt, sowohl die notfallmedizinische, die brandbekämpfenden als auch strafvollziehenden Einsatzmittel möglichst vollumfänglich weiterhin für Primäreinsätze freizuhalten. Aufgrund mangelnder Wartung waren sowohl im Aneos Klinikum als auch im Städtischen Klinikum der Hansestadt Stettbeck keine Stromzufuhr vorhanden. Der Rettungsdienst der Berufsfeuerwehr übernahm den Transport von intensivpflichtigen Patienten in nahegelegene Krankenhäuser.</p>
            <p>Aufgrund der schnellen Koordination ergaben sich aus der Ausfallzeit, trotz ausgefallener Ampelanlagen, Verkehrsrichtanlagen und anderen Sicherheitseinrichtungen, nur wenige Verletzte. Die offizielle Zahl der Verletzten liegt bei unter zehn.</p>
            <h2 id="entwarnung">Entwarnung</h2>
            <p>Etwa um 22:35 Uhr gibt der kommunale Energieversorger entwarnung und kann die Stromzufuhr wiederherstellen. Nun stellt die Polizei erste Ermittlungen an. Ein Sprecher der Polizei teilte uns mit, dass am Umspannwerk von Sabotage auszugehen ist und das die Polizei diesbezüglich intensive Ermittlungen anstellen würde.</p>
            <p>Über weitere Ausfälle, Beschädigungen oder weitere Komplikationen ist nichts bekannt.</p>
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