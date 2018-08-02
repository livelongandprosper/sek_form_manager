
<?php
session_start();
print_r($_SESSION);
if(!isset($_SESSION['mitarbeiterid'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
 
//Abfrage der Nutzer ID vom Login
$benutzerid = $_SESSION['mitarbeiterid'];
 
echo "Hallo User: ".$benutzerid;
?>