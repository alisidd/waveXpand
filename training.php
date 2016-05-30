<html>

  <head>
    <!-- Import Google Icon fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
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

    <script async type="text/javascript">
      $(document).on('change','#course-select',function() {
         switch ($(this).val()) {
            case "1":
              var optionArray = ["Sept 1, 2016|Sept 1, 2016","Sept 6, 2016|Sept 6, 2016","Sept 9, 2016|Sept 9, 2016"];
              break;
            case "2":
              var optionArray = ["Oct 1, 2016|Oct 1, 2016","Oct 6, 2016|Oct 6, 2016","Oct 9, 2016|Oct 9, 2016"];
              break;
            case "3":
              var optionArray = ["Nov 1, 2016|Nov 1, 2016","Nov 6, 2016|Nov 6, 2016","Nov 9, 2016|Nov 9, 2016"];
              break;
        }

        document.getElementById("date").innerHTML = "";

        for(var option in optionArray)
      		{
      			var pair = optionArray[option].split("|");
      			var newOption = document.createElement("option");
      			newOption.value = pair[0];
      			newOption.innerHTML = pair[1];
      			date.options.add(newOption);
      		}
      		$('select').material_select();
      });
    </script>

    <script async type="text/javascript">

      function populateCard(course, date)
      {
        var input = document.getElementById(course);
        var courseName = input.innerHTML;
        courseName = courseName.replace(/(<br ?\/?>)*/g,"");
        document.getElementById('courseNameShown').innerHTML = courseName;
		    document.getElementById('courseID').value = courseName;
      }
    </script>

    <script async type="text/javascript">
  		$(document).ready(function(){
  			$('.parallax').parallax();
  		});
  	</script>

    <script>
  		$(document).ready(function() {
  	    $('select').material_select();
  	  });
  	</script>

  </head>

  <body>

    <div class="parallax-container">

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

          </nav>
      </header>

      <div class="parallax" ><img src="images/training-small.png"></div>

    </div>

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

    <div class="track-options">
  		<span onclick="populateCard(this.id, 'date')" id="button1">Routing & <br> Switching</span>
  		<span onclick="populateCard(this.id, 'date')" id="button2">Security</span>
  		<span onclick="populateCard(this.id, 'date')" id="button3">Application <br> Centric <br> Infrastructure</span>
  	</div>

    <div id="card">
      <div class="card-panel">
        <h1 id="courseNameShown"></h1>

    		<form name="myForm" class='col s12' action="process.php" onsubmit="return validateForm();" method="post">
            <p class="select-course"> Choose a Course </p>
            <div class="input-field">
              <select id="course-select">
                <option value="" disabled selected>Choose a course</option>
                <option value="1">Course 1</option>
                <option value="2">Course 2</option>
                <option value="3">Course 3</option>
              </select>
            </div>

            <span >Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
      			</span>

            <p class="date"> Enter your name: </p>
  	        <div class="input-field">
  	          <input id="full_name" type="text" class="validate" name="firstName">
  	          <label for="full_name">Name</label>
  	        </div>

      			<p class="date"> Select date to check availability: </p>
    			  <div class="input-field">
        			<select id="date" name="date"></select>
        			<input name="course" type="hidden" id="courseID">
    		    </div>

      			<p class="status"> Status - </p>
      			<p class="spots"> 14 spots available </p>
    			<br/><input type="submit" value="Submit" >
    		</form>
      </div>
    </div>
  </body>

</html>
