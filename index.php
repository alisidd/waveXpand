<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Import Google Icon fonts -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Scripts -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

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
        </nav>

    </header>

    <div>
  		<img id="monitor" src="images/monitor.png" alt="background monitor" >
      <img id="phone" src="images/phone.png" alt="background phone" >
  		<iframe src="https://www.youtube.com/embed/dilnw_dP3xk" frameborder="0" allowfullscreen></iframe>
  	</div>

    <div aria-busy="true" aria-label="Loading" role="progressbar" class="container-edit">
        <div class="swing">
            <div class="swing-l"></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div class="swing-r"></div>
        </div>
        <div class="shadow">
            <div class="shadow-l"></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div class="shadow-r"></div>
        </div>
    </div>
</body>

</html>
