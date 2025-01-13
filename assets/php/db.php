<?php

// Verbindungsdaten
$db_host = "web-snake02.native-webspace.com";
$db_user = "firmenmanager";
$db_pass = "7q*dRe694";
$db_name = "hypaxna1_firmenregister";

// Verbindung aufbauen
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Verbindung prüfen
if (!$conn) {
    die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
}
