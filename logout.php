<?php
session_start();
$_SESSION = array();
Header("Location:index.php");
echo "Logout erfolgreich";
?>