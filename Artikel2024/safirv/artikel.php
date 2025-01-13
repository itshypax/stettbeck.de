<!DOCTYPE html>
<html lang="en">

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header("Location: /");
}

require "../../assets/php/db.php";
$result = mysqli_query($conn, "SELECT * FROM hsb_artikel_v2 WHERE art_hash = $id");
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

$articleName = $result[0]['title'];
$shortDesc = $result[0]['shortdesc'];
$content = $result[0]['content'];
$createdBy = $result[0]['create_user'];

$lastEditTimestamp = $result[0]['art_lastedit'];

// Create a DateTime object from the timestamp
$date = new DateTime($lastEditTimestamp);

// Define an array to map English month names to German month names
$monthMap = array(
    'January' => 'Januar',
    'February' => 'Februar',
    'March' => 'März',
    'April' => 'April',
    'May' => 'Mai',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'August',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Dezember'
);

// Format the date with the mapped month name
$lastEdit = $date->format('j. ') . $monthMap[$date->format('F')] . $date->format(' Y');




?>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $articleName ?> &rsaquo; Hansestadt Stettbeck</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../assets/css/style.min.css" />
    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../../assets/fonts/ptsans/css/all.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap-5.3/css/bootstrap.min.css">
    <script src="/assets/bootstrap-5.3/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="../../assets/img/favicon.ico" />
    <!-- Metas -->
    <meta name="theme-color" content="#de2b14" />
    <meta property="og:site_name" content="NordNetzwerk" />
    <meta property="og:url" content="https://stettbeck.de<?= $_SERVER['PHP_SELF'] ?>" />
    <meta property="og:title" content="<?php echo $articleName ?> - Presseportal Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="<?php echo $shortDesc ?>" />
    <?php $activePage = "safirv";

    if ($result[0]['amt'] != $activePage) {
        header("Location: " . $result[0]['art_link']);
    }
    ?>

</head>

<body>
    <!-- NAV BEGIN -->
    <?php include "../../assets/php/topnav.php"; ?>
    <!-- NAV END -->
    <!-- BEHÖRDENBANNER BEGIN -->
    <?php include "../../assets/php/behbanner.php"; ?>
    <!-- BEHÖRDENBANNER END -->
    <!-- PAGE INFO BEGIN -->
    <div class="container my-5" id="pageInfoNav">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/"><i class="fa-solid fa-house"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Amt für Inneres, Recht und Verwaltungswesen</a></li>
                <li class="breadcrumb-item"><a href="<?= $_SERVER['PHP_SELF'] ?>"><?php echo $articleName ?></a></li>
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
                <?php
                if ($shortDesc != "" or $shortDesc != null) {
                    echo '<h5 class="text-sh-blue">' . $shortDesc . '</h5>';
                }
                ?>
                <hr class="text-sh-gray my-3">
                </hr>
                <h5 class="text-sh-blue">Letzte Änderung: <?= $lastEdit ?></h5>
            </div>
        </div>
        <div class="my-5"></div>
        <?php

        $html = $result[0]['content'];

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
            <?= $content ?>
        </div>
    </div>
    <!-- CONTENT END -->
    <hr class="my-5 text-light" />
    <!-- FOOTER BEGIN -->
    <?php include "../../assets/php/footerbot.php"; ?>
    <!-- FOOTER END -->

    <!-- Back to top button -->
    <button type="button" class="btn btn-sh-stt-3 shadow btn-floating btn-lg" id="btn-back-to-top">
        <i class="fa-light fa-arrow-up"></i>
    </button>
    <script src="../../backtotop.js"></script>
    <script src="../../navmenu.js"></script>
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