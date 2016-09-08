<?php

session_start();

$user = 'DBMaster';
$pass = '12341234';
$db = 'wavexpandDB';

$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

$email = $_SESSION['$email'];

$sql = "SELECT * FROM accountstable WHERE email = '$email'";
$result = $db->query($sql);

//**retrieve the user's information using the email of the user
if($result->num_rows >0)
{
  while ($row = $result->fetch_assoc())
  {
    	$name = $row["name"];
    	$mobileNum = $row["mobile"];
    	$password = $row["password"];
  }
}
else{echo "Could NOT retrieve the User's information!!!";}

$sql2 = "SELECT * FROM registrationtable WHERE applicantEmail ='$email'";
$result2 = $db->query($sql2);

$registeredCourseVar = array();
$courseDateVar = array();
$arrayCounter = 0;
//**retrieve the user's registered courses
if($result2->num_rows >0)
{
  while ($row = $result2->fetch_assoc())
  {
  	$registeredCourseVar[$arrayCounter] = $row["registeredCourse"];
  	$courseDateVar[$arrayCounter] = $row["courseDate"];
  	$arrayCounter++;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Import Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>my account - waveXpand</title>

    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
        Materialize.updateTextFields();
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
        </a>
        <?php
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
          <span class="close" onclick="closeModal(this);"></span>

          <form name="myForm" method="post" action="register.php" onsubmit="return validateForm();">
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

    </header> <!-- End of navigation bar -->

    <div class="content--training">
      <!-- This form displays the user information along with his/her registered courses-->
      <form class="account-details">
        <p class="title account--title"> my account </p>
        <div id="course-description">
          <ul class="details-box account-details--box">
            <p> name </p>
            <div> <?php echo $name; ?> </div>
          </ul>
          <ul class="details-box account-details--box">
            <p> email </p>
            <div><?php echo $email; ?></div>
          </ul>
          <ul class="details-box account-details--box">
            <p> password </p>
            <div>
              <?php
                for ($i = 0; $i < strlen($password); $i++) {
                  echo "*";
                }
              ?>
            </div>
          </ul>
          <ul class="details-box account-details--box">
            <p> mobile </p>
            <div><?php echo $mobileNum; ?></div>
          </ul>
          <ul class="details-box account-details--box">
            <p> courses </p>
            <div>
              <?php
            	for ($counter = 0 ; $counter < count($registeredCourseVar) ; $counter++)
            	{
            	echo "<p> $registeredCourseVar[$counter]
            	|  $courseDateVar[$counter] </p>";

            	}
            	?>
            </div>
          </ul>
        	<input type="button" class="action-button edit-details" name="edit info" value="Edit" onclick="location.href='myAccountEdit.php';"></input>
        </div>
      </form>
    </div>
</body>
</html>
