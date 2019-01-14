<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Thisura Sagara">
  <title>Scan QR | Westminster Fashion Week Festival 2019</title>
  
  <!-- Favicon Package -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/icons/favicon_package/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/favicon_package/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/icons/favicon_package/favicon-16x16.png">
  <link rel="manifest" href="./assets/icons/favicon_package/site.webmanifest">
  <link rel="mask-icon" href="./assets/icons/favicon_package/safari-pinned-tab.svg" color="#5bbad5">

  <!-- inject:css -->
  <!-- endinject -->

  <script type="text/javascript" src="http://wfwf.apareciumlabs.com/resources/libs/jsqrcode/llqrcode.js"></script>
  <script type="text/javascript" src="http://wfwf.apareciumlabs.com/resources/libs/jsqrcode/webqr.js"></script>

  <!-- inject:js -->
  <!-- endinject -->
</head>

<body>
<div data-role="page" class="white-full-page-wrapper">
  <div role="main" id="main" class="overlay ui-content main-content white-full-page scan-qr-page">
    <div class="top-panel">
      <div class="main-heading">
        <h3>Scan QR</h3>
        <p>Point your camera to the QR code on the price tag.</p>
      </div>
      <a href="index.php" rel="external"><i class="fa fa-times fa-2x"></i></a>
    </div><!-- /top-panel -->
    
      <div class="canvas-container" id="mainbody">
        <img class="selector" id="webcamimg" src="assets/icons/video-camera.svg" onclick="setwebcam()" align="left" />
        <img class="selector" id="qrimg" src="assets/icons/video-camera.svg" onclick="setimg()" align="right" />
        <div class="video-placeholder" id="outdiv"></div>
        <div class="status-placeholder"><div id="result"></div></div>
      </div>
      <div class="empty-placeholder hidden" id="camera-error-empty-placeholder">
        <img class="icon" src="assets/icons/video-camera.svg" />
        <h4 class="main-title">Camera Error</h4>
        <p class="sub-title">The camera connection refused. Please reload the page and retry.</p>
      </div>

      <div data-role="popup" id="auth-mismatched-popup" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
        <h3>Oops!</h3>
        <p>You've entered an incorrect email or password. Please retry!</p>
        <img class="check-mark" src="assets/img/cross-mark-circular.svg" />
        <a data-rel="back" class="btn btn-danger ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini">Continue</a>
      </div><!-- /Failed message popup -->
      <div data-role="popup" id="auth-failed-popup" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
        <h3>Error!</h3>
        <p>Your login attempt has failed. If you're new here, please create an account clicking on the sign up button</a></p>
        <img class="check-mark" src="assets/img/cross-mark-circular.svg" />
        <a class="btn btn-danger ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" onclick="navigatePage('sign-up.php')">Sign Up</a>
      </div><!-- /No Account message popup -->
      <div data-role="popup" id="auth-matched-popup" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
        <h3>Success!</h3>
        <p>Login successful. You will be redirected back to the home screen in a second.</p>
        <img class="check-mark" src="assets/img/check-mark-circular.svg" />
      </div><!-- /Success message popup -->
  </div><!-- /main -->
</div><!-- page -->

<canvas id="qr-canvas" width="800" height="600"></canvas>
<script type="text/javascript">
      load();
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        var constraints = { video: true };
        navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
          var videoTracks = stream.getVideoTracks();
          console.log('Got stream with constraints:', constraints);
          console.log('Using video device: ' + videoTracks[0].label);
          stream.onremovetrack = function() {
            console.log('Stream ended');
          };
          window.stream = stream; // make variable available to browser console
          video.srcObject = stream;
        });
      });
    </script>
</body>
</html>
