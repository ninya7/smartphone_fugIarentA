<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Hinzufügen</title>

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
		<section>
			<!-- Top content -->
			<div class="top-content">

				<div class="inner-bg">
					<div class="container">

						<div class="row">
							<h1>Hinzufügen</h1>
						</div>

						<div class="row">
							<div class="col-lg-12">
							<?php 	include_once "smartphone.inc.php";
							erstelltNachricht();
							hinzufügenSmartphone();
							?>
									<div class="form-bottom">
										<form role="form" action="hinzufuegen.php" method="POST"
											class="registration-form" enctype="multipart/form-data">
											<div class="form-group">
												<label class="sr-only">Handyname</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i
														class="fa fa-mobile fa-fw" aria-hidden="true"></i> </span>
													<input type="text" name="bezeichnung" placeholder="Handyname"
														class="form-control" required="required">
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Hersteller</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i
														class="fa fa-mobile fa-fw" aria-hidden="true"></i> </span>
														<?php
														include_once "smartphone.inc.php";
														erstelleAuswahlMenüForm("Hersteller");
														?>
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Betriebssystem</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i
														class="fa fa-mobile fa-fw" aria-hidden="true"></i> </span>
													<input type="text" name="betriebssystem"
														placeholder="Betriebssystem" class="form-control"
														required="required">
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Prozessor</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i
														class="fa fa-mobile fa-fw" aria-hidden="true"></i> </span>
													<input type="text" name="prozessor" placeholder="Prozessor"
														class="form-control" required="required">
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only" for="form-email">Funktyp</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i
														class="fa fa-mobile fa-fw" aria-hidden="true"></i> </span>
														<?php
														include_once "smartphone.inc.php";
														erstelleAuswahlMenüForm("Funktypen");
														?>
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Gewicht</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i class="fa fa-fw"
														aria-hidden="true">g</i> </span> <input name="gewicht"
														type="number" placeholder="Gewicht" min="0" step="0.01"
														data-number-stepfactor="100" required="required"
														class="form-control" id="c2" />
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Sprechzeit</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i class="fa fa-fw"
														aria-hidden="true">h</i> </span> <input name="sprechzeit"
														type="number" placeholder="Sprechzeit" min="0" step="0.01"
														data-number-stepfactor="100" required="required"
														class="form-control" id="c2" />
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Auflösung</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i class="fa fa-fw"
														aria-hidden="true">Mpx</i> </span> <input name="megapixel"
														type="number" placeholder="Auflösung" min="0" step="0.01"
														 data-number-stepfactor="100" required="required"
														class="form-control" id="c2" />
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Display Größe</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i class="fa fa-fw"
														aria-hidden="true">Zoll</i> </span> <input
														name="displaygröße" type="number"
														placeholder="Display Größe" min="0" step="0.01"
														 data-number-stepfactor="100" required="required"
														class="form-control" id="c2" />
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Preis</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i class="fa fa-fw">€</i> </span>
													<input name="preis" type="number" placeholder="Preis"
														min="0" step="0.01" required="required"
														data-number-stepfactor="100" class="form-control currency"
														id="c2" />
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Beschreibung</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i
														class="fa fa-mobile fa-fw" aria-hidden="true"></i> </span>
													<textarea name="beschreibung" placeholder="Beschreibung"
														class="form-control" rows="5" required="required"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Preiskategorie</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i
														class="fa fa-mobile fa-fw" aria-hidden="true"></i> </span>
														<?php
														include_once "smartphone.inc.php";
														erstelleAuswahlMenüForm("Kategorie");
														?>
												</div>
											</div>
											<div class="form-group">
												<label class="sr-only">Beschreibung</label>
												<div class="input-group margin-bottom-sm">
													<span class="input-group-addon"><i
														class="fa fa-mobile fa-fw" aria-hidden="true"></i> </span>
													<input type="file" name="datei1" class="form-control">
													<input type="file" name="datei2" class="form-control">
													<input type="file" name="datei3" class="form-control">
												</div>
											</div>
											
											<input type="submit" class="btn btn-primary btn-lg btn-block"
												name="einfügen" value="Hinzufügen">
										</form>
									</div>
								</div>
								
								<div class="sign-up"></div>

							</div>
						</div>
					</div>
				</div>

			</div>
		</section>

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
	<script>
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
		</script>

</body>

</html>
