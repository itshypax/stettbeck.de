<?php
include '../assets/php/db.php';

$testid = $_REQUEST['test'];

// Select from databse 'ws_ids' where 'hash' = $testid and 'used' is 0
$sql = "SELECT * FROM ls_ids WHERE hash = '$testid' AND used = 0";
// Get the number of results and store it in $result
$result = mysqli_num_rows(mysqli_query($conn, $sql));

if ($result != 1) {
    // If the number of results is not 1, redirect to over.php
    header("Location: used.php");
    exit();
} else {
    // If the number of results is 1, continue
    $sql2 = "UPDATE ls_ids SET used = 1 WHERE hash = '$testid'";
    mysqli_query($conn, $sql2);
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
        <div id="timer"></div>
    </h1>
    <hr class="my-5">

    <div class="container h-50 d-flex flex-column justify-content-center p-5 border border-4 border-sh-red shadow-sm" id="formContainer">
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSfgF8RCsVsLaXzUFD2PaM06IfslMc2avgLyClEqdTJj6cU-ZA/viewform?embedded=true" width="100%" height="750px" frameborder="0" marginheight="0" marginwidth="0">Wird geladen…</iframe>
        <div id="hide" class="w-100">
            <h3><strong>Wichtig! Vor Testbeginn lesen.</strong></h3>
            <h4>
                <ul>
                    <li>Der Test kann nur einmal versucht werden.</li>
                    <li>Der Test beginnt automatisch, sobald du auf "Test starten" klickst.</li>
                    <li>Der Test endet automatisch, wenn die Zeit abgelaufen ist.</li>
                    <li>Der Test kann nicht unterbrochen werden.</li>
                    <li>Solltest du das rot umrandete Fenster verlassen reduziert sich die Zeit schneller, Täuschungsversuche führen zum sofortigen Testende.</li>
                    <li>Solltest du noch nicht fertig sein, die Zeit aber ablaufen so drücke trotzdem auf absenden. Sollte die Zeit ablaufen und du nichts abgesendet haben gilt der Test als nicht bestanden.</li>
                </ul>
            </h4>
            <div class="my-3"></div>
            <div class="text-center">
                <div class="btn btn-outline-sh-red btn-lg" id="start-test">Test starten</div>
            </div>
        </div>
    </div>

    <script>
        // Set up the timer to count down from 30 minutes
        var timeRemaining = 10 * 60; // in seconds
        var timerInterval;

        // Reduce the timer speed when the user moves away from the form
        var formContainer = document.getElementById("formContainer");
        var mouseInsideForm = true;
        var mouseOutsideFormTime = 0;
        formContainer.addEventListener("mouseenter", function() {
            mouseInsideForm = true;
            mouseOutsideFormTime = 0;
        });
        formContainer.addEventListener("mouseleave", function() {
            mouseInsideForm = false;
            mouseOutsideFormTime = 0;
        });

        function updateTimer() {
            if (mouseInsideForm) {
                timeRemaining--;
            } else {
                mouseOutsideFormTime++;
                if (mouseOutsideFormTime >= 1) { // reduce by 1 minute for every 60 seconds (1 minute) outside the form
                    mouseOutsideFormTime = 0;
                    timeRemaining -= 61;
                }
            }
            if (timeRemaining < 0) {
                timeRemaining = 0;
            }
            var minutes = Math.floor(timeRemaining / 60);
            var seconds = timeRemaining % 60;
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            document.getElementById("timer").innerHTML = "Zeit übrig: " + minutes + ":" + seconds;
            if (timeRemaining == 0) {
                clearInterval(timerInterval);
                window.location.href = "over.php";
            }
        }

        // Set the timer to 0 when the user clicks away from the page or changes the tab
        var visibilityCheckActive = false;
        document.addEventListener("visibilitychange", function() {
            if (visibilityCheckActive && document.hidden) {
                timeRemaining = 0;
                clearInterval(timerInterval);
                window.location.href = "over.php";
            }
        });

        // Hide the form initially and display the button instead
        var form = document.getElementsByTagName("iframe")[0];
        form.style.display = "none";
        document.getElementById("hide").style.display = "block";

        // Require the user to confirm the form with a button before the timer starts counting
        document.getElementById("start-test").addEventListener("click", function() {
            document.getElementById("hide").style.display = "none";
            form.style.display = "block";
            timerInterval = setInterval(updateTimer, 1000);
            visibilityCheckActive = true;
        });
    </script>
</body>

</html>