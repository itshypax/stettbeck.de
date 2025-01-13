<?php
require  $_SERVER['DOCUMENT_ROOT'] . "/assets/php/db.php";

ini_set('session.gc_maxlifetime', 604800);
ini_set('session.cookie_lifetime', 604800);
session_set_cookie_params(604800);
$lifetime = 604800;

session_start();
setcookie(session_name(), session_id(), time() + $lifetime);
$pdo = new PDO("mysql:host=" . $db_host . ";dbname=" . $db_name, $db_user, $db_pass);

if (isset($_GET['login'])) {
    $username = $_POST['username'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM login WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        $_SESSION['name'] = $user['fullname'];
        $_SESSION['manage_users'] = $user['manage_users'];
        $_SESSION['manage_firms'] = $user['manage_firms'];
        $_SESSION['manage_articles'] = $user['manage_articles'];
        header("Location: dashboard.php");
    } else {
        $errorMessage = "Benutzername oder Passwort war ungültig<br>";
    }
}
?>
<!DOCTYPE html>
<html>

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
    <meta property="og:url" content="https://stettbeck.de/firmenregister" />
    <meta property="og:title" content="Firmenregister - Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="Unser amtliches Firmenregister aller staatlicher, halbstaatlicher und ziviler Firmen in Stettbeck." />
</head>

<body>
    <!-- NAV BEGIN -->
    <?php
    $pageTitle = "Website";
    $pageSubTitle = "Administration";
    include $_SERVER['DOCUMENT_ROOT'] . "/assets/php/topnav.php"; ?>
    <!-- NAV END -->
    <hr class="my-5 text-light" />

    <?php
    if (isset($errorMessage)) {
        echo $errorMessage;
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="mb-5">
                    Administrator Login
                </h2>
            </div>
            <div class="col text-end"></div>
        </div>
        <div class="container bg-sh-gray p-5 shadow rounded-3">
            <div class="row">
                <div class="col"></div>
                <div class="col-6">
                    <form action="?login=1" method="post">
                        <label for="username" class="form-label fw-bold">Benutzername <span class="text-sh-red">*</span></label>
                        <input type="text" class="form-control" id="username" name="username" maxlength="250" required>
                        <hr class="my-3 text-sh-gray">
                        <label for="passwort" class="form-label fw-bold">Passwort <span class="text-sh-red">*</span></label>
                        <input type="password" class="form-control" id="passwort" name="passwort" maxlength="250" required>

                        <div class="row">
                            <div class="col">
                                <div class="d-grid gap-2">
                                    <input class="btn btn-sh-red mt-5" type="submit" value="Anmelden">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>

    <!-- BEARBEITEN -->
    <hr class="my-5 text-light" />
    <!-- FOOTER BEGIN -->
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/php/footerbot.php"; ?>
    <!-- FOOTER END -->
</body>

</html>