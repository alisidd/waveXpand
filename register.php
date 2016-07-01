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
        <a id="sign-in-nav" class="nav-option" onclick="openModal(this);">
          sign in
        </a>
      </ul>

      <div id="login-box" class="modal">

        <div class="modal-content">
          <span class="close" onclick="closeModal(this);"></span>

          <form name="myForm" method="post" action="training.php" onsubmit="return validateForm();">
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

    <form id="registration--profile" name="myForm" action="process.php" onsubmit="return validateForm();" method="post">

      <div class="input-field left">
        <input id="first-name" type="text" name="name">
        <label for="first-name">First Name</label>
      </div>

      <div class="input-field right">
        <input id="last-name" type="text" name="name">
        <label for="last-name">Last Name</label>
      </div>

      <div class="input-field">
        <input id="email--profile" type="text" name="email">
        <label for="email--profile">Cisco Email</label>
      </div>

      <div class="input-field">
        <input id="password--profile" type="password" name="password">
        <label for="password--profile">Password</label>
      </div>

      <div class="input-field">
        <input id="password--profile--verify" type="password" name="password">
        <label for="password--profile--verify">Verify Password</label>
      </div>

      <div class="input-field">
        <input id="country" type="text" name="email">
        <label for="country">Country</label>
      </div>

      <button id="register" class="action-button" type="submit" value="Submit">Register</button>
    </form>

  </body>
</html>
