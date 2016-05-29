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

      function populate(course, date)
      {
        var input = document.getElementById(course);
        var courseName = input.innerHTML;
        console.log(courseName);
        courseName = courseName.replace(/(<br ?\/?>)*/g,"");
        console.log(courseName);
        document.getElementById('courseNameShown').innerHTML = courseName;
		document.getElementById('courseID').value = courseName;
      	var course = document.getElementById(course);
      	var date = document.getElementById(date);
        console.log(courseName);

        date.innerHTML = "";

      	if(courseName == "Security")
      		{
      			var optionArray = ["sept,1,2016|sept,1,2016","sept,6,2016|sept,6,2016","sept,9,2016|sept,9,2016"];
      		}

      	else if(courseName == "Routing &amp;  Switching")
      		{
      			var optionArray = ["oct,1,2016|oct,1,2016","oct,6,2016|oct,6,2016","oct,9,2016|oct,9,2016"];
      		}

      	else if(courseName == "Application  Centric  Infrastructure")
      		{
      			var optionArray = ["nov,1,2016|nov,1,2016","nov,6,2016|nov,6,2016","nov,9,2016|nov,9,2016"];
      		}

      	for(var option in optionArray)
      		{
      			var pair = optionArray[option].split("|");
      			var newOption = document.createElement("option");
      			newOption.value = pair[0];
      			newOption.innerHTML = pair[1];
      			date.options.add(newOption);
      		}
      		$('select').material_select();
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

    <div class="course-options">
  		<span onclick="populate(this.id, 'date')" id="button1">Routing & <br> Switching</span>
  		<span onclick="populate(this.id, 'date')" id="button2">Security</span>
  		<span onclick="populate(this.id, 'date')" id="button3">Application <br> Centric <br> Infrastructure</span>
  	</div>

    <div id="card">
      <div class="card-panel">
        <h1 id="courseNameShown"></h1>

    		<form name="myForm" class='col s12' action="process.php" onsubmit="return validateForm();" method="post">
            <div class="input-field col s12">
              <select>
                <option value="" disabled selected>Choose your option</option>
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
