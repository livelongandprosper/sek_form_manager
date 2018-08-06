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
			include "arbeitsbericht";
				session_start();
			?>
			
		</header>
		
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


