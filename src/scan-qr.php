<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Thisura Sagara">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <title>Scan QR | Westminster Fashion Week Festival 2019</title>
  
  <!-- Favicon Package -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/icons/favicon_package/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/favicon_package/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/icons/favicon_package/favicon-16x16.png">
  <link rel="manifest" href="./assets/icons/favicon_package/site.webmanifest">
  <link rel="mask-icon" href="./assets/icons/favicon_package/safari-pinned-tab.svg" color="#5bbad5">

  <!-- inject:css -->
  <!-- endinject -->

  <script type="text/javascript" src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
  <script type="text/javascript" src="http://wfwf.apareciumlabs.com/resources/libs/instascan/instascan.min.js"></script>

  <!-- inject:js -->
  <!-- endinject -->
</head>

<body>
<div data-role="page" class="white-full-page-wrapper">
  <div role="main" class="overlay ui-content main-content white-full-page scan-qr-page">
    <div class="top-panel">
      <div class="main-heading">
        <h3>Scan QR</h3>
        <p>Point your camera to the QR code</p>
      </div>
      <button class="btn btn-outline btn-sm" onclick="routeWithId('game.php')">Go Back</button>
    </div><!-- /top-panel -->
    
    <div class="video-feed-container">
      <video id="preview" class="video-feed" playsinline></video>
    </div>

    <div class="empty-placeholder hidden non-visible" id="camera-error-empty-placeholder">
      <img class="icon" src="assets/icons/video-camera.svg" />
      <h4 class="main-title">Camera Error</h4>
      <p class="sub-title">The camera connection refused. Please reload the page and retry.</p>
    </div>

    <div data-role="popup" id="incorrect-qr-popup" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
      <h3>Oops!</h3>
      <p>The QR code you've scanned appears to be invalid. Please try again.</a></p>
      <img class="check-mark" src="assets/img/cross-mark-circular.svg" />
      <a class="btn btn-danger ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" data-rel="back">Retry</a>
    </div><!-- /QR error popup -->

    <div data-role="popup" id="task-complete-popup" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
      <h3>Task Completed</h3>
      <p>You have successfully completed the task and will receive 10 points</p>
      <img class="check-mark" src="assets/img/check-mark-circular.svg" />
      <a class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" onclick="routeWithId('tasks.php')">Continue</a>
    </div><!-- /Success message popup -->
  </div><!-- /main -->
</div><!-- page -->


<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", event => {
    var urlString = window.location.href;
    var url = new URL(urlString);
    var userID = url.searchParams.get("id");
    var taskID = url.searchParams.get("taskID");
    var taskName = url.searchParams.get("taskName");
    var scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
    Instascan.Camera.getCameras().then(function (cameras) {
      scanner.camera = cameras[cameras.length - 1];
      scanner.start();
    }).catch(function (e) {
      console.error(e);
      document.getElementById("camera-error-empty-placeholder").style.display = "block";
      document.getElementById("camera-error-empty-placeholder").style.visibility = "visible";
    });
    scanner.addListener('scan', function (content) {
      console.log('Found', content);
      console.log('Task From URL', taskName);

      if (content === taskName) {
        updateTask(userID ,taskID, taskName);
        $('#task-complete-popup').popup("open");
      } else {
        $('#incorrect-qr-popup').popup("open");
      }
    });
  });
</script>
</body>
</html>
