<html>

  <head>
    <!-- Import Google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Coming+Soon' rel='stylesheet' type='text/css'>
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Training - waveXpand</title>

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
      $(document).ready(function(){
        $('a[href^="#"]').on('click',function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
              'scrollTop': $target.offset().top
            }, 900, 'swing');
        });
      });
    </script>

    <script async type="text/javascript">
      function populateList(course)
      {
        document.getElementById("dates").innerHTML = "";
        var input = document.getElementById(course);
        if (course == "button1") {
          document.getElementById("second-step").style.display = "inline";
          document.getElementById("security-options").style.display = "flex";
          document.getElementById("routing-options").style.display = "none";
          document.getElementById("ise-options").style.display = "none";

          document.getElementById("third-step").style.display = "inline";

          var optionArray = ['Sep 1, 2016','Sep 6, 2016','Sep 9, 2016'];


        } else if (course == "button2") {
          document.getElementById("second-step").style.display = "inline";
          document.getElementById("routing-options").style.display = "flex";
          document.getElementById("security-options").style.display = "none";
          document.getElementById("ise-options").style.display = "none";

          document.getElementById("third-step").style.display = "inline";

          var optionArray = ["Oct 1, 2016","Oct 6, 2016","Oct 9, 2016"];


        } else if (course == "button3") {
          document.getElementById("second-step").style.display = "inline";
          document.getElementById("ise-options").style.display = "flex";
          document.getElementById("security-options").style.display = "none";
          document.getElementById("routing-options").style.display = "none";

          document.getElementById("third-step").style.display = "inline";

          var optionArray = ["Nov 1, 2016","Nov 6, 2016","Nov 9, 2016"];


        }

        var arrayLength = optionArray.length;

        for (var i = 0; i < arrayLength; i++) {
      			var newOption = document.createElement("button");
            var t = document.createTextNode(optionArray[i]);
            newOption.appendChild(t);
            newOption.className += "date-option";
            document.getElementById("dates").appendChild(newOption);
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

    <div id="registration">

      <p class="title">sign up for a course in 3 steps!</p>

      <div id="first-step">

        <p class="sub-title">
          1. pick a track
        </p>

        <div class="options">
          <button id="button1" class="option track-1" onclick="populateList(this.id);document.getElementById('second-step').scrollIntoView();" type="button">
            <p> Cyber Security </p>
          </button>
          <button id="button2" class="option track-2" onclick="populateList(this.id);document.getElementById('second-step').scrollIntoView();" type="button">
            <p> Routing </p>
          </button>
          <button id="button3" class="option track-3" onclick="populateList(this.id);document.getElementById('second-step').scrollIntoView();" type="button">
            <p> ISE </p>
          </button>
        </div>

      </div> <!-- END OF FIRST STEP -->

      <div id="second-step">
        <p class="sub-title">
          2. pick a course
        </p>

        <div id="security-options" class="course-options">
          <button class="security option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> Security 1 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
          <button class="security option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> Security 2 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
          <button class="security option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> Security 3 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
        </div>

        <div id="routing-options" class="course-options">
          <button class="routing option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> Routing 1 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
          <button class="routing option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> Routing 2 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
          <button class="routing option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> Routing 3 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
        </div>

        <div id="ise-options" class="course-options">
          <button class="ise option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> ISE 1 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
          <button class="ise option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> ISE 2 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
          <button class="ise option" onclick="document.getElementById('third-step').scrollIntoView();" type="button">
            <p> ISE 3 </p>
          </button>
          <p>
            Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
          </p>
        </div>
      </div> <!-- END OF SECOND STEP -->

      <div id="third-step">

        <p class="sub-title">
          3. pick a date
        </p>

        <div id="dates" class="date-options">
        </div>

      </div> <!-- END OF THIRD STEP -->
    </div> <!-- END OF REGISTRATION -->

  </body>

</html>
