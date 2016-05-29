<html>
<head>
  <!-- Import Google Icon fonts -->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
    $(document).ready(function(){
      $('.parallax').parallax();
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

      <div class="parallax" ><img src="images/about.png"></div>

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

    <div class="about-body">
      <p>Lorem ipsum lobortis eu nam facilisis, viverra cubilia fames dolor bibendum, sodales senectus sit cursus non faucibus eget libero magna gravida inceptos euismod senectus phasellus accumsan sollicitudin quis in consectetur commodo auctor aenean accumsan duis, quam orci tellus porta dui consectetur enim felis volutpat, gravida erat habitant luctus purus blandit ligula.
      <p>Elit praesent nibh bibendum hac dui lobortis feugiat luctus lacinia ornare at viverra nisi est, potenti inceptos vivamus phasellus etiam faucibus per dictum potenti pellentesque morbi vehicula libero elit metus nibh primis nostra porta ultricies odio, quisque conubia a metus elit cubilia torquent id, etiam libero class venenatis fermentum aliquam sollicitudin.</p>
      <p>Placerat ut et rhoncus aenean elementum ad in fermentum, eget vel sollicitudin bibendum nulla laoreet elit dui eu, scelerisque ut est nisi orci conubia hendrerit arcu sem in leo justo sed sollicitudin lobortis eleifend urna consequat pharetra, aenean pretium ullamcorper vitae donec interdum curabitur quis aliquam integer nam facilisis hac fringilla.</p>
      <p>Potenti diam donec mauris lectus ac morbi, ornare purus donec taciti curabitur placerat interdum, mi sit luctus sed suspendisse iaculis dapibus phasellus ligula et vitae bibendum ligula, feugiat iaculis a diam posuere hac neque, cras senectus ipsum mauris pellentesque senectus tincidunt, porta tortor ornare donec tortor accumsan auctor turpis id suspendisse.</p>
      <p>Donec consectetur sagittis lectus diam justo taciti non fusce, eget laoreet posuere dui quis etiam feugiat, pretium libero vestibulum tortor imperdiet arcu pulvinar commodo egestas a ut ligula nullam metus himenaeos mollis a cubilia justo, donec orci lorem auctor venenatis malesuada commodo convallis quis lobortis nunc convallis hac per nulla vulputate.</p>
    </div>
  </body>
</html>
