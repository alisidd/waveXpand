<?php

//** The session_start() function holds all the global variables' values
session_start();

//** Check if the user is logged-in
  if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
  {
    header("Location: training.php");
  }




$login_message ="";

  if (isset($_POST['email']))
  {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = 'DBMaster';
    $pass = '12341234';
    $db = 'wavexpandDB';

    $db = new mysqli('wavexpanddb.cxxqjl7is3yc.us-west-2.rds.amazonaws.com', $user, $pass, $db) or die("Unable to connect");

    $query = mysqli_query($db, "SELECT * From accountstable WHERE email='$email'");
    if(mysqli_num_rows($query) > 0)
    {

      $query2 = mysqli_query($db, "SELECT * From accountstable WHERE email='$email' AND password='$password'");

      if(mysqli_num_rows($query2) > 0)
      {
        $_SESSION['logged_in'] = true;
        header("Location: training.php");
        $_SESSION['$email'] = $_POST['email'];
      }
      else
      {
        $login_message = "The password or the username is incorrect!! please try again";
      }

    }
    else
    {
      $login_message = "The email you entered does not exist in the registered accounts, please register first";
    }
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

    <title>register - waveXpand</title>

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

    <script type="text/javascript">
    //** Validate the registration form
      function validateForm() {

        var name = document.forms["myForm"]["name"].value;
        var email = document.forms["myForm"]["email"].value;
        var password = document.forms["myForm"]["password"].value;
        var mobileNum = document.forms["myForm"]["number"].value;

        if (name == null || name == "" || email == null || email == "" || password == null || password == "" || mobileNum == null || mobileNum == "")
          {
            alert("Please Fill All Required Field");
              return false;
          }

      //** Check if the mobile number contains 10 digits
      var mobileNumRegex = /^\d{10}$/;
        if (mobileNum.match(mobileNumRegex))
          {
          // $phone is valid
        }
      else
      {
        alert("phone invalid, you should enter ten digits !");
        return false;
      }

          //** Check the validity of the email
          var x = document.forms["myForm"]["email"].value;
          var atpos = x.indexOf("@");
          var dotpos = x.lastIndexOf(".");
          if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
              alert("Not a valid e-mail address");
              return false;
          }

        //** Check if the email is of a cisco employee
        var email = document.forms["myForm"]["email"].value;
        if ((email.indexOf('@cisco') == -1 ))
        {
          alert("You should use your Cisco email address!");
          return false;
        }

      }
      //** Validate the sign-in form
      function validateForm2() {
      var x = document.forms["myForm2"]["email"].value;
          var atpos = x.indexOf("@");
          var dotpos = x.lastIndexOf(".");
          if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
              alert("Not a valid e-mail address");
              return false;
          }

        var email = document.forms["myForm2"]["email"].value;

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

      <ul class="nav-options">
        <a class="nav-option" href="training.php">
          training
        </a>
        <a id="sign-in-nav" class="nav-option" onclick="openModal(this);">
          sign in
        </a>
      </ul>

      <div id="login-box" class="modal">

        <div class="modal-content">
          <!-- Open the sign-in window after clicking on sign in button-->
          <span class="close" onclick="closeModal(this);"></span>

          <form name="myForm2" method="post" action="register.php" onsubmit="return validateForm2();">
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

      <p class="input-field" id="login_message"><font size="5"> <?php print ($login_message); ?> </font></p>

      <p class="title register--title">registration</p>

      <div class="input-field">
        <input id="first-name" type="text" name="name">
        <label for="first-name">Full Name*</label>
      </div>

      <div class="input-field">
        <input id="password" type="password" name="password">
        <label for="password">Password*</label>
      </div>

      <div class="input-field">
        <input id="email--profile" type="text" name="email" autocapitalize="none">
        <label for="email--profile">Cisco Email*</label>
      </div>

      <div class="input-field">
        <input id="number" type="text" name="number">
        <label for="number">Mobile Number</label>
      </div>

      <button id="register" class="action-button" type="submit" value="Submit">Register</button>
    </form>

  </body>
</html>
