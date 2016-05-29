<?php
session_start();
$emailFromLogin = $_SESSION['$loginEmail'];


//include 'training.php';

ob_start();

$isRegistered = false;

// This part is for connecting to PHPMailer
require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'registrar@wavexpand.com';                 // SMTP username
$mail->Password = 'Zx3228855';                           // SMTP password
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
$mailConfirmation->Password = 'Zx3228855';                           // SMTP password
$mailConfirmation->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mailConfirmation->Port = 587;                                    // TCP port to connect to

$mailConfirmation->setFrom('registrar@wavexpand.com', 'Mailer');
    // Add a recipient



/////////////////////////////////////////////////////////
$firstname = $_POST['firstName'];
$course = $_POST['course'];
$date = $_POST['date'];
//echo "The date is $date";
$xplod = explode(',', $date);
//print_r($xplod);
$stringDate = "$xplod[2]-$xplod[0]-$xplod[1]";
//echo "<br /> $stringDate";
$sqlDate = date("Y-m-d", strtotime($stringDate));
//echo "<br />$sqlDate <br />";

//echo "Hello $firstname"; ?> <br>
<?php
//echo "you have chosen the $course";

$from="registrar@wavexpand.com";
$email=$emailFromLogin;
//echo $email;
$mailConfirmation->addAddress("$email", 'Joe User'); 

//echo $testingVar;


$subject='Confirmation';
$message='Congratulations, you have successfully registered in our course';


?>
<br>
<?php





$user = 'DBMaster';
$pass = '12341234';
$db = 'wavexpandDB';

$db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

$query = mysqli_query($db, "SELECT * From registrationtable WHERE applicantEmail='$email' AND registeredCourse='$course'");
if(mysqli_num_rows($query) > 0)
{
	echo 'You have already registered this course ';
	$isRegistered = true;
}
else
{

$mailConfirmation->Subject = 'Database Excel File';
$mailConfirmation->Body    = 'The table of registered SEs is attached with this email';
$mailConfirmation->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mailConfirmation->send()) {
    echo '  Message could not be sent.';
    echo '  Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}
	
mail($email, $subject, $message, "From:".$from);
print "A confirmation message has been sent to your email";

$sql = "INSERT INTO registrationtable ( applicantName, applicantEmail, registeredCourse, courseDate ) VALUES ( '{$db->real_escape_string($_POST['firstName'])}', 
'{$db->real_escape_string($email)}', '{$db->real_escape_string($_POST['course'])}', '{$db->real_escape_string($sqlDate)}'  )";

$insert = $db->query($sql);

//////////This part is for creating the excel file

$fileName = '/var/www/html/excelFile.csv';
//change permission of the file
chmod($fileName,0777);

//echo $fileName;
//echo 'this is after echoing the file name';

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

//echo $separator;

fputs ($fp,$separator);

// Repeat

//let you use the same query and leave the first row because we already have it at the top
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
} else {
    //echo 'Message has been sent';
}

}
$db->close();


?>

<html lang="en-US">
  <head>
    <!-- Import Google Icon fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Exo+2:600' rel='stylesheet' type='text/css'>
  	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,200,300,500' rel='stylesheet' type='text/css'>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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
			
			function populateCard()
			{
				var card = document.getElementByID();
				var cardHTML = card.innerHTML;
				var isRegistered = <?php $isRegistered ?>;
				if (isRegistered == true)
				{
					cardHTML = 'You have already registered';
				}
				console.log(cardHTML);
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

    <div id="logout" class="card-panel">
      <h1>Registration Completed</h1>
      <div>
        <p><?php echo "Hello $firstname"; ?></p>
        <br />
        <p>You have successfully registered in our course </p>
        <br />
        <p>A confirmation message has been sent to your email </p>
        <h2><a href="logout.php"> Logout</a><h2>
      </div>
    </br>
    </div>
  </body>
</html>







