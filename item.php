<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Smartphone :: Detail</title>

<?php
include ("inc/css.inc.php");
?>

</head>

<body>

	<!-- Navigation -->
<?php
include ("inc/navigation.inc.php");
?>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

		<?php
		include("inc/navigation_kategorie.inc.php");
		?>

			<div class="col-md-9">
			<?php include_once 'kommentare.inc.php';
			kommentarHinzufügen();
			subKommentarHinzufügen();
			hilfreichAddierer();
			?>
				<div class="thumbnail">



				<?php
				include_once "smartphone.inc.php";
				bilderAnzeigen();
				?>


				<?php
				$row = "";
				if (isset($_GET['smartphoneId'])) {
					include_once 'database.inc.php';
					$res = query(
					"SELECT * FROM `smartphone` 
					JOIN `kategorie`,`hersteller`
					WHERE Kategorie_idKategorie = idKategorie AND 
					Hersteller_idHersteller = idHersteller AND
					`idSmartphone` = ".$_GET['smartphoneId']
					);
					$row = mysqli_fetch_assoc($res);
				}
				?>
					<div class="clearfix"></div>
					<div class="caption-full">
						<h4>Smartphone Details</h4>
						<form class="form-horizontal" role="form">
							<div class="form-group">
								<label class="control-label col-sm-2">Name:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Name"
										value="<?php echo $row['Bezeichnung'];?>" readonly="readonly">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Hersteller:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Hersteller"
										value="<?php echo $row['Hersteller'];?>" readonly="readonly">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Kategorie:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Kategorie"
										value="<?php echo $row['Kategorie'];?>" readonly="readonly">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Preis:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="Preis"
										value="<?php echo $row['Preis'];?>" readonly="readonly">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-2">Beschreibung:</label>
								<div class="col-sm-10">
									<textarea name="beschreibung" class="form-control" rows="5"
										readonly="readonly"><?php echo $row['Beschreibung'];?>
									</textarea>
								</div>
							</div>
						</form>
					</div>
					<div class="ratings">
						<div class="row">
							<div class="col-sm-4 col-lg-4 col-md-4">
								<button class="btn btn-primary" class="index_button_all"
									id="button_all">Weitere Details</button>
							</div>
						</div>
						<div class="row" id="all">

							<section class="container-fluid">
								<table id="example" class="table table-striped table-bordered"
									cellspacing="0" width="100%">
									<tbody>
										<tr>
											<td><a>Betriebssystem:</a></td>
											<td><?php echo $row['Betriebssystem'];?></td>
											<td><a>Prozessor:</a></td>
											<td><?php echo $row['Prozessor'];?></td>
										</tr>
										<tr>
											<td><a>Sprechzeit:</a></td>
											<td><?php echo $row['Sprechzeit'];?> h</td>
											<td><a>Gewicht:</a></td>
											<td><?php echo $row['Gewicht'];?> g</td>
										</tr>
										<tr>
											<td><a>Displaygröße:</a></td>
											<td><?php echo $row['Displaygroesse'];?> "</td>
											<td><a>Megapixel:</a></td>
											<td><?php echo $row['Megapixel'];?> Mpx</td>
										</tr>
									</tbody>
								</table>
								<p>
									<a>Eingestellt am:</a>
								</p>
								<p>
								<?php echo $row['ErstellDatum'];?>
								</p>
							</section>

						</div>
						<p>
						<?php include_once 'kacheln.inc.php';
						$id = $_GET['smartphoneId'];
						$bewertungen = anzahlBewertungen($id);
						$sterne = anzahlSterne($id);
						echo '<p class="pull-right">'.$bewertungen.' Kommentare</p>';
						erstelleSterne($sterne,true);
						echo " ".$sterne.".0 Sterne";
						?>
					
					</div>
				</div>

				<div class="well">

					<div class="text-right">
						<a class="btn btn-default" id="add_kommentar_button">Kommentar
							hinzufügen</a>
					</div>
					<br />
					<form class="form-horizontal" role="form"
						id="add_kommentar_formular" action="item.php">
						<div class="form-group">
							<label class="control-label col-sm-2">Bewertung:</label>
							<div class="col-sm-10 input-group margin-bottom-sm">
								<span class="input-group-addon"><i class="fa fa-star fa-fw"
									aria-hidden="true"></i> </span> <input type="number"
									placeholder="Bewertung" min="0" max="5" step="1"
									required="required" data-number-stepfactor="100"
									class="form-control currency" id="c2" name="sterne" />
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">Kommentar:</label>
							<div class="col-sm-10 input-group margin-bottom-sm">
								<span class="input-group-addon"><i
									class="fa fa-commenting-o fa-fw" aria-hidden="true"></i> </span>
								<textarea class="form-control" rows="5" id="kommentar"
									placeholder="Dein Kommentar" name="kommentar"></textarea>
							</div>
						</div>
						<div class="text-right">
							<input type="submit" class="btn btn-success"
								id="add_kommentar_button_send" name="kommentarSenden"
								value="Kommentar hinzufügen">
						</div>
						<input type="hidden" name="smartphoneId"
							value="<?php echo $_GET['smartphoneId']?>">
					</form>

					<hr>
					<h3>Kommentare</h3>
					<br />
					<?php
					include_once "kommentare.inc.php";
					erstelleKommentare($_GET['smartphoneId']);
					?>



				</div>

			</div>

		</div>
		<!-- /.container -->

		<div class="container">

			<hr>

			<!-- Footer -->
			<footer>
				<div class="row">
					<div class="col-lg-12 text-center">
						<p>Copyright &copy; Ingo Fug | Alexander Arent 2016</p>
					</div>
				</div>
			</footer>

		</div>
		<!-- /.container -->

		<?php
	include ("inc/script.inc.php");
	?>

</body>

</html>
