<?php include("../model/conn.php"); ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="../assets/img/logo.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link href="https://fonts.googleapis.com/css2?family=Display+Playfair:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">
  <script defer src="../face-api/face-api.js/dist/face-api.js"></script>
  <script defer src="../face-api/face-api.js/compareFaces.js"></script>
  <style>
    .container {
      position: relative;
      width: 720px;
      height: 560px;
    }
    #video {
      width: 100%;
      height: 100%;
    }
    #overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
    }
  </style>
  <title>Batangas MIS</title>
</head>

<body>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>


  
  <nav class="site-nav mb-5">
    
    <div class="sticky-nav js-sticky-header">
      <div class="container position-relative">
        <div class="site-navigation text-center">
          <a href="index.php" class="logo menu-absolute m-0">BATANGAS MIS: EMPLOYEE FACIAL RECOGNITION LOGIN<span class="text-primary">.</span></a>

          

        </div>
      </div>
    </div>
  </nav>
  

  <div class="untree_co-hero overlay" style="background-image: url('./images/bg-1.jpg');">


    <div class="container">
      <div class="row align-items-center justify-content-center">

        <div class="col-12">

          <div class="row justify-content-center" style="margin-top: 100px;">

          <div class="container">
    <video id="video" width="720" height="560" autoplay muted></video>
    <canvas id="overlay"></canvas>
  </div>
  <div class="container">
    <?php displayEmployeeFaces($conn)  ?>
    
    <!-- Add more images as needed -->
    <div id="result"></div>
  </div>


          </div>

        </div>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero -->


 


    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/custom.js"></script>

  </body>

  </html>
