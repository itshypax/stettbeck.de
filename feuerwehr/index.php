<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Die Berufsfeuerwehr Stettbeck &rsaquo; Hansestadt Stettbeck</title>
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
    $articleName = "Die Berufsfeuerwehr Stettbeck";
    $shortDesc = "Alles rund um die Berufsfeuerwehr der Freien Hansestadt Stettbeck.";
    ?>
    <meta name="theme-color" content="#de2b14" />
    <meta property="og:site_name" content="NordNetzwerk" />
    <meta property="og:url" content="https://stettbeck.de/" />
    <meta property="og:title" content="<?php echo $articleName ?> - Stadtportal der Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="<?php echo $shortDesc ?>" />
    <?php $activePage = "feuerwehr"; ?>
</head>

<body>
    <!-- NAV BEGIN -->
    <?php include "../assets/php/topnav.php"; ?>
    <!-- NAV END -->
    <!-- BEHÖRDENBANNER BEGIN -->
    <?php include "../assets/php/behbanner.php"; ?>
    <!-- BEHÖRDENBANNER END -->
    <!-- PAGE INFO BEGIN -->
    <div id="pageInfoNav" class="container my-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Amt für Brandschutz, Rettungsdienst, Katastrophen- und Zivilschutz</a></li>
                <li class="breadcrumb-item"><a href="/feuerwehr/index">Berufsfeuerwehr</a></li>
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
                <h5 class="text-sh-blue">Stand: 12. Februar 2023</h5>
            </div>
        </div>
        <div class="my-5"></div>
        <hr class="my-3 text-sh-gray">
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

        // Create a select element
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
        ?>
    </div>
    <!-- PAGE INFO END -->
    <!-- CONTENT BEGIN -->
    <div class="container px-5 py-3 mt-5" id="artikelContent">
        <div class="px-5 text-sh-blue" style="text-align:justify">
            <h2 id="im-notfall">Im Notfall</h2>
            <p>Es erfolgt keine Notrufannahme über diese Seite - wählen Sie im Notfall die 112.</p>
            <div class="row position-relative">
                <div class="col">
                    <img src="/assets/img/feuerwehr/11.2.png" alt="Der richtige Notruf" style="max-width:100%" height="auto" class="small-image shadow shadow" role="button" onclick="showLargeImage(event)">
                    <div class="large-image-container">
                        <img src="/assets/img/feuerwehr/11.2.png" alt="Der richtige Notruf" class="large-image" onclick="hideLargeImage(event)" role="button">
                    </div>
                </div>
            </div>
            <br>
            <h2 id="die-berufsfeuerwehr-stellt-sich-vor">Die Berufsfeuerwehr Stettbeck stellt sich vor! </h2>
            <p>Die Berufsfeuerwehr Stettbeck ist ein integraler Teil des Bevölkerungsschutzes. Wir sind in Notlagen oft die letzte Anlaufstation der Bevölkerung - nach uns kommt keiner mehr. Gerne bringen wir nun denen, die täglich auf uns angewiesen sind, die Berufsfeuerwehr näher.</p>
            <br>
            <h2 id="unser-leitbild">Unser Leitbild</h2>
            <ul>
                <li>
                    <strong>Respekt</strong>
                    <br>
                    Wir behandeln einander, unsere Partner und die Empfänger unserer Dienste stets mit tiefstem Respekt und Fairness, während wir Unterschiede in der Meinung, in Ansichten und in Gefühlen akzeptieren.
                </li>
                <li>
                    <strong>Integrität</strong>
                    <br>
                    Wir handeln professionell und vertrauenswürdig, weil Ehrlichkeit, Transparenz und starke ethische Prinzipien die Grundlage dafür bilden, wer wir sind und was wir tun.
                </li>
                <li>
                    <strong>Unparteilichkeit</strong>
                    <br>
                    Wir unterscheiden nicht nach Nationalität, Rasse, religiösen Überzeugungen, Klasse oder politischen Meinungen. Wir bemühen uns, das Leid des Einzelnen zu lindern, indem wir uns ausschließlich an dessen Bedürfnissen orientieren und den dringensten Notfällen Vorrang einräumen.
                </li>
            </ul>
            <br>
            <h2 id="unsere-aufgaben">Unsere Aufgaben</h2>
            <ul>
                <li>
                    <strong>Retten - Löschen - Bergen - Schützen</strong>
                    <br>
                    Wer sich schon einmal mit der Feuerwehr befasst hat, dem sind diese Begriffe sicherlich schon mal über den Weg gelaufen. Diese vier Grundsätze beschreiben die Aufgaben und die Prioritäten der Feuerwehr und der Unfallhilfe. Vorbeugender Brandschutz, Brandbekämpfung, technische Hilfe, Umweltschutz und sonstige Hilfeleistungen sind unsere täglichen Tätigkeitsgebiete.
                </li>
                <li>
                    <strong>Gegen die Zeit - für das Leben</strong>
                    <br>
                    Wir wurden vom Zweckverband Rettungsdienst Region Stettbeck damit beauftragt, die notfallmedizinische Versorgung der Bevölkerung der Region Stettbeck zu gewährleisen. Hierzu halten wir Rettungswagen, Notarzteinsatzfahrzeuge, Rettungschubschrauber und vieles mehr an verschiedenen Standorten bereit, um bei medizinischen Notfällen schnell und professionell helfen zu können.
                </li>
                <li>
                    <strong>Notruf für Feuerwehr und Rettungsdienst...</strong>
                    <br>
                    Wer im Notfall die 112 wählt kommt bei uns raus. Wir betreiben die Integrierte Leitstelle Stettbeck, welche in der Region Stettbeck die Notrufannahme und die Alarmierung und Disposition von Feuerwehr-, Rettungsdienst- und Katastrophenschutzkräften übernimmt.
                </li>
                <li>
                    <strong>Umfassende Einsatzbereitschaft</strong>
                    <br>
                    Im Katastrophenfall packen wir mit an. Mit unserer Schnelleinsatzgruppe 42 stellen wir einen Patiententransportzug und einen Patientenbehandlungsplatz, um im Katastrophenfall effektiv und effizient zu arbeiten - Ehrenamtliche Hilfe, auf die im Notfall keiner verzichten will.
                </li>
            </ul>
            <br>
            <h2 id="karriere-bei-der-berufsfeuerwehr">Karriere bei der Berufsfeuerwehr </h2>
            <p>Die Karrierelaufbahn der Berufsfeuerwehr ist lang und vielseitig. Wir bieten zwei verschiedene Laufbahngruppen mit einigen Grund- und Zusatzausbildungen an.</p>
            <div class="row position-relative">
                <div class="col me-3">
                    <img src="/assets/img/feuerwehr/werbung1.png" alt="Bereit, wenn es darauf ankommt?" style="max-width:100%" height="auto" class="small-image shadow shadow" role="button" onclick="showLargeImage(event)">
                    <div class="large-image-container">
                        <img src="/assets/img/feuerwehr/werbung1.png" alt="Bereit, wenn es darauf ankommt?" class="large-image" onclick="hideLargeImage(event)" role="button">
                    </div>
                </div>
                <div class="col ms-3">
                    <img src="/assets/img/feuerwehr/werbung2.png" alt="Heute schon Leben gerettet?" style="max-width:100%" height="auto" class="small-image shadow shadow" role="button" onclick="showLargeImage(event)">
                    <div class="large-image-container">
                        <img src="/assets/img/feuerwehr/werbung2.png" alt="Heute schon Leben gerettet?" class="large-image" onclick="hideLargeImage(event)" role="button">
                    </div>
                </div>
            </div>
            <br>
            <h2 id="unsere-leitung">Unsere Leitung</h2>
            <p>Die Berufsfeuerwehr Stettbeck wird primär von der Branddirektion geleitet. Diese besteht aus den beiden Branddirektoren. Unterstützt wird die Branddirektion vom Rest der Leitungsebene, welche Verwaltungs- und Beratungsfunktionen einnimmt. </p>
            <p>Auch Bedienstete außerhalb der Leitung können Verantwortung übernehmen. So haben wir verschiedene Fachdienstleitungen, welche die Organisation und Leitung unserer spezialisierten Fachgruppen übernehmen.</p>
            <br>
            <h2 id="schlusswort">Schlusswort</h2>
            <p>Um sich auszutauschen und mit uns in Kontakt zu treten, schauen Sie doch auf unserem <a href="https://dsc.gg/bf-stettbeck" class="external-link" target="_blank">Discord Server</a> vorbei! </p>
            <p>Wir bedanken uns für das Vertrauen, welches die Bevölkerung von Stettbeck jeden Tag in uns steckt. Wir freuen uns, mit unserer Vision und unseren Zielen jeden Tag Menschen helfen zu können. Wir und unsere Mitarbeiter helfen jeden Tag mit Passion und finden auch in auswegslosen Situationen eine Lösung. </p>
            <br>
            <p><strong>Branddirektion Berufsfeuerwehr Stettbeck</strong><br>Viktor Ferros | Leitender Branddirektor<br>Domenik Hansen | Branddirektor</p>
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