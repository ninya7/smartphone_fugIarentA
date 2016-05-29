


<?php
include_once "database.inc.php";

function createTable($kategorie) {

	$query = "SELECT * FROM `smartphone` WHERE `Kategorie_idKategorie` = $kategorie";

	if (empty($kategorie)) {
		$query = "SELECT * FROM `smartphone` WHERE 1";
	}

	echo '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">';
	echo '<thead>';
	echo '<tr>';
	echo '<th>Category</th>';
	echo '<th>Handy</th>';
	echo '<th>Hersteller</th>';
	echo '<th class="hidden-xs">Preis</th>';
	echo '<th class="hidden-xs">Gesamtwertung</th>';
	echo '</tr>';
	echo '</thead>';
	echo '<tbody>';

	$res = query($query);

	while ($row = mysqli_fetch_assoc($res)) {


		echo "<tr>";
		echo "<td>";
		$categoryResult = query("SELECT * FROM `kategorie` WHERE `idKategorie` = ".$row['Kategorie_idKategorie']);
		$category = mysqli_fetch_assoc($categoryResult);
		$categoryName = strtolower($category["Kategorie"]);
		$replacedText = str_replace("_", "-", $category['Kategorie']);
		echo "<a href='".$categoryName.".php'>".$replacedText."</a>";
		echo "</td>";
			
		echo "<td>";
		echo "<a href='item.php?smartphoneId=".$row['idSmartphone']."' class='smartphone'>".$row['Bezeichnung']."</a>";
		echo "</td>";
			
		echo "<td>";
		$manufacturerResult = query("SELECT * FROM `hersteller` WHERE `idHersteller` = ".$row['Hersteller_idHersteller']);
		$manufacturer = mysqli_fetch_assoc($manufacturerResult);
		echo $manufacturer['Hersteller'];
		echo "</td>";
			
		echo "<td>";
		echo $row['Preis'];
		echo "</td>";
			
		echo "<td>";
		echo "tst";
		echo "</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	echo "</table>";
}
?>