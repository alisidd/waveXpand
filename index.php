<!DOCTYPE html>
<html lang="en-US">

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
    <script type="text/javascript" src="js/materialize.min.js"></script>

    <script async type="text/javascript">
  		$(document).ready(function(){
  			$('.parallax').parallax();
  		});
  	</script>

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

    <div class="left-pane">
      <p class="intro-text"> expand your knowledge with our courses </p>
      <a class="intro-sub-text" href="training.php">learn more</a>
    </div>

    <div class="right-pane">
      <p class="intro-video">a video about us</p>
      <div class="video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/4KmewIC-eV4" frameborder="0" allowfullscreen></iframe>
      </div>
    </div>

</body>

</html>
