<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Einsteiger</title>

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

				<div class="row" id="top">



					<div class="col-sm-4 col-lg-4 col-md-4">
					<?php
					include_once "kacheln.inc.php";
					$einsteigerKategorieId = 3;
					erstelleKacheln($einsteigerKategorieId,6);
					?>
					</div>

					<div class="col-sm-4 col-lg-4 col-md-4">
						<div class="thumbnail">
							<img src="http://placehold.it/320x150" alt="">
							<div class="caption">
								<h4>
									<a href="item.php">First Smartphone</a>
								</h4>
								<p>Kurze Beschreibung des Handys.</p>
							</div>
							<div class="ratings">
								<p class="pull-right">31 reviews</p>
								<p>
									<span class="glyphicon glyphicon-star"></span> <span
										class="glyphicon glyphicon-star"></span> <span
										class="glyphicon glyphicon-star"></span> <span
										class="glyphicon glyphicon-star"></span> <span
										class="glyphicon glyphicon-star-empty"></span>
								</p>
							</div>
						</div>
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
						<table id="example" class="table table-striped table-bordered"
							cellspacing="0" width="100%">
							<thead>
								<tr>
									<th>Handy</th>
									<th>Hersteller</th>
									<th class="hidden-xs">Preis</th>
									<th>Gesamtwertung</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><a href="item.php" class="smartphone">Tiger Nixon</a></td>
									<td>Support Lead</td>
									<td class="hidden-xs">Edinburgh</td>
									<td>22</td>
								</tr>
								<tr>
									<td><a href="item.php" class="smartphone">Tiger Nixon</a></td>
									<td>Regional Director</td>
									<td class="hidden-xs">San Francisco</td>
									<td>36</td>
								</tr>
								<tr>
									<td><a href="item.php" class="smartphone">Tiger Nixon</a></td>
									<td>Regional Director</td>
									<td class="hidden-xs">London</td>
									<td>19</td>
								</tr>
								<tr>
									<td><a href="item.php" class="smartphone">Tiger Nixon</a></td>
									<td>Marketing Designer</td>
									<td class="hidden-xs">London</td>
									<td>66</td>
								</tr>
							</tbody>
						</table>
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
