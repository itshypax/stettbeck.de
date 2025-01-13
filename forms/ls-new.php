<?php
include '../assets/php/db.php';

$allw = $_REQUEST['allowance'];


if ($allw != "laPoSH") {
    header("Location: used.php");
    exit();
} else {
    // Generate a new 4 letter hash and insert it into the databse 'ws_ids
    $hash = substr(md5(rand()), 0, 4);
    $sql = "INSERT INTO ls_ids (hash) VALUES ('$hash')";
    mysqli_query($conn, $sql);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formular Leistungsabfrage &rsaquo; Hansestadt Stettbeck</title>
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
    <meta property="og:url" content="https://stettbeck.de/" />
    <meta property="og:title" content="Stadtportal - Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="Alle Informationen rund um die Hansestadt Stettbeck können im Stadtportal gefunden werden." />
    <?php $activePage = "forms"; ?>
</head>

<body class="d-flex flex-column justify-content-center align-items-center bg-sh-gray" style="height:100vh;width:100vw">
    <h1>
        <a href="https://stettbeck.de/forms/leistung?test=<?= $hash ?>" id="copy-link">https://stettbeck.de/forms/leistung?test=<?= $hash ?></a>
    </h1>

    <script>
        document.getElementById("copy-link").addEventListener("click", function(event) {
            event.preventDefault(); // prevent default link behavior
            const link = this.href; // get the link
            navigator.clipboard.writeText(link); // copy the link to the clipboard
        });
    </script>
</body>

</html>