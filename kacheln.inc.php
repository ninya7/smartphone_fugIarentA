
<?php
include_once "database.inc.php";

function _kachelnOhneBewertung($kategorieId,$amount) {
	$query = "	SELECT *
								FROM `smartphone` 
								WHERE `Kategorie_idKategorie` = $kategorieId";


	$res = query($query);
	$kachelnErstellt = 0;
	while ($row = mysqli_fetch_assoc($res)) {
		if ($kachelnErstellt == $amount) {
			return $kachelnErstellt;
		}
		$pictureResult = query (
							"SELECT * 
							FROM `bilder_has_smartphone`
							join `bilder`
							WHERE bilder_has_smartphone.Smartphone_idSmartphone = .".$row['idSmartphone']." AND 
							bilder_has_smartphone.Bilder_idBilder = bilder.idBilder");
			
		$picture = mysqli_fetch_assoc($pictureResult);
		if (empty($picture)) {
			$picture['Pfad'] = "http://placehold.it/320x150";
		}
		echo '<div class="thumbnail">';
		echo '<img src="'.$picture['Pfad'].'" alt="">';
		echo '<div class="caption">';
		echo '<h4><a href="item.php?smartphoneId='.$row['idSmartphone'].'">'.$row['Bezeichnung'].'</a>';
		echo '</h4>';
		echo '<p>'.$row['Beschreibung'].'</p>';
		echo '</div>';
		echo '<div class="ratings">';
		echo '<p>';
		echo "Keine Bewertungen abgegeben";
		echo '</p>';
		echo '</div>';
		echo '</div>';
		$kachelnErstellt++;
	}
	return $kachelnErstellt;
}
function _kachelnMitBewertung($kategorieId,$amount) {

	$query = "	SELECT *
				FROM `smartphone` 
				JOIN `bewertung`
				ON bewertung.Smartphone_idSmartphone = smartphone.idSmartphone
				WHERE `Kategorie_idKategorie` = $kategorieId";

	$größteSternIds = array();
	$tempSterne = 0;
	$res = query($query);
	// Ermittle die gr��ten Sterne von allen Smartphones einer Kategorie und speichere sie.
	while ($row = mysqli_fetch_assoc($res)) {
		if ($row['Sterne']>=$tempSterne) {
			$tempSterne = $row['Sterne'];
			$größteSternIds[] = $row['idSmartphone'];
		}
	}
	// Solange noch Sterne vorhanden sind tue:
	$kachelnErstellt = 0;
	for ($i = 1; $i <= count($größteSternIds); $i++) {

		if ($kachelnErstellt == $amount) {
			return $kachelnErstellt;
		}
		$momentaneId = $größteSternIds[count($größteSternIds)-$i];
		
		$sterne = anzahlSterne($momentaneId);
		
		$gesamtAnzahlBewertungen = anzahlBewertungen($momentaneId);
		
		$smartphoneQuery = query("	SELECT *
									FROM `smartphone` 
									WHERE idSmartphone = ".$momentaneId);
		$momentaneSmartphone = mysqli_fetch_assoc($smartphoneQuery);
		
		$res = query (	"		SELECT *
								FROM `bilder_has_smartphone`
								join `bilder`
								WHERE bilder_has_smartphone.Smartphone_idSmartphone = ".$momentaneSmartphone['idSmartphone']." AND 
								bilder_has_smartphone.Bilder_idBilder = bilder.idBilder");
		$picture = mysqli_fetch_assoc($res);

		if (empty($picture)) {
			$picture['Pfad'] = "http://placehold.it/320x150";
		}
			
		echo '<div class="thumbnail">';
		echo '<img src="'.$picture['Pfad'].'" alt="">';
		echo '<div class="caption">';
		echo '<h4><a href="item.php?smartphoneId='.$momentaneSmartphone['idSmartphone'].'">'.$momentaneSmartphone['Bezeichnung'].'</a>';
		echo '</h4>';
		echo '<p>'.$momentaneSmartphone['Beschreibung'].'</p>';
		echo '</div>';
		echo '<div class="ratings">';
		echo '<p class="pull-right">'.$gesamtAnzahlBewertungen.' reviews</p>';
		echo '<p>';
		erstelleSterne($sterne);
		echo '</p>';
		echo '</div>';
		echo '</div>';
		$kachelnErstellt++;

	}
	return $kachelnErstellt;


}
function erstelleSterne($sterne,$abstand = false){
	$lücke = "";
	if ($abstand) {
		$lücke = " ";
	}
if ($sterne >= 5) {
			for ($i=0;$i<5;$i++) {
				echo '<span class="glyphicon glyphicon-star"></span>'.$lücke;
			}
		} else {
			for ($i=0;$i<$sterne;$i++) {
				echo '<span class="glyphicon glyphicon-star"></span>'.$lücke;
			}
			for ($j = 5; $j-$i > 0;$j--) {
				echo '<span class="glyphicon glyphicon-star-empty"></span>'.$lücke;
			}
		}
}
function anzahlSterne($id) {
	$query = "	SELECT *
				FROM `bewertung`
				WHERE bewertung.Smartphone_idSmartphone = ".$id;
		$res = query($query);
		$bewertungsZaehler = 0;
		$gesamtSterne = 0;
		// Hol mir alle Bewertungen f�r das momentane Smartphone
		while ($row = mysqli_fetch_assoc($res)) {
			$gesamtSterne = $gesamtSterne + $row['Sterne'];
			$bewertungsZaehler++;
		}
		$sterne = 0;
		if ($gesamtSterne != 0) {
			$sterne =round($gesamtSterne / $bewertungsZaehler);
		}
		
		return $sterne;
		
}

function anzahlBewertungen($id) {
			
	
	$anzahlBewertungenQuery = query ("SELECT count(*)
									+
									(SELECT count(*) from bewertungs_bewertung where 
									bewertungs_bewertung.Smartphone_idSmartphone=".$id.") AS Anzahl 
									
									from bewertung where bewertung.Smartphone_idSmartphone=".$id);
		$gesamtAnzahlBewertungen = mysqli_fetch_assoc($anzahlBewertungenQuery);
		return $gesamtAnzahlBewertungen['Anzahl'];
}
function _leereKacheln(){
	echo '<div class="thumbnail">';
	echo '<img src="http://placehold.it/320x150" alt="">';
	echo '<div class="caption">';
	echo '<p>Kein Handy gefunden</p>';
	echo '</div>';
	echo '<div class="ratings">';
	echo '<p class="pull-right">0 reviews</p>';
	echo '<p>';
	for ($i=0;$i<5;$i++) {
		echo '<span class="glyphicon glyphicon-star-empty"></span>';
	}
	echo '</p>';
	echo '</div>';
	echo '</div>';
}


function erstelleKacheln($kategorieId,$amount) {
	$query = "	SELECT *
				FROM `smartphone` 
				WHERE `Kategorie_idKategorie` = $kategorieId";


	$res = query($query);
	$rowsFound = 0;
	while ($row = mysqli_fetch_assoc($res)) {
		$rowsFound++;
	}
	if (empty($rowsFound)) {
		for ($i = 0; $i < $amount; $i++) {
			_leereKacheln();
		}
	} else {
			
		$query = "	SELECT *
				FROM `smartphone` 
				JOIN `bewertung`
				ON bewertung.Smartphone_idSmartphone = smartphone.idSmartphone
				WHERE `Kategorie_idKategorie` = $kategorieId";
		$bewertungenFound = 0;
		$res = query($query);
		while ($row = mysqli_fetch_assoc($res)) {
			$bewertungenFound++;
		}
		if (empty($bewertungenFound)) {
			$anzahlKachelnErstellt = 0;
			$anzahlKachelnErstellt = _kachelnOhneBewertung($kategorieId,$amount);
			if ($anzahlKachelnErstellt < $amount) {
				for ($i = $anzahlKachelnErstellt; $i <= $amount; $i++) {
					_leereKacheln();
				}
			}
		} else {
			$anzahlKachelnErstellt = 0;
			$anzahlKachelnErstellt = _kachelnMitBewertung($kategorieId,$amount);
			var_dump($anzahlKachelnErstellt);
			if ($anzahlKachelnErstellt < $amount) {
				//ER FINDET SICH SELBST FIXEN
				$anzahlKachelnErstellt = $anzahlKachelnErstellt + _kachelnOhneBewertung($kategorieId,$amount);
				if ($anzahlKachelnErstellt < $amount) {
					for ($i = $anzahlKachelnErstellt; $i <= $amount; $i++) {
						_leereKacheln();
					}
				}
			}

		}
			
			
	}

}

?>