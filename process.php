<?php
/*** This file processes the user input after registering for a course,
it then sends a confirmation message to the user and send an excel csv
file to the designated administrator that contains a list of all registered
users along with there related information ***/

session_start();
$emailFromLogin = $_SESSION['$email'];

$onScreenMessage ="";

ob_start();

$isRegistered = false;

/** This part is for connecting to PHPMailer which is a code library that easily allows
for the sending of emails that contain attachments **/
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'registrar@wavexpand.com';                 // SMTP username
$mail->Password = 'CiscoTrain';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('registrar@wavexpand.com', 'Mailer');
$mail->addAddress('obeid.omar93@gmail.com', 'Joe User');     // Add a recipient

/////////////////////////////////////////////////////////
//This is for sending the confirmation message through PHPMailer
$mailConfirmation = new PHPMailer;

$mailConfirmation->isSMTP();                                      // Set mailer to use SMTP
$mailConfirmation->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
$mailConfirmation->SMTPAuth = true;                               // Enable SMTP authentication
$mailConfirmation->Username = 'registrar@wavexpand.com';                 // SMTP username
$mailConfirmation->Password = 'CiscoTrain';                           // SMTP password
$mailConfirmation->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mailConfirmation->Port = 587;                                    // TCP port to connect to

$mailConfirmation->setFrom('registrar@wavexpand.com', 'Mailer');
    // Add a recipient

$course = $_SESSION['$course'];
$date = $_SESSION['$date'];
?>
<?php

$from="registrar@wavexpand.com";
$email=$emailFromLogin;

$mailConfirmation->addAddress("$email", 'Joe User');

$subject='Confirmation';
$message='Congratulations, you have successfully registered in our course';

?>
<?php

$user = 'DBMaster';
$pass = '12341234';
$db = 'wavexpandDB';

$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

$query = mysqli_query($db, "SELECT * From registrationtable WHERE applicantEmail='$email' AND registeredCourse='$course'");
// Check if user has aleardy registered to the specified course
if(mysqli_num_rows($query) > 0)
{
	$isRegistered = true;
  	$onScreenMessage = "You have already registered !!!!!!!!";
}
else
{
	$onScreenMessage = "You have successfully registered";

	$query = mysqli_query($db, "SELECT name From accountstable WHERE email='$email'");

	$name = array();
	while ($row = mysqli_fetch_array($query))
		{
		    array_push($name, $row["name"]);
		}

	$userName = $name[0];


	$mailConfirmation->Subject = 'Registration Confirmation';
	$mailConfirmation->Body    = 'You have successfully registered in our course';
	$mailConfirmation->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mailConfirmation->send())
		{
		    echo '  Message could not be sent.';
		    echo '  Mailer Error: ' . $mail->ErrorInfo;
		}

	mail($email, $subject, $message, "From:".$from);

	//**Save the course registration information in the database
	$sql = "INSERT INTO registrationtable ( applicantName, applicantEmail, registeredCourse, courseDate ) VALUES ( '{$db->real_escape_string($userName)}',
	'{$db->real_escape_string($email)}', '{$db->real_escape_string($course)}', '{$db->real_escape_string($date)}'  )";

	$insert = $db->query($sql);

	//////////This part is for creating the excel file

	$fileName = 'excelFile.csv';
	//change permission of the file
	chmod($fileName,0777);

	$sql = mysqli_query($db,"SELECT * FROM registrationtable") or die(mysqli_error($db));
	$num_rows = mysqli_num_rows($sql);

	if($num_rows >= 1)
	{

		$row = mysqli_fetch_assoc($sql);
		if(!($fp = fopen($fileName,"w+")))
		{
			echo "    error, could not open the file";
		}


		$separator = "";
		$comma = "";

		foreach($row as $name => $value)
		{
			$separator .= $comma . '' .str_replace('','""',$name);
			$comma = ",";
		}
		$separator .= "\n";

		fputs ($fp,$separator);

		//** let you use the same query and leave the first row because we already have it at the top
		mysqli_data_seek($sql, 0);

		while($row = mysqli_fetch_assoc($sql))
		{
			$separator = "";
			$comma = "";
			foreach($row as $name => $value)
			{
				$separator .= $comma . '' .str_replace('','""',$value);
				$comma = ",";
			}
			$separator .= "\n";
			fputs ($fp,$separator);
		}

		fclose($fp);
	}

	else
	{
		echo '   No records in the database';
	}

	///////////////////////////////////////////////////////////////////
	//This part is for sending the excel file
	$mail->addAttachment('excelFile.csv');
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Database Excel File';
	$mail->Body    = 'The table of registered SEs is attached with this email';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	    echo '  Message could not be sent.';
	    echo '  Mailer Error: ' . $mail->ErrorInfo;
	}

}
$db->close();


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
        </a>
        <?php
        //** Check if user is logged in or not
        if (!(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)):
        ?>

        <a id="sign-in-nav" class="nav-option" onclick="openModal(this);">
          sign in
        </a>

      <?php else: ?>
        <a id="sign-in-nav" class="nav-option" href="logout.php">
          sign out
        </a>
        <a id="sign-in-nav" class="nav-option" href="myAccount.php">
          my account
        </a>
      <?php endif; ?>
      </ul>

      <div id="login-box" class="modal">

        <div class="modal-content">
          <span class="close" onclick="closeModal(this);"></span><!--Display the sign-in form on click-->

          <form name="myForm" method="post" action="register.php" onsubmit="return validateForm();">
            <div class="input-field">
              <input id="username" type="text" name="email">
              <label for="username">Username</label>
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

    <div class="content--training">
      <form>
      <!-- The message states whether the user registered in the course successfully or
      failed in registration because he/she already has registered for the course-->
        <p><font color="white" size="6"><?php echo $onScreenMessage; ?></font></p>
      </form>
    </div>

  </body>
</html>
