<?php

	session_start();
	if (isset($_SESSION['email']))
	{
			header ("Location: index.php");
			exit();
	}
	include("database.inc.php"); //Establishing connection with our database

	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["email"]) || empty($_POST["password"]))
		{
			$error = "Beide Felder sind notwendig.";
			echo $error;
		}else
		{
			// Define $username and $password
			$email=$_POST['email'];
			$password=$_POST['password'];

			// To protect from MySQL injection
			$email = stripslashes($email);
			$password = stripslashes($password);
			$email = mysqli_real_escape_string($db, $email);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);

			//Check username and password from database
			$sql="SELECT idUser FROM user WHERE email='$email' and password='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

			//If username and password exist in our database then create a session.
			//Otherwise echo error.

			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['email'] = $email; // Initializing Session
				header("location: index.php"); // Redirecting To Other Page
			}else
			{
				$error = true;
			}

		}
	}

?>


<!DOCTYPE html>
<html lang="de">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Login</title>

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
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
                            <fieldset>
																<?php
																if ($error){
																	echo '<p style="color:red;">E-Mail oder Password falsch</p>';
																}
																?>
                                <div class="form-group">
																		E-Mail
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" required="required" autofocus>
                                </div>
                                <div class="form-group">
																		Passwort
                                    <input class="form-control" placeholder="Passwort" name="password" type="password" value="" required="required">
                                </div>
																<input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Login" />
																<hr />

                                <h4> Du hast noch keinen Benutzer ? </h4>
                                <p> Dann registriere dich hier </p>
                                <a href="register.php" class="btn btn-lg btn-danger btn-block">Hier Registrieren</a>
                            </fieldset>
                        </form>
                    </div>
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
