<?php
include_once "database.inc.php";
function erstelleAuswahlMenüForm($name) {
	$tabelle = "";
	switch ($name) {
		case "Hersteller":
			$tabelle = "hersteller";
			break;
		case "Kategorie":
			$tabelle = "kategorie";
			break;
		case "Funktypen":
			$tabelle = "funktypen";
			break;
		default:
			$tabelle = "hersteller";
	}
	$res = query("SELECT * FROM `".$tabelle."` WHERE 1");
	echo "<select name='".$tabelle."' class='form-control'>";
	while ($row = mysqli_fetch_assoc($res)) {
		echo "<option value='".$row["id".$name]."' >".$row[$name]."</option>";
	}
	echo "</select>";

}
function _bilderEinfügen($pfad,$smartphoneId) {
	$bildId = query("	INSERT INTO `bilder` (`idBilder`, `Pfad`)
						VALUES (NULL, '".$pfad."')",true);

	query("				INSERT INTO `bilder_has_smartphone`
						(`Bilder_idBilder`, `Smartphone_idSmartphone`)
						VALUES ('".$bildId."', '".$smartphoneId."')");
}
function _sichererUpload($file) {
	$upload_folder = './img/'; //Das Upload-Verzeichnis
	$filename = pathinfo($file['name'], PATHINFO_FILENAME);
	$extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));


	//Überprüfung der Dateiendung
	$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
	if(!in_array($extension, $allowed_extensions)) {
		throw new Exception("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
	}

	//Überprüfung der Dateigröße
	$max_size = 5000*1024; //5000 KB
	if($file['size'] > $max_size) {
		throw new Exception("Bitte keine Dateien größer 5000kb hochladen");
	}

	//Überprüfung, dass das Bild keine Fehler enthält
	$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
	$detected_type = exif_imagetype($file['tmp_name']);
	if(!in_array($detected_type, $allowed_types)) {
		throw new Ecxeption("Nur der Upload von Bilddateien ist gestattet");
	}

	//Pfad zum Upload
	$new_path = $upload_folder.$filename.'.'.$extension;

	//Neuer Dateiname falls die Datei bereits existiert
	if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
		$id = mt_rand();
		do {
			$new_path = $upload_folder.$filename.'_'.$id.'.'.$extension;
		} while(file_exists($new_path));
	}

	//Alles okay, verschiebe Datei an neuen Pfad
	move_uploaded_file($file['tmp_name'], $new_path);
	return $new_path;
}
function hinzufügenSmartphone(){
	if (!isset($_POST['einfügen'])) {
		return false;
	}
	$smartphone = $_POST;
	$smartphoneId = query("
			INSERT INTO `smartphone`
			(`idSmartphone`,
			`Kategorie_idKategorie`,
			`Hersteller_idHersteller`,
			`Bezeichnung`,
			`Beschreibung`,
			`Betriebssystem`,
			`Prozessor`,
			`Sprechzeit`,
			`Gewicht`,
			`Displaygroesse`,
			`Megapixel`,
			`Preis`,
			`ErstellDatum`)
			VALUES
			(NULL,
			'".$smartphone['kategorie']."',
			'".$smartphone['hersteller']."',
			'".$smartphone['bezeichnung']."',
			'".$smartphone['beschreibung']."',
			'".$smartphone['betriebssystem']."',
			'".$smartphone['prozessor']."',
			'".$smartphone['sprechzeit']."',
			'".$smartphone['gewicht']."',
			'".$smartphone['displaygröße']."',
			'".$smartphone['megapixel']."',
			'".$smartphone['preis']."',
			CURRENT_TIMESTAMP)
	",true);
	query("	INSERT INTO `smartphone_has_funktypen`
			(`Smartphone_idSmartphone`, `Funktypen_idFunktypen`)
			VALUES ('".$smartphoneId."', '".$smartphone['funktypen']."')"
			);
			try {
				if ( $_FILES['datei1']['name'] <> "") {
					$pfad1 = _sichererUpload($_FILES['datei1']);
					_bilderEinfügen($pfad1,$smartphoneId);
				}
				if ( $_FILES['datei2']['name'] <> "") {
					$pfad2 = _sichererUpload($_FILES['datei2']);
					_bilderEinfügen($pfad2,$smartphoneId);
				}
				if ( $_FILES['datei3']['name'] <> "") {
					$pfad3 = _sichererUpload($_FILES['datei3']);
					_bilderEinfügen($pfad3,$smartphoneId);
				}
			} catch (Exception $e) {
				echo $e->getMessage();
			}
}

function erstelltNachricht() {
	if (isset($_POST['einfügen'])) {
		echo "<p>Das Smartphone wurde erstellt.</p>";
	}
}


function bilderAnzeigen() {
	if (!isset($_GET['smartphoneId']) || !$_GET['smartphoneId']) {
		return false;
	}
	$smartphoneId = $_GET['smartphoneId'];
	$res = query("	SELECT *
					FROM `bilder_has_smartphone`
					join `bilder`
					WHERE bilder_has_smartphone.Smartphone_idSmartphone = ".$smartphoneId." AND
					bilder_has_smartphone.Bilder_idBilder = bilder.idBilder");
	$zähler = 0;
	echo "<br/>";
	while ($row = mysqli_fetch_assoc($res)){
		$zähler++;
		echo '<div class="col-sm-4 col-lg-4 col-md-4">';
			echo '<div class="thumbnail">';
				echo '<img src="'.$row['Pfad'].'" alt="">';
			echo '</div>';
		echo '</div>';
	}
	if ($zähler == 0) {
		echo '<div class="col-sm-4 col-lg-4 col-md-4">';
			echo '<div class="thumbnail">';
				echo '<img src="http://placehold.it/320x150" alt="">';
			echo '</div>';
		echo '</div>';
	}
}

?>
