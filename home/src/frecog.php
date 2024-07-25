<?php include("../model/conn.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Face Comparison</title>
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
</head>
<body>
<div class="container">
    <video id="video" width="720" height="560" autoplay muted></video>
    <canvas id="overlay"></canvas>
  </div>
  <div class="container">
    <?php displayEmployeeFaces($conn)  ?>
    
    <!-- Add more images as needed -->
    <div id="result"></div>
  </div>
</body>
</html>
