<?php 
session_start();
require_once "config.inc.php";
//$_SESSION = array();




// DB connection
$db = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
/* check connection */
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}

if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
	$mitarbeiter=array();
    
    $result = $db->query("
    	SELECT
    		*
    	FROM
    		mitarbeiter
    	WHERE
    		email = '".$email."'
			and 
			passwort = md5('$passwort')
    ;");
	while($row = $result->fetch_assoc()) {
		$mitarbeiter[] = $row;
    }        
    print_r($mitarbeiter);
	
    //Überprüfung des Passworts
    if (sizeof($mitarbeiter)==1 ) {
        $_SESSION['mitarbeiterid'] = $mitarbeiter[0]['mitarbeiterid'];
        $_SESSION["login"]=1;
		'Login erfolgreich. Weiter zu internen Bereich';
		header("Location:index.php");
		
		
		
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
		
    }
	if(isset($errorMessage)) {
    echo $errorMessage;
	
}
    
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Login</title>    
</head> 
<body>
 

 
<form action="?login=1" method="post">
E-Mail:<br>
<input type="email" size="40" maxlength="250" name="email"><br><br>
 
Dein Passwort:<br>
<input type="password" size="40"  maxlength="250" name="passwort"><br>
 
<input type="submit" value="Abschicken">
</form> 
</body>
</html>