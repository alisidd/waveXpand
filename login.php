<!--

<?php
	session_start();
	$password = "pass";

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
	{
		header("Location: training.php");
	}

	if (isset($_POST['password']))
	{
		if ($_POST['password'] == $password)
		{
			$_SESSION['logged_in'] = true;
			header("Location: training.php");
		}
	}
	if (!empty($_POST))
	{
$_SESSION['$loginEmail'] = $_POST['email'];
	}

	?>
-->

<!DOCTYPE html>

<html lang="en-US">
  <head>
    <!-- Import Google Icon fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Exo+2:600' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,200,300,500' rel='stylesheet' type='text/css'>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login - waveXpand</title>

    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script async type="text/javascript">
  		function mobileToggle(){
        if ($(".nav-options--mobile").hasClass("active")) {
          $(".nav-options--mobile").fadeOut();
        } else {
          $(".nav-options--mobile").fadeIn();
        }
        $(".nav-options--mobile").toggleClass("active");
  		}
  	</script>

		<script type="text/javascript">
			function validateForm() {
			    var x = document.forms["myForm"]["email"].value;
			    var atpos = x.indexOf("@");
			    var dotpos = x.lastIndexOf(".");
			    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			        alert("Not a valid e-mail address");
			        return false;
			    }

				var email = document.forms["myForm"]["email"].value;

				if ((email.indexOf('@cisco') == -1 ))
				{
					alert("You should use your Cisco email address!");
			    return false;
				}
			}
		</script>

  </head>

  <body>

    <header>

        <a href="index.php">
          <img class="logo" src="images/logo.png">
        </a>

        <nav>

          <!-- Nav options -->
          <ul class="nav-options">
            <div class="tab">
    					<div class="tab-box">
                <a href="about.php">
                  About
                  <span class="empty-span"></span>
                </a>
              </div>
            </div>
            <div class="tab">
    					<div class="tab-box">
                <a href="login.php">
                  Training
                  <span class="empty-span"></span>
                </a>
              </div>
            </div>
            <div class="tab">
    					<div class="tab-box--last">

              </div>
            </div>
          </ul>

          <!-- Mobile navigation menu -->
          <img onclick="mobileToggle()" src="images/nav.png" class="mobile-toggle">
          <ul class="nav-options--mobile">
              <li class="nav-option--mobile">
                Home
                <a href="index.php"><span class="empty-span"></span></a>
              </li>
              <li class="nav-option--mobile">
                About
                <a href="about.php"><span class="empty-span"></span></a>
              </li>
              <li class="nav-option--mobile--last">
                Training
                <a href="login.php"><span class="empty-span"></span></a>
              </li>
          </ul>
        </nav>
    </header>

    <div id="login" class="card-panel">
      <h1>Login</h1>
      <span>You have to login before registration</span>
      <div>
        <form name="myForm" method="post" action="login.php" onsubmit="return validateForm();">
          <div class="input-field">
						<input id="username" type="text" name="email">
						<label for="username">Username</label>
					</div>
					<div class="input-field">
						<input id="password" type="password" name="password">
						<label for="password">Password</label>
						<input class="btn" type="submit" value="Submit">
					</div>
        </form>
      </div>
    </br>
    </div>
  </body>
</html>
