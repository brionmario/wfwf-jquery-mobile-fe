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

  <!-- inject:js -->
  <!-- endinject -->
</head>

<body>
<div data-role="page" class="white-full-page-wrapper">
  <div role="main" class="overlay ui-content main-content white-full-page scan-qr-page">
    <div class="close-icon-container">
      <a href="index.php" rel="external"><i class="fa fa-times fa-2x"></i></a>
    </div><!--/close-icon-container -->
    <div class="padded-content full-height">
      <div class="main-heading-container">
        <h1>Scan QR</h1>
        <h3>Point you camera to the QR code on the price tag</h3>
      </div><!--/main-heading-container -->
      <div class="form-container">
        <form id="login-form" method="post" action="">
          <div class="input-with-icon">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <i class="fa fa-envelope"></i>
            <p class="input-error"></p>
          </div>
          <div class="input-with-icon">  
            <input type="password" name="password" id="password" placeholder="Password" required>
            <i class="fa fa-lock"></i>
          </div>
          <div class="form-button-container">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div><!--/form-container --> 
      <div class="route-area">        
        <p>Don't have an account? Click <a href="sign-up.php">here</a> to sign up now!</p>
      </div><!--/route-area -->
      <hr class="hr" data-content="OR">
      <div class="social-login-container">
        <h6>Sign in with</h6>
        <div class="social-icons">
          <ul>
            <li><a href="https://www.facebook.com/apareciumlabs/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="https://twitter.com/apareciumlabs" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            <li><a href="https://instagram.com/apareciumlabs" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
          </ul>
        </div>
      </div><!--/social-login-container -->
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
    </div><!-- /padded-content -->
  </div><!-- /main -->
</div><!-- page -->

<script type="text/javascript">
$(document).ready(function () {
  $('#login-form').on('submit', function(e){
    e.preventDefault();
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var endpoint = 'https://westminster-fashion-week-api.herokuapp.com/api/v1/users';

    if ((email !== null || email !== '') && (password !== null || password !== '')) {
      fetch(endpoint, {
        method: 'GET',
        mode: 'cors',
        headers: {
          'Content-Type': 'application/json'
        },
        credentials: 'same-origin'
      }).then(function (resp) {
        return resp.json();
      }).then(function (data) {
        var isFound = false;
        var user = {};
        
        data.forEach(function (item) {
          if (item.email === email && item.password === password) {
            isFound = true;
            user = item;
          }
        });

        if (isFound) {
          addCookie(user.id);
          $('#auth-matched-popup').popup("open");
          setTimeout(function(){
            navigatePage('sponsor-video.php');
          },3000);
        } else {
          $('#auth-mismatched-popup').popup("open");
        }

      }).then(function (error) {
        $('#auth-failed').popup("open");
      });
    }
  });
});
</script>
</body>
</html>
