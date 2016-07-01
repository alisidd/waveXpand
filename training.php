<?php
	$password = "pass";

	if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
	{
    echo "<p> WHAT </p>";
    echo "<script> changeLogin(); </script>";
		header("Location: training.php");
	}

	if (isset($_POST['password']))
	{
		if ($_POST['password'] == $password)
		{
			$_SESSION['logged_in'] = true;
			header("Location: training.php");
		} else {
			$message = "Incorrect Password";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	if (!empty($_POST))
	{
    $_SESSION['$loginEmail'] = $_POST['email'];
	}

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
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script type="text/javascript">
      function changeLogin(course) {
        document.getElementById("sign-in-nav").innerHTML = "logged in"
      }
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
      function filter(selection) {
        if (selection == "all") {
          $("#all").addClass("active");
          $("#intro").removeClass("active");
          $("#intermediate").removeClass("active");
          $("#expert").removeClass("active");

          document.getElementsByClassName("intro")[0].style.display = "flex";
          document.getElementsByClassName("intermediate")[0].style.display = "flex";
          document.getElementsByClassName("expert")[0].style.display = "flex";
        } else if (selection == "intro") {

          $("#intro").addClass("active");
          $("#all").removeClass("active");
          $("#intermediate").removeClass("active");
          $("#expert").removeClass("active");

          document.getElementsByClassName("intro")[0].style.display = "flex";
          document.getElementsByClassName("intermediate")[0].style.display = "none";
          document.getElementsByClassName("expert")[0].style.display = "none";
        } else if (selection == "intermediate") {

          $("#intermediate").addClass("active");
          $("#intro").removeClass("active");
          $("#all").removeClass("active");
          $("#expert").removeClass("active");

          document.getElementsByClassName("intro")[0].style.display = "none";
          document.getElementsByClassName("intermediate")[0].style.display = "flex";
          document.getElementsByClassName("expert")[0].style.display = "none";
        } else if (selection == "expert") {

          $("#expert").addClass("active");
          $("#intro").removeClass("active");
          $("#intermediate").removeClass("active");
          $("#all").removeClass("active");

          document.getElementsByClassName("intro")[0].style.display = "none";
          document.getElementsByClassName("intermediate")[0].style.display = "none";
          document.getElementsByClassName("expert")[0].style.display = "flex";
        }
      }
    </script>

    <script type="text/javascript">
      function displayCourse(course) {

        $('html, body').animate({
            scrollTop: $("#step-3").offset().top
        }, 500);

        document.getElementsByClassName("course-signup")[0].style.display = "block";

        document.getElementById("course-name").innerHTML = course.getElementsByTagName('p')[1].innerHTML + course.getElementsByTagName('p')[2].innerHTML;

				document.getElementById("course-level").innerHTML = "(" + course.parentNode.classList[0] + ")";
      }
    </script>

    <script type="text/javascript">
      function populateList(track) {

        $('html, body').animate({
            scrollTop: $("#step-2").offset().top
        }, 500);

        document.getElementsByClassName("courses")[0].style.display = "block";
        var courses = document.getElementsByClassName("course-title");
        var i;
        for (i = 0; i < courses.length; i++) {
          courses[i].innerHTML = track;
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
            <button class="action-button" type="submit" value="Submit" id="sign-in">Sign in</button>
          </form>

        </div>

      </div>

    </header>

    <div class="content--training">
      <form id="registration" name="myForm" action="process.php" onsubmit="return validateForm();" method="post">

        <p class="title">sign up for a course</p>

        <div class="left-pane--training">
          <div class="options">
            <div class="track-options">

              <div class="track-option--desc">
                <img class="number" src="images/1.png" alt="" />
                <p class="number-desc"> pick a track</p>
              </div>

              <button class="track-option" onclick="populateList(this.innerHTML);" type="button">
                <p> Collab </p>
              </button>
              <button class="track-option" onclick="populateList(this.innerHTML);" type="button">
                <p> DC </p>
              </button>
              <button class="track-option" onclick="populateList(this.innerHTML);" type="button">
                <p> R&S </p>
              </button>
              <button class="track-option" onclick="populateList(this.innerHTML);" type="button">
                <p> Security </p>
              </button>
              <button class="track-option" onclick="populateList(this.innerHTML);" type="button">
                <p> IoT </p>
              </button>
              <button class="track-option" onclick="populateList(this.innerHTML);" type="button">
                <p> Mobility </p>
              </button>
              <button class="track-option" onclick="populateList(this.innerHTML);" type="button">
                <p> SDN </p>
              </button>
              <button class="track-option track-option-last" onclick="populateList(this.innerHTML);" type="button">
                <p> Prof. Skills </p>
              </button>
            </div>
          </div>
        </div>

        <div class="right-pane--training">

          <div id="step-2" class="course-option--desc">
            <img class="number--course" src="images/2.png" alt="" />
            <p class="number-desc--course"> pick a course</p>
          </div>

          <div class="courses">
            <ul class="levels">
              <li id="all" onclick="filter(this.id);" class="level-1 active">all</li>
              <li id="intro" onclick="filter(this.id);">intro</li>
              <li id="intermediate" onclick="filter(this.id);">intermediate</li>
              <li id="expert" onclick="filter(this.id);" class="level-last">expert</li>
            </ul>

            <ul class="course-options">
              <div class="intro">
                <li class="course" onclick="displayCourse(this)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 1 </p>
                </li>
                <li class="course" onclick="displayCourse(this)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 2 </p>
                </li>
                <li class="course" onclick="displayCourse(this)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 3 </p>
                </li>
              </div>
              <div class="intermediate">
                <li class="course" onclick="displayCourse(this)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 1 </p>
                </li>
              </div>
              <div class="expert">
                <li class="course" onclick="displayCourse(this)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 1 </p>
                </li>
                <li class="course" onclick="displayCourse(this)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 2 </p>
                </li>
              </div>
            </ul>
          </div> <!-- End of step 2 -->

          <div id="step-3" class="sign-up-option--desc">
            <img class="number--course" src="images/3.png" alt="" />
            <p class="number-desc--course"> sign up!</p>
          </div>

          <div class="course-signup">
              <div id="course-name">
                  SDN Part 2
              </div>

              <div id="course-level">
                  Intermediate
              </div>

              <div id="course-description">
                  <li> Collaboration Preferred Architecture & Solution Components </li>
                  <li> Collaboration market and solutions (on-premise, cloud, mid-market, hosted) </li>
                  <li> CUCM Call Control Basics for Voice/Video/IM (includes IM&P Node) </li>
                  <li> Enterprise call control design.  Single site, multiple sites, cluster over WAN </li>
                  <li> CUCM configuration foundation </li>
                  <li> UC Applications foundational knowledge (Unity Connection, Attendant Consoles, Paging, Billing/Fax, etc.) </li>
                  <li> Collaboration Edge Architecture (Expressway + CUBE) </li>
                  <li> Collaboration Packaged solutions  BE6K S/M/H, BE7K M/H </li>
                  <li> Gateway Technologies (CME and SRST), PVDMs, Unity Express, BE6KS </li>
              </div>

              <input class="action-button" type="button" value="Submit"></button>
          </div>

        </div> <!-- End of Right Pane -->

      </form>
    </div>
  </body>
</html>
