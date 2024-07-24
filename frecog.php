<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Face Comparison</title>
  <script defer src="./face-api/face-api.js/dist/face-api.js"></script>
  <script defer src="./face-api/face-api.js/compareFaces.js"></script>
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
      pointer-events: none; /* Allows clicks to pass through to the video */
    }
  </style>
</head>
<body>
 
  <div class="container">
    <video id="video" width="720" height="560" autoplay muted></video>
    <canvas id="overlay"></canvas>
  </div>
  <div class="container">
    <input id="imageUpload" value="./obama1.jpg" type="file" accept="image/*" />
    <div id="result"></div>
  </div>
</body>
</html>
