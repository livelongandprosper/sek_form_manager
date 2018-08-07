<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" href="css/style.css"/>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
		</script>
		<script src="js/scripts.js"></script>

	</head>
	<body>
		<pre>
		
		<?php print_r($_POST); ?>
		</pre>
		<header class="site-header">
			<?php
				// kopfbereich
				include "header.php";
			    include "arbeitsbericht.php";
				session_start();
			?>
			
		</header>
		<nav class="menue">
	<div >
	<ul >
		<li><a href="?form=arbeitsbericht">Meine eingereichten Formulare</a></li>
		<li><a href="arbeitsbericht.php">Neuer Arbeitsbericht test</a></li>
	</ul>
	
	<ul >
		<li><a href="login.php">Login</a>  </li>
		<li><a href="registrieren.php">Registrieren</a>  </li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	</div>
</nav>
		
		<div>
			<?php
				//Login-Kontrolle
				if ($_SESSION["login"] != 1 ){
				Header("Location:login.php");	
				}	
			?>
		
		</div>
	
		
		<footer>
			&copy; SEK Scheer & Ehrke Kälte- Klimatechnik GmbH 2018
		</footer>
	
	
	</body>
</html>


