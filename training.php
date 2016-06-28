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
        document.getElementsByClassName("course-signup").style.display = "auto";
      }
    </script>

    <script type="text/javascript">
      function populateList(track) {
        document.getElementsByClassName("course").style.display = "auto";
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
        <a class="nav-option" href="login.php">
          sign in
        </a>
      </ul>
    </header>


        <!--
          <div class="options">
            <div class="track-options">
              <button class="track-option" onmouseover="populateList(this.innerHTML);" type="button">
                <p> Collab </p>
              </button>
              <button class="track-option" onmouseover="populateList(this.innerHTML);" type="button">
                <p> DC </p>
              </button>
              <button class="track-option" onmouseover="populateList(this.innerHTML);" type="button">
                <p> R&S </p>
              </button>
              <button class="track-option" onmouseover="populateList(this.innerHTML);" type="button">
                <p> Security </p>
              </button>
              <button class="track-option" onmouseover="populateList(this.innerHTML);" type="button">
                <p> IoT </p>
              </button>
              <button class="track-option" onmouseover="populateList(this.innerHTML);" type="button">
                <p> Mobility </p>
              </button>
              <button class="track-option" onmouseover="populateList(this.innerHTML);" type="button">
                <p> SDN </p>
              </button>
              <button class="track-option" onmouseover="populateList(this.innerHTML);" type="button">
                <p> Prof. Skills </p>
              </button>
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
                  <li class="course-option" onclick="displayCourse(this.innerHTML)">
                    <p class="course-title"> SDN </p>
                    <p class="course-part"> Part 1 </p>
                  </li>
                  <li class="course-option" onclick="displayCourse(this.innerHTML)">
                    <p class="course-title"> SDN </p>
                    <p class="course-part"> Part 2 </p>
                  </li>
                  <li class="course-option" onclick="displayCourse(this.innerHTML)">
                    <p class="course-title"> SDN </p>
                    <p class="course-part"> Part 3 </p>
                  </li>
                </div>
                <div class="intermediate">
                  <li class="course-option" onclick="displayCourse(this.innerHTML)">
                    <p class="course-title"> SDN </p>
                    <p class="course-part"> Part 1 </p>
                  </li>
                </div>
                <div class="expert">
                  <li class="course-option" onclick="displayCourse(this.innerHTML)">
                    <p class="course-title"> SDN </p>
                    <p class="course-part"> Part 1 </p>
                  </li>
                  <li class="course-option" onclick="displayCourse(this.innerHTML)">
                    <p class="course-title"> SDN </p>
                    <p class="course-part"> Part 2 </p>
                  </li>
                </div>
              </ul>
            </div>
          </div>

          <div class="course-details">
            <p id="course-name">SDN PART 1</p>
            <p id="course-description">
                Basic Network Concepts and Network Components <br>
                Operate a medium sized LAN with multiple switches, supporting VLANs, and trunking <br>
                Explain how bridging and switching operates <br>
                Explain the purpose and operations of the Spanning-Tree Protocol <br>
                Define IP Protocol IPv4  address and subnetting b <br>
                Define characteristics, functions, and component of a WAN <br>
                Describe SNMP, syslog, and NetFlow, and manage Cisco device configurations, Cisco IOS images and licenses <br>
                Introduction to Prime infrastructure  b <br>
            </p>
          </div>
      </form> <!-- END OF REGISTRATION -->
    <div class="content--training">
      <form id="registration" name="myForm" action="process.php" onsubmit="return validateForm();" method="post">

        <p class="title">sign up for a course</p>

        <div class="left-pane--training">
          <div class="options">
            <div class="track-options">
              <button class="track-option--desc" onclick="populateList(this.innerHTML);" type="button">
                <img class="number" src="images/1.png" alt="" />
                <p class="number-desc"> pick a track</p>
              </button>
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

          <button class="course-option--desc" onclick="populateList(this.innerHTML);" type="button">
            <img class="number--course" src="images/2.png" alt="" />
            <p class="number-desc--course"> pick a course</p>
          </button>

          <div class="courses">
            <ul class="levels">
              <li id="all" onclick="filter(this.id);" class="level-1 active">all</li>
              <li id="intro" onclick="filter(this.id);">intro</li>
              <li id="intermediate" onclick="filter(this.id);">intermediate</li>
              <li id="expert" onclick="filter(this.id);" class="level-last">expert</li>
            </ul>

            <ul class="course-options">
              <div class="intro">
                <li class="course" onclick="displayCourse(this.innerHTML)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 1 </p>
                </li>
                <li class="course" onclick="displayCourse(this.innerHTML)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 2 </p>
                </li>
                <li class="course" onclick="displayCourse(this.innerHTML)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 3 </p>
                </li>
              </div>
              <div class="intermediate">
                <li class="course" onclick="displayCourse(this.innerHTML)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 1 </p>
                </li>
              </div>
              <div class="expert">
                <li class="course" onclick="displayCourse(this.innerHTML)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 1 </p>
                </li>
                <li class="course" onclick="displayCourse(this.innerHTML)">
                  <p class="course-title"> SDN </p>
                  <p class="course-part"> Part 2 </p>
                </li>
              </div>
            </ul>
          </div> <!-- End of step 2 -->

          <button class="course-option--desc" onclick="populateList(this.innerHTML);" type="button">
            <img class="number--course" src="images/3.png" alt="" />
            <p class="number-desc--course"> sign up!</p>
          </button>

          <div class="course-signup">
              <div id="course-name">
                  SDN Part 2
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
          </div>

        </div> <!-- End of Right Pane -->

      </form>
    </div>
  </body>
</html>
