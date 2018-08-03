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
		
		<div class="site-content">
			<form action="index.php" method="post">
				Logo <br/>
				Arbeitsberichtnummer </br>
				<div class="breiterinput">
				 Kunde: <input name="Kunde" type="text" <?php if($_POST['Kunde']) { echo 'value="'.$_POST['Kunde'].'"';} ?>/><br/> 
				 Auftrag: <input name="Auftrag" type="text" <?php if($_POST['Auftrag']) { echo 'value="'.$_POST['Auftrag'].'"';} ?>/><br/> 
				 Anlagenstandort: <input name="Anlagenstandort" type="text" <?php if($_POST['Anlagenstandort']) { echo 'value="'.$_POST['Anlagenstandort'].'"';} ?>/><br/> 
				 Gerätebezeichnung: <input name="Geraetebezeichnung" type="text" <?php if($_POST['Geraetebezeichnung']) { echo 'value="'.$_POST['Geraetebezeichnung'].'"';} ?>/><br/> 
				 Typ/Serien-Nr.:: <input name="Typ" type="text" <?php if($_POST['Typ']) { echo 'value="'.$_POST['Typ'].'"';} ?>/><br/> 
				 Kältemittel: <input name="Kaeltemittel" type="text" <?php if($_POST['Kaeltemittel']) { echo 'value="'.$_POST['Kaeltemittel'].'"';} ?>/><br/> 
				</div>
				<label><input type="Checkbox" name="Serviceart[]" value="1" <?php if (in_array("1", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Service</label>
				<label><input type="Checkbox" name="Serviceart[]" value="2" <?php if (in_array("2", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Wartung</label>
				<label><input type="Checkbox" name="Serviceart[]" value="3" <?php if (in_array("3", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Montage</label>
				<label><input type="Checkbox" name="Serviceart[]" value="4" <?php if (in_array("4", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Normalkühlung</label>
				<label><input type="Checkbox" name="Serviceart[]" value="5" <?php if (in_array("5", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Tiefkühlung</label>
				<label><input type="Checkbox" name="Serviceart[]" value="6" <?php if (in_array("6", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Klimaanlage </label><br/>
				
				<table class="zeilehinzu">
					<tr class="tk">
						<td>Datum</td>
						<td>Monteur</td>
						<td>Arbeitsbeginn</td>
						<td>Arbeitsende</td>
						<td>Strecke in Km</td>
						<td>Fahrzeit</td>
					</tr>
					<?php
						if($_POST['arbeitszeit']) {
							foreach($_POST['arbeitszeit'] as $arbeitszeit_k => $arbeitszeit) {
							?>
								<tr>
									<td> <input name="arbeitszeit[<?php echo $arbeitszeit_k;?>][Datum]" type="date" <?php if($_POST['arbeitszeit'][$arbeitszeit_k]['Datum']) { echo 'value="'.$_POST['arbeitszeit'][$arbeitszeit_k]['Datum'].'"';} ?>/></td>
									<td> <input name="arbeitszeit[<?php echo $arbeitszeit_k;?>][Monteur]" type="text" <?php if($_POST['arbeitszeit'][ $arbeitszeit_k]['Monteur']) { echo 'value="'.$_POST['arbeitszeit'][ $arbeitszeit_k]['Monteur'].'"';} ?>/></td>
									<td> <input name="arbeitszeit[<?php echo $arbeitszeit_k;?>][Arbeitsbeginn]" type="time" <?php if($_POST['arbeitszeit'][ $arbeitszeit_k]['Arbeitsbeginn']) { echo 'value="'.$_POST['arbeitszeit'][ $arbeitszeit_k]['Arbeitsbeginn'].'"';} ?>/></td>
									<td> <input name="arbeitszeit[<?php echo $arbeitszeit_k;?>][Arbeitsende]" type="time"<?php if($_POST['arbeitszeit'][ $arbeitszeit_k]['Arbeitsende']) { echo 'value="'.$_POST['arbeitszeit'][ $arbeitszeit_k]['Arbeitsende'].'"';} ?>/></td>
									<td> <input name="arbeitszeit[<?php echo $arbeitszeit_k;?>][Strecke]" type="text" <?php if($_POST['arbeitszeit'][$arbeitszeit_k]['Strecke']) { echo 'value="'.$_POST['arbeitszeit'][$arbeitszeit_k]['Strecke'].'"';} ?>/></td>
									<td> <input name="arbeitszeit[<?php echo $arbeitszeit_k;?>][Fahrzeit]" type="time" <?php if($_POST['arbeitszeit'][$arbeitszeit_k]['Fahrzeit']) { echo 'value="'.$_POST['arbeitszeit'][$arbeitszeit_k]['Fahrzeit'].'"';} ?>/></td>
								</tr>
							<?php
							}
						} else {
						?>
							<tr>
								<td> <input name="arbeitszeit[0][Datum]" type="date" /></td>
								<td> <input name="arbeitszeit[0][Monteur]" type="text" /></td>
								<td> <input name="arbeitszeit[0][Arbeitsbeginn]" type="time" /></td>
								<td> <input name="arbeitszeit[0][Arbeitsende]" type="time"/></td>
								<td> <input name="arbeitszeit[0][Strecke]" type="text" /></td>
								<td> <input name="arbeitszeit[0][Fahrzeit]" type="time" /></td>
							</tr>
							
						
						<?php
						}
					?>
				</table> <br/>
			<button class="hinzubutton">+</button> <br/>
				
				Normalstunden 07:00-18:00 / Überstunden 25% 18:00-22:00 / Überstunden 50% 22:00-07:00 / Samstag 50% / Sonntag 100% / Feiertage 150%<br/>
				
				Ausgeführte Arbeiten:  
				Zusatzbericht:  <label><input type="radio" name="Zusatzbericht" value="Ja" <?php if (isset($_POST['Zusatzbericht']) && $_POST['Zusatzbericht'] == 'Ja') echo "checked='checked'"; ?>/> Ja</label>
								<label><input type="radio" name="Zusatzbericht" value="Nein" <?php if (isset($_POST['Zusatzbericht']) && $_POST['Zusatzbericht'] == 'Nein') echo "checked='checked'"; ?>/> Nein</label> <br/>
				<textarea name="Arbeiten"  type="text" ><?php if(isset($_POST["Arbeiten"])) { 
		         echo htmlentities ($_POST["Arbeiten"]); }?></textarea> 
				
				
				
				<table class="materialzeilehinzu">
				<tr>
					<td >Materialbezeichnung</td>
					<td>Menge</td> </br>
				</tr>
				<?php
						if($_POST['material']) {
							foreach($_POST['material'] as $material_k => $material) {
							?>
								<tr>
									<td> <input name="material[<?php echo $material_k;?>][Materialbezeichnung]" type="date" <?php if($_POST['material'][$material_k]['Materialbezeichnung']) { echo 'value="'.$_POST['material'][$material_k]['Materialbezeichnung'].'"';} ?>/></td>
									<td> <input name="material[<?php echo $material_k;?>][Menge]" type="date" <?php if($_POST['material'][$material_k]['Menge']) { echo 'value="'.$_POST['material'][$material_k]['Menge'].'"';} ?>/></td>
									
								</tr>
							<?php
							}
						} else {
						?>
						
						<tr>
							<td><input class="mittlererinput" name="material[0][materialbezeichnung]" type="text" <?php if($_POST['material[0][materialbezeichnung]']) { echo 'value="'.$_POST['material[0][materialbezeichnung]'].'"';} ?>/> </td>
							<td><input name="material[0][Menge]" type="Number" <?php if($_POST['material[0][Menge]']) { echo 'value="'.$_POST['material[0][Menge]'].'"';} ?>/></td>
						</tr>
							
						
						<?php
						}
					?>
				</table> <br/>
				
				<button class="knopf">+</button>
				</br>
				
				Pauschalen: <br/>
				<label><input type="Checkbox" name="Pauschalen[]" value="1" <?php if (in_array("1", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Kleinmaterial</label>
				<label><input type="Checkbox" name="Pauschalen[]" value="2" <?php if (in_array("2", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Elektr. Kleinmaterial</label>
				<label><input type="Checkbox" name="Pauschalen[]" value="3" <?php if (in_array("3", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Befestigungsmaterial</label>
				<label><input type="Checkbox" name="Pauschalen[]" value="4" <?php if (in_array("4", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Isoliermaterial</label>
				<label><input type="Checkbox" name="Pauschalen[]" value="5" <?php if (in_array("5", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Dichtmaterial</label> <br/>
				<label><input type="Checkbox" name="Pauschalen[]" value="6" <?php if (in_array("6", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Lötmaterial</label>
				<label><input type="Checkbox" name="Pauschalen[]" value="7" <?php if (in_array("7", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Vakuumpumpe</label>
				<label><input type="Checkbox" name="Pauschalen[]" value="8" <?php if (in_array("8", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Lecksuchspray</label>
				<label><input type="Checkbox" name="Pauschalen[]" value="9" <?php if (in_array("9", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> D-Tec</label><br>
				
				Arbeit beendet:
				<label><input type="radio" name="beendet" value="Ja"<?php if (isset($_POST['beendet']) && $_POST['beendet'] == 'Ja') echo "checked='checked'"; ?>/> Ja</label>
				<label><input type="radio" name="beendet" value="Nein" <?php if (isset($_POST['beendet']) && $_POST['beendet'] == 'Nein') echo "checked='checked'"; ?>/> Nein</label>
				<label><input type="radio" name="beendet" value="Notdienst" <?php if (isset($_POST['beendet']) && $_POST['beendet'] == 'Notdienst') echo "checked='checked'"; ?>/> Notdienst</label>
				
				Abrechnung:
				<label><input type="radio" name="Abrechnung" value="pauschal" <?php if (isset($_POST['Abrechnung']) && $_POST['Abrechnung'] == 'pauschal') echo "checked='checked'"; ?>/> pauschal</label>
				<label><input type="radio" name="Abrechnung" value="zum Nachweis" <?php if (isset($_POST['Abrechnung']) && $_POST['Abrechnung'] == 'zum Nachweis') echo "checked='checked'"; ?>/> zum Nachweis</label>
				<label><input type="radio" name="Abrechnung" value="nach Aufmaß" <?php if (isset($_POST['Abrechnung']) && $_POST['Abrechnung'] == 'nach Aufmaß') echo "checked='checked'"; ?>/> nach Aufmaß</label><br/>
				
				Die Anlage wurde in einem odnungsgemäßen Zustand übergeben. Vorgenannte Arbeiten werden anerkannt und bestätigt. <br/>
				
				Unterschrift Monteur
				Stempel + Unterschrift Kunde/Betreiber
				
				<br/>
				<button class="hsb">Senden</button>
			</form>
		</div>
		
		<footer>
			&copy; SEK Scheer & Ehrke Kälte- Klimatechnik GmbH 2018
		</footer>
	
	
	</body>
</html>


