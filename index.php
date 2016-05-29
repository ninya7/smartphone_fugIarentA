<?php
session_start();
?>
<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Homepage</title>

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

		<div class="">

			<div class="row carousel-holder">

				<div class="col-md-12">
					<div id="carousel-example-generic" class="carousel slide"
						data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								<img class="slide-image" src="img/slide-1.jpg" alt="">
							</div>
							<div class="item">
								<img class="slide-image" src="img/slide-2.jpg" alt="">
							</div>
							<div class="item">
								<img class="slide-image" src="img/slide-3.jpg" alt="">
							</div>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic"
							data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span>
						</a> <a class="right carousel-control"
							href="#carousel-example-generic" data-slide="next"> <span
							class="glyphicon glyphicon-chevron-right"></span> </a>
					</div>
				</div>

			</div>

			<?php
			include("inc/navigation_kategorie.inc.php");
			?>

			<div class="col-md-9">

				<div class="row" id="top">
					<div class="col-sm-4 col-lg-4 col-md-4">
						<h4>Top Einsteiger</h4>
						<?php
						include_once "kacheln.inc.php";
						$einsteigerKategorieId = 3;
						erstelleKacheln($einsteigerKategorieId,1);
						?>
					</div>
					<div class="col-sm-4 col-lg-4 col-md-4">
						<h4>Top Mittelklasse</h4>
						<?php
						include_once "kacheln.inc.php";
						$mittelklasseKategorieId = 4;
						erstelleKacheln($mittelklasseKategorieId,1);
						?>
					</div>

					<div class="col-sm-4 col-lg-4 col-md-4">
						<h4>Top High-End</h4>
						<?php
						include_once "kacheln.inc.php";
						$highEndKategorieId = 5;
						erstelleKacheln($highEndKategorieId,1);
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-lg-4 col-md-4">
						<button class="btn btn-primary" class="index_button_all"
							id="button_all">Show all</button>
					</div>
				</div>
				<br />

				<div class="row" id="all">

					<section class="container-fluid">
					<?php
					include_once "table.inc.php";
					createTable(0);
					?>
					</section>

				</div>

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
	<script>
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
		</script>

</body>

</html>
