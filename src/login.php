<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Thisura Sagara">
  <title>Login | Westminster Fashion Week Festival 2019</title>
  
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.2&appId=1875640702658051&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div data-role="page" class="white-full-page-wrapper">
  <div role="main" class="overlay ui-content main-content white-full-page auth-page">
    <div class="close-icon-container">
      <a href="index.php" rel="external"><i class="fa fa-times fa-2x"></i></a>
    </div><!--/close-icon-container -->
    <div class="padded-content full-height">
      <div class="main-heading-container">
        <h1>Login</h1>
        <h3>Welcome Back,</h3>
        <h5>Sign in to continue</h5>
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
          <div class="fb-login-button" data-max-rows="1" data-size="small" data-button-type="continue_with" data-show-faces="false" data-auto-logout-link="false" data-use-continue-as="true"></div>
          <!-- <ul>
            <li><a href="https://www.facebook.com/apareciumlabs/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
            <li><a href="https://twitter.com/apareciumlabs" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
            <li><a href="https://instagram.com/apareciumlabs" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
          </ul> -->
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

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '286828338646735',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.2'
    });
      
    FB.AppEvents.logPageView();   
      
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  };

  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
  });
}
</script>
</body>
</html>
