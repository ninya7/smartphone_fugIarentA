<?php
session_start();
	if (isset($_SESSION['email']))
	{
			header ("Location: index.php");
			exit();
	}
	include ("database.inc.php");

	$msg = "";
	$email_check = true;
	$username_check = true;
	if(isset($_POST["submit"]))
	{
		$name = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
    $password2 = $_POST["password2"];
    $check = false;
		$password_email_versand = $password;

    if ($password == $password2){
      $check = true;
    }

    if ($check){
  		$name = mysqli_real_escape_string($db, $name);
  		$email = mysqli_real_escape_string($db, $email);
  		$password = mysqli_real_escape_string($db, $password);
  		$password = md5($password);


  		$sql="SELECT email FROM user WHERE email='$email'";
      $sql2 = "SELECT login FROM user WHERE login ='$name'";
  		$result=mysqli_query($db,$sql);
      $result2 = mysqli_query($db, $sql2);
  		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
  		$row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
  		if(mysqli_num_rows($result) == 1)
  		{
        $email_check = false;
  		}
  		else if (mysqli_num_rows($result2) == 1){
        $username_check = false;
      }else
  		{
  			$query = mysqli_query($db, "INSERT INTO user (login, email, password, admin) VALUES ('$name', '$email', '$password', 0)");
  			if($query)
  			{
          header("location: login.php"); // Redirecting To Other Page
  			}
  		}
    } else {
      echo "Die Passwörter sind nicht gleich.";
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

<title>Registrieren</title>

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
                        <h3 class="panel-title">Registrieren</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="">
                            <fieldset>
                                <div class="form-group">
                                    E-Mail
                                    <?php
                                    if ($email_check === false){
                                      echo "<br><p style='color:red'>E-Mail Adresse ist schon vergeben. Bitte melde dich <a href='login.php'>hier</a> an.</p></a>";
                                    }
                                    ?>
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" required="required" autofocus>
                                </div>
                                <div class="form-group">
                                    Username
                                    <?php
                                    if ($username_check === false){
                                      echo "<br><p style='color:red'>Username bereits vergeben. Bitte verwende einen anderen.</p>";
                                    }
                                    ?>
                                    <input class="form-control" placeholder="Username" name="username" required="required" type="text">
                                </div>
                                <div class="form-group">
                                    Passwort
                                    <input class="form-control" placeholder="Passwort" name="password" type="password" value="" required="required">
                                </div>
                                <div class="form-group">
                                    Passwort
                                    <input class="form-control" placeholder="Wiederhole das Passwort" name="password2" type="password" value="" required="required">
                                </div>
                                <input type="submit" name="submit" class="btn btn-lg btn-success btn-block" value="Registrieren" />
                                <hr />

                                <h4> Du hast schon einen Nutzer ? </h4>
                                <p> Dann melde dich hier an </p>
                                <a href="login.php" class="btn btn-lg btn-danger btn-block">Anmelden</a>
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
