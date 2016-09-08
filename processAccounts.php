<?php
	//** This file processes the user information after registering and making an account

	//** The session_start() function holds all the global variables' values
	session_start();

	$message = "";

	$firstName = $_POST['name'];

	$_SESSION['$name'] = $firstName;

	$email = $_POST['email'];
	$mobileNumber = $_POST['number'];
	$password = $_POST['password'];

	$user = 'DBMaster';
	$pass = '12341234';
	$db = 'wavexpandDB';

	$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

	//** Check if user has an account already
	$query = mysqli_query($db, "SELECT * From registrationtable WHERE applicantEmail='$email'");
	if(mysqli_num_rows($query) > 0)
		{
			$isRegistered = true;
			//echo "You have already registered !!!!!!!!";
			$message = "You have already registered !!!!!!!!";
		}
	else
		{
			$sql = "INSERT INTO accountstable (name, email, mobile, password) VALUES ('{$db->real_escape_string($firstName)}',
'{$db->real_escape_string($email)}', '{$db->real_escape_string($mobileNumber)}', '{$db->real_escape_string($password)}')";

			$insert = $db->query($sql);

			//echo ("insertion successful");
			$message = "You have successfully registered";

		}
?>

<!DOCTYPE html>
<html>
<head>

    <!-- Import Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>registration status - waveXpand</title>

    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        Materialize.updateTextFields();
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $('select').material_select();
      });
    </script>

    <script type="text/javascript">
      function openModal(btn) {
          var modal = document.getElementById('login-box');
          modal.style.display = "block";
      }
    </script>

    <script type="text/javascript">
      function closeModal(btn) {
          var modal = document = document.getElementById("login-box");
          modal.style.display = "none";
      }
    </script>

  </head>
	<body>
    	<header>
		      <a href="index.php">
		        <img class="logo" src="images/logo.png">
		      </a>

		      <ul class="nav-options">
		        <a class="nav-option" href="training.php">
		          training
		        </a><?php
		        //** Check if user is logged in or not
		        if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)):
		        ?>

		        <a id="sign-in-nav" class="nav-option" onclick="openModal(this);">
		          sign in
		        </a>

		      <?php else: ?>
		        <a id="sign-in-nav" class="nav-option" href="myAccount.php">
		          my account
		        </a>
		        <a id="sign-in-nav" class="nav-option" href="logout.php">
		          sign out
		        </a>
		      <?php endif; ?>
		      </ul>

		      <div id="login-box" class="modal">

        <div class="modal-content">
          <span class="close" onclick="closeModal(this);"></span><!--Display the sign-in form on click-->

          <form name="myForm2" method="post" action="register.php" onsubmit="return validateForm();">
            <div class="input-field">
  						<input id="username" type="text" name="email" autocapitalize="none">
  						<label for="username">Cisco Email</label>
  					</div>
  					<div class="input-field">
  						<input id="password" type="password" name="password">
  						<label for="password">Password</label>
  					</div>
						<div class="register-on-card">
							<p id="no-account"> Don't have an account? </p>
							<a id="register-option" href="register.php"> Register </a>
						</div>
            <button class="action-button" type="submit" value="Submit" id="sign-in">Sign in</button>
          </form>

        </div>

      </div>


    	</header>

    	<form id="registration--profile" name="myForm" action="processAccounts.php" onsubmit="return validateForm();" method="post">
				<!-- The message states whether the user registered successfully or failed in registration because he/she already has an account-->
		    <p class="input-field" ><font color="white" size="6"><?php echo $message; ?></font></p>
			</form>
	</body>
</html>
