<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdwon visible-xs">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    Smartphone Kategorie <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                        <a href="einsteiger.php" class="text">Einsteiger</a>
                    </li>
                    <li>
                        <a href="mittelklasse.php" class="text">Mittelklasse</a>
                    </li>
                    <li>
                        <a href="high_end.php" class="text">High-End</a>
                    </li>
                  </ul>
                </li>
                <?php
                if (!isset($_SESSION['email'])){
                  echo '
                  <li>
                      <a href="login.php">Login</a>
                  </li>
                  <li>
                      <a href="contact.php">Contact</a>
                  </li>';
                }else{
                  echo '
                  <li>
                      <a href="hinzufuegen.php">Hinzufügen</a>
                  </li>
                  <li>
                      <a href="contact.php">Contact</a>
                  </li>
                  <li>
                      <a href="logout.php">Logout</a>
                  </li>';
                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
