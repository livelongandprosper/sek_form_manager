<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />

		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
		<header class="site-header">
			<?php
				// kopfbereich
				include "header.php";
			?>
		</header>

		<div class="site-content">
			Logo <br/>
			Arbeitsberichtnummer </br>
			Kunde: <input name="Kunde" type="text" <?php if($_POST['Kunde']) { echo 'value="'.$_POST['Kunde'].'"';} ?>/><br/> 
			Auftrag: <input name="Auftrag" type="text" <?php if($_POST['Auftrag']) { echo 'value="'.$_POST['Auftrag'].'"';} ?>/><br/> 
			Anlagenstandort: <input name="Anlagenstandort" type="text" <?php if($_POST['Anlagenstandort']) { echo 'value="'.$_POST['Anlagenstandort'].'"';} ?>/><br/> 
			Gerätebezeichnung: <input name="Geraetebezeichnung" type="text" <?php if($_POST['Geraetebezeichnung']) { echo 'value="'.$_POST['Geraetebezeichnung'].'"';} ?>/><br/> 
			Typ/Serien-Nr.:: <input name="Typ" type="text" <?php if($_POST['Typ']) { echo 'value="'.$_POST['Typ'].'"';} ?>/><br/> 
			
			
			<label></label><input type="Checkbox" name="Serviceart[]" value="1" <?php if (in_array("1", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Service</label>
			<label><input type="Checkbox" name="Serviceart[]" value="2" <?php if (in_array("2", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Wartung</label>
			<label><input type="Checkbox" name="Serviceart[]" value="3" <?php if (in_array("3", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Montage</label>
			<label><input type="Checkbox" name="Serviceart[]" value="4" <?php if (in_array("4", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Normalkühlung</label>
			<label><input type="Checkbox" name="Serviceart[]" value="5" <?php if (in_array("5", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Tiefkühlung</label>
			<label><input type="Checkbox" name="Serviceart[]" value="6" <?php if (in_array("6", $_POST['Serviceart'])) echo "checked='checked'"; ?>/> Klimaanlage </label><br/>
			
			
			<table border="1">
				<tr>
					<td>Datum</td>
					<td>Monteur</td>
					<td>Arbeitsbeginn</td>
					<td>Arbeitsende</td>
					<td>Strecke in Km</td>
					<td>Fahrzeit</td>
				</tr>
				<tr>
					<td> <input name="Datum" type="date" <?php if($_POST['Datum']) { echo 'value="'.$_POST['Datum'].'"';} ?>/></td>
					<td> <input name="Monteur" type="text" <?php if($_POST['Monteur']) { echo 'value="'.$_POST['Monteur'].'"';} ?>/></td>
					<td> <input name="Arbeitsbeginn" type="time" <?php if($_POST['Arbeitsbeginn']) { echo 'value="'.$_POST['Arbeitsbeginn'].'"';} ?>/></td>
					<td> <input name="Arbeitsende" type="time"<?php if($_POST['Arbeitsende']) { echo 'value="'.$_POST['Arbeitsende'].'"';} ?>/></td>
					<td> <input name="Strecke" type="text" <?php if($_POST['Strecke']) { echo 'value="'.$_POST['Strecke'].'"';} ?>/></td>
					<td> <input name="Fahrzeit" type="time" <?php if($_POST['Fahrzeit']) { echo 'value="'.$_POST['Fahrzeit'].'"';} ?>/></td>
				</tr>
			</table> <br/>
			
			Normalstunden 07:00-18:00 / Überstunden 25% 18:00-22:00 / Überstunden 50% 22:00-07:00 / Samstag 50% / Sonntag 100% / Feiertage 150% <br/>
			
			Ausgeführte Arbeiten:  
			Zusatzbericht:  <label><input type="radio" name="Zusatzbericht" value="Ja" <?php if (isset($_POST['Zusatzbericht']) && $_POST['Zusatzbericht'] == 'Ja') echo "checked='checked'"; ?>/> Ja</label>
							<label><input type="radio" name="Zusatzbericht" value="Nein" <?php if (isset($_POST['Zusatzbericht']) && $_POST['Zusatzbericht'] == 'Nein') echo "checked='checked'"; ?>/> Nein</label> <br/>
			<textarea name="Arbeiten"  type="text" ><?php if(isset($_POST["Arbeiten"])) { 
	         echo htmlentities ($_POST["Arbeiten"]); }?></textarea> 
			
			
			<table>
				<tr>
					<td>Materialbezeichnung</td>
					<td>Menge</td>
				</tr>
				<tr>
					<td><input name="Material" type="text" <?php if($_POST['Material']) { echo 'value="'.$_POST['Material'].'"';} ?>/> </td>
					<td><input name="Menge" type="Number" <?php if($_POST['Menge']) { echo 'value="'.$_POST['Menge'].'"';} ?>/></td>
				</tr>
			</table>
			
			Pauschalen:
			<label><input type="Checkbox" name="Pauschalen[]" value="1" <?php if (in_array("1", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Kleinmaterial</label>
			<label><input type="Checkbox" name="Pauschalen[]" value="2" <?php if (in_array("2", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Elektr. Kleinmaterial</label>
			<label><input type="Checkbox" name="Pauschalen[]" value="3" <?php if (in_array("3", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Befestigungsmaterial</label>
			<label><input type="Checkbox" name="Pauschalen[]" value="4" <?php if (in_array("4", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Isoliermaterial</label>
			<label><input type="Checkbox" name="Pauschalen[]" value="5" <?php if (in_array("5", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Dichtmaterial</label>
			<label><input type="Checkbox" name="Pauschalen[]" value="6" <?php if (in_array("6", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Lötmaterial</label>
			<label><input type="Checkbox" name="Pauschalen[]" value="7" <?php if (in_array("7", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Vakuumpumpe</label>
			<label><input type="Checkbox" name="Pauschalen[]" value="8" <?php if (in_array("8", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> Lecksuchspray</label>
			<label><input type="Checkbox" name="Pauschalen[]" value="9" <?php if (in_array("9", $_POST['Pauschalen'])) echo "checked='checked'"; ?>/> D-Tec <br/>
			
			Arbeit beendet:
			<label><input type="radio" name="beendet" value="Ja"<?php if (isset($_POST['beendet']) && $_POST['beendet'] == 'Ja') echo "checked='checked'"; ?>/> Ja
			</footer>
			<label><input type="radio" name="beendet" value="Notdienst" <?php if (isset($_POST['beendet']) && $_POST['beendet'] == 'Notdienst') echo "checked='checked'"; ?>/> Notdienst <br/>
			
			Abrechnung:
			<label><input type="radio" name="Abrechnung" value="pauschal" <?php if (isset($_POST['Abrechnung']) && $_POST['Abrechnung'] == 'pauschal') echo "checked='checked'"; ?>/> pauschal
			<label><input type="radio" name="Abrechnung" value="zum Nachweis" <?php if (isset($_POST['Abrechnung']) && $_POST['Abrechnung'] == 'zum Nachweis') echo "checked='checked'"; ?>/> zum Nachweis
			<label><input type="radio" name="Abrechnung" value="nach Aufmaß" <?php if (isset($_POST['Abrechnung']) && $_POST['Abrechnung'] == 'nach Aufmaß') echo "checked='checked'"; ?>/> nach Aufmaß <br/>
			
			Die Anlage wurde in einem odnungsgemäßen Zustand übergeben. Vorgenannte Arbeiten werden anerkannt und bestätigt. <br/>
			
			Unterschrift Monteur
			Stempel + Unterschrift Kunde/Betreiber
			
			
			<button type="submit">Absenden</button>
			</form>
			
		</div>
	
		
		<footer>
			&copy; SEK Scheer & Ehrke Kälte- Klimatechnik GmbH 2018
		</footer>
	</body>
</html>
