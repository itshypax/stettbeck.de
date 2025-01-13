<?php

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
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <?php
    require $_SERVER['DOCUMENT_ROOT'] . '/assets/php/db.php';

    $dbconnect = mysqli_connect($hostname, $username, $password, $dbname);
    $id = $_REQUEST['id'];
    $result = mysqli_query($conn, "UPDATE unternehmensregister SET firma_geschlossen = 1 WHERE id='" . $id . "'") or die();
    header("Location: /admin/firmen/");
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>

</html>