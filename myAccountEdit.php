<?php
//** This file edits the user information

//** The session_start() function holds all the global variables' values
session_start();

$user = 'DBMaster';
$pass = '12341234';
$db = 'wavexpandDB';

$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

$email = $_SESSION['$email'];

//**check if the user's information have been changed and implement the changes
if(isset($_POST['update']) && !empty($_POST['update']))
{
	$email = $_POST['email'];
	$_SESSION['$email'] = $_POST['email'];
	$updateQuery = "UPDATE accountstable SET name = '$_POST[name]', email = '$_POST[email]', mobile = '$_POST[mobileNum]', password = '$_POST[password]' WHERE email = '$_POST[hidden]' ";
	mysqli_query($db,$updateQuery);

	header('Location: myAccount.php');
}


$sql = "SELECT * FROM accountstable WHERE email = '$email'";
$result = $db->query($sql);

//**retrieve the user's information using the email of the user
if($result->num_rows >0)
{

while ($row = $result->fetch_assoc())
{
	$name = $row["name"];
	$password = $row["password"];
	$mobileNum = $row["mobile"];
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

	<script type="text/javascript">

		function validateForm() {

		  	var name = document.forms["myForm"]["name"].value;
		  	var email = document.forms["myForm"]["email"].value;
		  	var password = document.forms["myForm"]["password"].value;
		  	var mobileNum = document.forms["myForm"]["mobileNum"].value;

		  	if (name == null || name == "" || email == null || email == "" || password == null || password == "" || mobileNum == null || mobileNum == "")
			  	{
			    	alert("Please Fill All Required Field");
			      	return false;
			  	}

			var mobileNumRegex = /^\d{10}$/;
			//** Check if the phone number contains exactly 10 digits
		  	if (mobileNum.match(mobileNumRegex))
		  		{
  				// $phone is valid
				}
			else
			{
				alert("phone invalid, you should enter ten digits");
				return false;
			}

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


	<!-- Import Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>edit account - waveXpand</title>

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
		<div class="content--training account-details-edit">
			<form name="myForm" action="myAccountEdit.php" method="post" onsubmit="return validateForm();">

				<div class="input-field">
					<input type="text" name="name" value="<?php echo $name; ?>"><br/>
					<label for="name">Name</label>
				</div>

				<div class="input-field">
					<input type="text" name="email" value="<?php echo $email; ?>"><br/>
					<!--The hidden input is used when querying the the database after changing the user info-->
					<input type="hidden" name="hidden" value="<?php echo $email; ?>">
					<label for="email">Email</label>
				</div>

				<div class="input-field">
					<input type="password" name="password" value="<?php echo $password; ?>"><br/>
					<label for="password">Password</label>
				</div>

				<div class="input-field">
					<input type="text" name="mobileNum" value="<?php echo $mobileNum; ?>"><br/>
					<label for="mobileNum">Mobile Number</label>
				</div>

				<input class="action-button update-details" type="submit" name="update" value="Update">

			</form>
		</div>
</body>
</html>
