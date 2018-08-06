<?php 
session_start();
require_once "config.inc.php";
//$db = mysqli_connect("localhost", "root", "root", "sek_form_manager");
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
/* check connection */
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Registrierung</title>    
</head> 
<body>
 
<?php

$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
 
if(isset($_GET['register'])) {
    $error = false;
	$vorname = $_POST['vorname'];
	$nachname = $_POST['nachname'];
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];
	$mitarbeiter = array();
  
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) { 
        /*$statement = $db->prepare("SELECT * FROM mitarbeiter WHERE email = :email");
        $result = $statement->execute(array('email' => $email));*/
		$result = $db->query("SELECT * FROM mitarbeiter WHERE email = '".$email."'");
		while($row = $result->fetch_assoc()) {
		$mitarbeiter[] = $row;
    }
        if($mitarbeiter) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }    
    }
    
    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {    
        $passwort_hash = md5('$passwort');
		
		
        $result = $db->query("INSERT INTO mitarbeiter (nachname,vorname,email, passwort) VALUES ('".$nachname."','".$vorname."','".$email."',md5('$passwort'))");
		
        if($result) {        
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            $showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    } 
}
 
if($showFormular) {
?>
 
<form action="?register=1" method="post">
	
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>

Vorname:<br>
<input type="vorname" size="40" maxlength="250" name="vorname"><br><br>

Nachname:<br>
<input type="nachname" size="40" maxlength="250" name="nachname"><br><br>	
	
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
Passwort wiederholen:<br>
<input type="password" size="40" maxlength="250" name="passwort2"><br><br>
 
<input type="submit" value="Abschicken">
</form>
 
<?php
} //Ende von if($showFormular)
?>
 
</body>
</html>