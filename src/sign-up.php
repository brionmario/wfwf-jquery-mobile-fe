<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Thisura Sagara">
  <title>Sign Up | Westminster Fashion Week Festival 2019</title>
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
  <div role="main" class="overlay ui-content main-content white-full-page auth-page">
    <div class="close-icon-container">
      <a data-rel="back" rel="external"><i class="fa fa-times fa-2x"></i></a>
    </div><!--/close-icon-container -->
    <div class="padded-content full-height">
      <div class="main-heading-container">
        <h1>Sign up</h1>
        <h3>Howdy stranger,</h3>
        <h5>Complete the form to create an account</h5>
      </div><!--/main-heading-container -->
      <div class="form-container">
        <form id="sign-up-form" method="post" action="">
          <div class="input-with-icon">
            <input type="text" name="fname" id="fname" placeholder="First Name" required>
            <i class="fa fa-user"></i>
          </div>
          <div class="input-with-icon">  
            <input type="text" name="lname" id="lname" placeholder="Last Name" required>
            <i class="fa fa-user"></i>
          </div>
          <div class="input-with-icon"> 
            <input type="email" name="email" id="email" placeholder="Email" required>
            <i class="fa fa-envelope"></i>
          </div>
          <div class="input-with-icon">  
            <input type="password" name="password" id="password" placeholder="Password" required>
            <i class="fa fa-lock"></i>
          </div>
          <div class="form-button">
            <button type="submit" class="btn btn-primary">Sign up</button>
          </div>
        </form>
      </div><!--/form-container -->
      <div class="route-area">        
        <p>Alredy have an account? Click <a href="login.php">here</a> to sign in!</p>
      </div><!--/route-area -->
      <div data-role="popup" id="sign-up-success-popup" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
        <h3>Success!</h3>
        <p>Account created successfully. Please press the login button to continue.</a></p>
        <img class="check-mark" src="assets/img/check-mark-circular.svg" />
        <a class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" onclick="navigatePage('login.php')">Login</a>
      </div><!-- /Success message popup -->
    </div><!-- /content -->
  </div><!-- /main -->
</div><!-- page -->

<script type="text/javascript">
$(document).ready(function () {
  $('#sign-up-form').on('submit', function(e){
    e.preventDefault();
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var endpoint = 'https://westminster-fashion-week-api.herokuapp.com/api/v1/users';

    if ((fname !== null || fname !== '') && (lname !== null || lname !== '') && (email !== null || email !== '') && (password !== null || password !== '')) {
      var body = {
        displayName: fname + " " + lname,
        email: email,
        password: password
      };
      fetch(endpoint, {
        method: 'POST',
        mode: 'cors',
        body: JSON.stringify(body),
        headers: {
          'Content-Type': 'application/json'
        },
        credentials: 'same-origin'
      }).then(function (resp) {
        return resp.json();
      }).then(function (data) {
        $('#sign-up-success-popup').popup("open");
      }).then(function (error) {
        console.log(error);
      });
    }
  });
});
</script>
</body>
</html>
