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
      function validateForm() {

        alert("validating the form");

        var firstName = document.forms["myForm"]["firstName"].value;
        var lastName = document.forms["myForm"]["lastName"].value;
        var course = document.forms["myForm"]["course"].value;

        if (firstName == null || firstName == "" || lastName == null || lastName == "" || course == null || course == "")
        {
          alert("Please Fill All Required Field");
            return false;
        }

      }
    </script>

    <script type="text/javascript">
      function filter(selection) {
        if (selection == "all") {
          $("#all").addClass("active");
          $("#intro").removeClass("active");
          $("#intermediate").removeClass("active");
          $("#expert").removeClass("active");

          document.getElementById("intro-options").style.display = "flex";
          document.getElementById("intermediate-options").style.display = "flex";
          document.getElementById("expert-options").style.display = "flex";
        } else if (selection == "intro") {

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

    <script type="text/javascript">
      function populateList(track) {

        $('html, body').animate({
            scrollTop: $("#step-2").offset().top
        }, 500);

        document.getElementsByClassName("courses")[0].style.display = "block";
      }
    </script>

    <script type="text/javascript">
      function displayCourse(course) {
        $('html, body').animate({
            scrollTop: $("#step-3").offset().top
        }, 500);

        document.getElementsByClassName("course-signup")[0].style.display = "block";

        console.log(course.getElementsByTagName('p')[0].innerHTML);

        document.getElementById("course-name").innerHTML = course.getElementsByTagName('p')[0].innerHTML + course.getElementsByTagName('p')[1].innerHTML;

				document.getElementById("course-level").innerHTML = "(" + course.parentNode.id.split('-')[0] + ")";
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

    <form class="content--training" id="registration" name="myForm" action="process.php" onsubmit="return validateForm();" method="post">
      <p class="title">sign up for a course</p>

      <div class="left-pane--training">
        <div class="track-step">

          <div class="track-step--box">
            <span class="helper"></span>
            <img class="track-step--number" src="images/1.png" alt="" />
            <p class="track-step--desc"> pick a track</p>
          </div>

          <div class="track-step--buttons">

            <div id ="slctTrack"></div>

          </div>

        </div>
      </div>

      <div class="right-pane--training">

        <div class="course-step">

          <div id="step-2" class="course-step--box">
            <span class="helper"></span>
            <img class="course-step--number" src="images/2.png" alt="" />
            <p class="course-step--desc"> pick a course</p>
          </div>

          <div class="courses">
            <ul class="levels">
              <li id="all" onclick="filter(this.id);" class="level-1 active">all</li>
              <li id="intro" onclick="filter(this.id);">intro</li>
              <li id="intermediate" onclick="filter(this.id);">intermediate</li>
              <li id="expert" onclick="filter(this.id);" class="level-last">expert</li>
            </ul>

            <div id="loading">
              <div class="ball"></div>
              <div class="ball1"></div>
            </div>

            <ul id="slctCourse" class="course-options">
              <div id="intro-options"></div>
              <div id="intermediate-options"></div>
              <div id="expert-options"></div>
            </ul>
          </div>

          <div class="sign-up-step">
            <div id="step-3" class="sign-up-step--box">
              <span class="helper"></span>
              <img class="sign-up-step--number" src="images/3.png" alt="" />
              <p class="sign-up-step--desc"> sign up!</p>
            </div>

            <div class="course-signup">
                <div id="course-name"></div>

                <div id="course-level"></div>

                <div id="course-description">

                  <div id ="courseDate"></div>
                    <!--<li> Collaboration Preferred Architecture & Solution Components </li>
                    <li> Collaboration market and solutions (on-premise, cloud, mid-market, hosted) </li>
                    <li> CUCM Call Control Basics for Voice/Video/IM (includes IM&P Node) </li>
                    <li> Enterprise call control design.  Single site, multiple sites, cluster over WAN </li>
                    <li> CUCM configuration foundation </li>
                    <li> UC Applications foundational knowledge (Unity Connection, Attendant Consoles, Paging, Billing/Fax, etc.) </li>
                    <li> Collaboration Edge Architecture (Expressway + CUBE) </li>
                    <li> Collaboration Packaged solutions  BE6K S/M/H, BE7K M/H </li>
                    <li> Gateway Technologies (CME and SRST), PVDMs, Unity Express, BE6KS </li>-->
                </div>

                <input id="register--course" class="action-button" type="submit" value="Submit"></button>
            </div>

          </div>
        </div>
      </div>
    </form>
  </body>
</html>
