<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dienst- & Fachaufsicht &rsaquo; Hansestadt Stettbeck</title>
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
    $articleName = "Dienst- & Fachaufsicht der Landespolizei Stettbeck";
    $shortDesc = "Alles rund um die Dienst- und Fachaufsicht der Landespolizeidirektion Stettbeck.";
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
                <li class="breadcrumb-item"><a href="/polizei/dienstaufsicht">Dienst- & Fachaufsicht</a></li>
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
                <h5 class="text-sh-blue">Stand: 19. Februar 2023</h5>
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
            <h2 id="was-ist-die-dienstaufsicht">Was ist die Dienstaufsicht?</h2>
            <p>Die Dienstaufsichtsbehörde ist eine vollständig unabhängige Instanz in Bezug zur polizeilichen Vollzugsbehörde des Landes Schleswig-Holstein. Sie ist ihrem Wesen nach inhaltlich unbeschränkt. Sie beinhaltet das Recht zur Beeinflussung der Tätigkeiten und Organisation einer untergeordneten Behörde, in diesem Falle der Landespolizei Schleswig-Holstein.</p>
            <h2 id="aufgaben-der-dienstaufsicht">Aufgaben der Dienstaufsicht</h2>
            <p>Die Dienstaufsicht beschäftigt sich mit der Aufsicht über das persönliche Verhalten, die Ausführung der Arbeitsweise und ordnungsgemäße Aufgabenerfüllung, das Wahrnehmen der Dienstpflichten und das Überwachen der Dienstvorschriften bei allen Mitarbeitern der Landespolizei und ist somit direkter Disziplinarvorgesetzter der Amtsträger. Dazu ist es ihr gestattet, jederzeit und ohne konkrete Anhaltspunkte Berichterstattung und uneingeschränkte Vorlage von Akten oder anderen Unterlagen zu verlangen, Prüfungen vorzunehmen und Weisungen zu erteilen.</p>
            <p>Die Dienstaufsicht umfasst somit die Beobachtungs- und Berichtigungsfunktion und beschreibt die Kontroll- und Einflussmöglichkeiten auf Beschäftigte der zu überwachenden, untergeordneten Behörde. Sie gewährleistet die ordnungsgemäße Ausführung der Arbeitsabläufe und umfasst die Befugnis, über dienstrechtliche Angelegenheiten der dort beschäftigten Mitarbeiter zu entscheiden und Disziplinarmaßnahmen bis hin zu einer Entlassung aus dem Dienstverhältnis zu ergreifen.</p>
            <p>Aufgrund der Unabhängigkeit der Dienstaufsichtsbehörde besitzen Dienstgrad, Aufgabe, Tätigkeit, Funktion, Rolle oder Status des Petenten, des Beschuldigten, der Zeugen oder anderweitig involvierten Personen keinerlei Relevanz. Entsprechend sind Entscheidungen und getroffene Maßnahmen seitens der Dienstaufsichtsbehörde ausschließlich durch den höchsten Dienstgrad der Landespolizei begründet anfechtbar.</p>
            <h2 id="wer-kann-auf-die-dienstaufsicht-zugehen">Wer kann auf die Dienstaufsicht zugehen?</h2>
            <p>Sowohl Bürgerinnen und Bürger als auch andere Beschäftigte haben die Möglichkeit bei subjektiv festgestelltem Fehlverhalten eines Beamten der untergeordneten Behörde eine sogenannte <strong>Dienstaufsichtsbeschwerde</strong> bei der Dienstaufsichtsbehörde einzureichen. Mit Hilfe einer Dienstaufsichtsbeschwerde kann das persönliche Verhalten bzw. die Art und Weise der Aufgabenwahrnehmung von Amtsträgern durch den Bürger im Falle von Straftaten, Vorschriftsmissachtungen, Dienstpflichtverletzungen, unpassendem Verhalten o. ä. gerügt werden. Eine Dienstaufsichtsbeschwerde wird zu jeder Zeit neutral und objektiv betrachtet und bewertet.</p>
            <p>Im Falle eines solchen Anliegens wenden Sie sich bitte an die dafür zuständige Polizeidienststelle (Polizeipräsidium 21, Sinner Street 8047, Stettbeck) und verlangen Sie ausdrücklich nach einem Mitglied der Dienstaufsicht aufgrund einer Dienstaufsichtsbeschwerde. Die Dienstaufsichtsbehörde wird Sie entweder <strong>direkt persönlich empfangen</strong> und den Fall unmittelbar entgegennehmen oder Sie <strong>zeitnah telefonisch kontaktieren</strong>, um einen Termin hierfür zu vereinbaren.</p>
            <br>
            <p>gez.</p>
            <p><strong>Rene Schneider</strong><br>Landespolizeidirektion Stettbeck | Leiter der Dienstaufsichtsbehörde</p>
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