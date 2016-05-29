<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'smartphoneportal_fugarent');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

function query($query,$returnId=false) {
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	$res = mysqli_query($db, $query);
	if ($returnId) {
		$res = mysqli_insert_id($mysqli);
	}
	mysqli_close($db);
	return $res;

}

?>
