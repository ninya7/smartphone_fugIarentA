<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Kontakt</title>

<?php
include ("inc/css.inc.php");
?>

</head>

<body>

	<!-- Navigation -->
<?php
include ("inc/navigation.inc.php");
?>

	<div class="container">

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">Anschrift</h2>
					<hr>
				</div>
				<div class="col-md-8">
					<!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
					<!--<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>-->
					<iframe width="100%" height="400" frameborder="0" scrolling="no"
						marginheight="0" marginwidth="0"
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d327447.21101427736!2d6.8975442608304816!3d50.12032863747553!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47be3898c1775fa5%3A0xbf965dabd2da92dd!2sCochem-Zell!5e0!3m2!1sde!2sde!4v1463737766926"></iframe>
				</div>
				<div class="col-md-4">
					<p>Phone:</p>
					<p>
						<strong>02653 / 915 125</strong>
					</p>
					<p>
						<strong>02653 / 568 129</strong>
					</p>
					<p>
						Email: <strong><a href="mailto:name@example.com">info@greenhell-photography.de</a>
						</strong>
					</p>
					<p>
						Address: <strong>56759 Kaisersesch <br>Musterstraße 5b</strong>
					</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="row">
			<div class="box">
				<div class="col-lg-12">
					<hr>
					<h2 class="intro-text text-center">
						Contact <strong>form</strong>
					</h2>
					<hr>
					<form role="form">
						<div class="row">
							<div class="form-group col-lg-4">
								<label>Name</label> <input type="text" class="form-control">
							</div>
							<div class="form-group col-lg-4">
								<label>Email Address</label> <input type="email"
									class="form-control">
							</div>
							<div class="clearfix"></div>
							<div class="form-group col-lg-12">
								<label>Message</label>
								<textarea class="form-control" rows="6"></textarea>
							</div>
							<div class="form-group col-lg-12">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container -->

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<p>Copyright &copy; Ingo Fug | Alexander Arent 2016</p>
				</div>
			</div>
		</div>
	</footer>

	<?php
	include ("inc/script.inc.php");
	?>

</body>

</html>
