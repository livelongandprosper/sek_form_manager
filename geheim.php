
<?php
session_start();
if(!isset($_SESSION['benutzerid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$benutzerid = $_SESSION['benutzerid'];
 
echo "Hallo User: ".$benutzerid;
?>