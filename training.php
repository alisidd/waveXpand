<?php

  session_start();
  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false)
  {
    header("Location: register.php");
  }

  //$_SESSION['$email'] = $_POST['email'];

?>


<html>
  <head>
    <!-- Import Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>training - waveXpand</title>

    <!-- Scripts -->

    <script src="scripts/jquery-3.0.0.min.js"></script>
    <script src="scripts/script.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>

		<script type="text/javascript">
      $(document).ready(function() {
        Materialize.updateTextFields();
      });
    </script>

    <!-- Open login box -->
    <script type="text/javascript">
      function openModal(btn) {
          var modal = document.getElementById('login-box');
          modal.style.display = "block";
      }
    </script>

    <!-- Close login box -->
    <script type="text/javascript">
      function closeModal(btn) {
          var modal = document = document.getElementById("login-box");
          modal.style.display = "none";
      }
    </script>

    <script type="text/javascript">
      function validateForm() {
        var firstName = document.forms["myForm"]["firstName"].value;
        var lastName = document.forms["myForm"]["lastName"].value;
        var course = document.forms["myForm"]["course"].value;

        if (firstName == null || firstName == "" || lastName == null || lastName == "" || course == null || course == "") {
            alert("Please Fill All Required Field");
            return false;
        }

      }
    </script>

    <!-- Filter courses based on difficulty of course selected -->
    <script type="text/javascript">
      function filter(selection) {
        if (selection == "intro") {

          $("#intro").addClass("active");
          $("#all").removeClass("active");
          $("#intermediate").removeClass("active");
          $("#expert").removeClass("active");

          document.getElementById("intro-options").style.display = "flex";
          document.getElementById("intermediate-options").style.display = "none";
          document.getElementById("expert-options").style.display = "none";
        } else if (selection == "intermediate") {

          $("#intermediate").addClass("active");
          $("#intro").removeClass("active");
          $("#all").removeClass("active");
          $("#expert").removeClass("active");

          document.getElementById("intro-options").style.display = "none";
          document.getElementById("intermediate-options").style.display = "flex";
          document.getElementById("expert-options").style.display = "none";
        } else if (selection == "expert") {

          $("#expert").addClass("active");
          $("#intro").removeClass("active");
          $("#intermediate").removeClass("active");
          $("#all").removeClass("active");

          document.getElementById("intro-options").style.display = "none";
          document.getElementById("intermediate-options").style.display = "none";
          document.getElementById("expert-options").style.display = "flex";
        }
      }
    </script>

    <!-- Populate the courses after track has been selected -->
    <script type="text/javascript">
      function populateList(track) {
        $('html, body').animate({
            scrollTop: $("#step-2").offset().top
        }, 500);

        filter("intro");

        document.getElementsByClassName("courses")[0].style.display = "flex";
        var courses = document.getElementsByClassName("course-title");
        var i;
        for (i = 0; i < courses.length; i++) {
          courses[i].innerHTML = track;
        }
      }
    </script>

    <!-- Populate course details after course has been selected -->
    <script type="text/javascript">
      function displayCourse(course) {
        $('html, body').animate({
            scrollTop: $("#step-3").offset().top
        }, 500);

        document.getElementsByClassName("course-signup")[0].style.display = "block";

        document.getElementById("course-name").innerHTML = course.getElementsByTagName('p')[0].innerHTML + course.getElementsByTagName('p')[1].innerHTML;

				document.getElementById("courseLevel").innerHTML = "(" + course.parentNode.id.split('-')[0] + ")";
      }
    </script>

  </head>
  <body>

    <!-- Navigation bar at the top -->
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

    <form class="content--training" id="registration" name="myForm" action="process.php" onsubmit="return validateForm();" method="post">

      <p class="title">sign up for a course</p>

      <div class="left-pane--training">

        <!-- Select tracks -->
        <div class="track-step">

          <div class="track-step--box">
            <span class="helper"></span>
            <img class="track-step--number" src="images/1.png" alt="" />
            <p class="track-step--desc"> pick a track</p>
          </div>

          <div class="track-step--buttons">

            <div id ="slctTrack"></div>

          </div>

        </div> <!-- End of track step -->
      </div>

      <div class="right-pane--training">

        <!-- Select courses -->
        <div class="course-step">

          <div id="step-2" class="course-step--box">
            <span class="helper"></span>
            <img class="course-step--number" src="images/2.png" alt="" />
            <p class="course-step--desc"> pick a course</p>
          </div>

          <div id="courses" class="courses">
            <div class="levels">
              <li id="intro" onclick="filter(this.id);" class="level-1 active">intro</li>
              <li id="intermediate" onclick="filter(this.id);">intermediate</li>
              <li id="expert" onclick="filter(this.id);" class="level-last">expert</li>
            </div>

            <div id="loading-1">
              <div class="ball"></div>
              <div class="ball1"></div>
            </div>

            <ul id="slctCourse" class="course-options">
              <div id="intro-options"></div>
              <div id="intermediate-options"></div>
              <div id="expert-options"></div>
            </ul>
          </div>
        </div> <!-- End of course Step -->

        <!-- Register for courses -->
        <div class="sign-up-step">
          <div id="step-3" class="sign-up-step--box">
            <span class="helper"></span>
            <img class="sign-up-step--number" src="images/3.png" alt="" />

            <p class="sign-up-step--desc"> sign up! </p>

          </div>

          <div class="course-signup">
              <div id="course-name">
                  Course Name
              </div>
              <div id="courseLevel"></div>

              <div id="loading-2">
                <div class="ball"></div>
                <div class="ball1"></div>
              </div>

              <div id="course-description">
                <ul class="details-box">
                  <p> trainer </p>
                  <div id="courseTrainer"></div>
                </ul>
                <ul class="details-box">
                  <p> date </p>
                  <div id="courseDate"></div>
                </ul>
                <ul class="details-box">
                  <p> duration </p>
                  <div id="courseDuration"></div>
                </ul>
              </div>

              <input id="register--course" class="action-button" type="submit" value="Submit">
          </div>
        </div> <!-- End of sign up step -->
      </div>
    </form>
  </body>
</html>
