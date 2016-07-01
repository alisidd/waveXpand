<html>
  <head>
    <!-- Import Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>waveXpand</title>

    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

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


    <div class="content--index">

      <div class="left-pane">

        <p class="intro-text"> expand your knowledge with our courses </p>
        <a class="intro-sub-text" href="training.php">get started</a>

      </div> <!-- End of left pane -->

      <div class="right-pane">

        <p class="intro-video">a video about us</p>
        <div class="video">
          <iframe width="560" height="315" src="https://www.youtube.com/embed/4KmewIC-eV4" frameborder="0" allowfullscreen></iframe>
        </div>

      </div> <!-- End of right pane -->
    </div><!-- End of Content -->
  </body>
</html>
