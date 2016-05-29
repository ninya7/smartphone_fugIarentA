<?php
include_once 'database.inc.php';
include_once 'smartphone.inc.php';
function erstelleKommentare($id){
	if (anzahlBewertungen($id) == 0) {
		echo "Keine Bewertungen vorhanden.";
		return false;
	}
	
	$res = query("SELECT * FROM `bewertung` WHERE Smartphone_idSmartphone = ".$id." ORDER BY ErstellDatum");
	while ($bewertung = mysqli_fetch_assoc($res)) {
		echo '<div class="row">';
		
		echo '<div class="row">';
		
		echo '<div class="col-md-12">';
		
		erstelleSterne($bewertung['Sterne'],true);
		$benutzer = benutzerInformationen($bewertung['User_idUser']);
		echo '<b>';
		echo "<span>".$benutzer['Login']."</span>  ";
		echo "<span>   Erstellt am: ".$bewertung['ErstellDatum']."</span>";
		echo '</b>';
		echo '<br/><br/>';
		echo '<p>'.$bewertung['Bewertungstext'].'</p>';
		echo $bewertung['Hilfreich']."  ";
		echo '<a href="item.php?smartphoneId='.$id.'&bewertungsId='.$bewertung['idBewertung'].'
		&hilfreichBewertung=1"><span class="glyphicon glyphicon-thumbs-up"></span></a>';
		erstelleSubKommentarFormular($bewertung['idBewertung'],$id);
		echo '</div>';
		
		echo '</div>';
		
		//Sub bewertungen
		_subBewertungen($bewertung['idBewertung'],$id);
		
		echo '</div>';
		echo '<hr>';
		echo '<hr>';
	}

}
function kommentarHinzufügen() {
	
	if (isset($_GET['kommentarSenden'])) {
		$kommentar = $_GET['kommentar'];
		$sterne = $_GET['sterne'];
		$smartphoneId = $_GET['smartphoneId'];
		query("INSERT INTO `bewertung` 
		(`idBewertung`, 
		`User_idUser`, 
		`Smartphone_idSmartphone`, 
		`Bewertungstext`, 
		`Sterne`, 
		`Hilfreich`, 
		`ErstellDatum`) 
		VALUES 
		(NULL, 
		'1',
		'".$smartphoneId."', 
		'".$kommentar."', 
		'".$sterne."', 
		'0', 
		CURRENT_TIMESTAMP);"); // TODO USER ID HINZUFÜGEN
		echo "Kommentar wurde erstellt.";
	}
}
function subKommentarHinzufügen() {
	
	if (isset($_GET['subKommentarSenden'])) {
		$kommentar = $_GET['subKommentar'];
		$smartphoneId = $_GET['smartphoneId'];
		$bewertungsId = $_GET['bewertungsId'];
		query("INSERT INTO `bewertungs_bewertung` 
		(`idBewertungs_Bewertung`, 
		`idBewertung`, 
		`User_idUser`, 
		`Smartphone_idSmartphone`, 
		`Bewertungstext`, 
		`Hilfreich`, 
		`ErstellDatum`) 
		VALUES 
		(NULL, 
		'".$bewertungsId."', 
		'1', 
		'".$smartphoneId."', 
		'".$kommentar."', 
		'0', 
		CURRENT_TIMESTAMP);"); // TODO USER ID HINZUFÜGEN
		echo "Kommentar wurde erstellt.";
	}
}
function _subBewertungen($bewertungsId,$smartphoneId) {
	$res = query("	SELECT * FROM `bewertungs_bewertung` 
					WHERE `idBewertung` = ".$bewertungsId." AND 
					`Smartphone_idSmartphone` = ".$smartphoneId." 
					ORDER BY ErstellDatum");
	
	while ($bewertung = mysqli_fetch_assoc($res)) {
		
		echo '<div class="col-md-12">';
		echo '<hr>';
		echo '<b>';
		$benutzer = benutzerInformationen($bewertung['User_idUser']);
		echo "<span>".$benutzer['Login']."</span>  ";
		echo "<span>   Erstellt am: ".$bewertung['ErstellDatum']."</span>";
		echo '</b>';
		echo '<br/><br/>';
		echo '<p>'.$bewertung['Bewertungstext'].'</p>';
		echo $bewertung['Hilfreich']."  ";
		echo '<a href="item.php?smartphoneId='.$smartphoneId.'&subBewertungsId='.$bewertung['idBewertungs_Bewertung'].'
				&hilfreichSubBewertung=1"><span class="glyphicon glyphicon-thumbs-up"></span></a>';
		echo '</div>';
		
	}
}
function hilfreichAddierer() {
	if (isset($_GET['hilfreichBewertung'])) {
		$bewertungsId = $_GET['bewertungsId'];
		$smartphoneId = $_GET['smartphoneId'];
		$res = query("SELECT * FROM `bewertung` WHERE idBewertung = ".$bewertungsId);
		$bewertung = mysqli_fetch_assoc($res);
		$anzahl = (int)$bewertung['Hilfreich'];
		$anzahl++;
		query("UPDATE `bewertung` SET `Hilfreich` = '".$anzahl."' WHERE `bewertung`.`idBewertung` = ".$bewertungsId);
	}
	if (isset($_GET['hilfreichSubBewertung'])) {
		$bewertungsId = $_GET['subBewertungsId'];
		$smartphoneId = $_GET['smartphoneId'];
		$res = query("SELECT * FROM `bewertungs_bewertung` WHERE idBewertungs_Bewertung = ".$bewertungsId);
		$bewertung = mysqli_fetch_assoc($res);
		$anzahl = (int)$bewertung['Hilfreich'];
		$anzahl++;
		query("UPDATE `bewertungs_bewertung` SET `Hilfreich` = '".$anzahl."' WHERE `bewertungs_bewertung`.`idBewertungs_Bewertung` = ".$bewertungsId);
	}
}
function benutzerInformationen($id) {
	$benutzer = null;
	$res = query("SELECT * FROM `user` WHERE `idUser` = ".$id);
	$benutzer = mysqli_fetch_assoc($res);
	return $benutzer;

}
function erstelleSubKommentarFormular($id,$smartphoneId) {
	echo '<form name="kommentarForm'.$id.'" method="get" action="item.php">';
	echo '<textarea name="subKommentar" placeholder="Kommentar" class="form-control" rows="1" required="required"></textarea>';
	echo '<input class="btn btn-default" type="submit" name="subKommentarSenden" value="Kommentar abgeben" >';
	echo '<input type="hidden"  name="smartphoneId" value="'.$smartphoneId.'" >';
	echo '<input type="hidden"  name="bewertungsId" value="'.$id.'" >';
	echo '</form>';
}