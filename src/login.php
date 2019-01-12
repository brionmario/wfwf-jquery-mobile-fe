<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Thisura Sagara">
  <title>Login</title>
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
<div data-role="page" class="auth">
  <div role="main" class="overlay ui-content main-content">
  <div class="close-icon">
  <i class="fa fa-times fa-2x"></i>
    </div>
    <div class="main-heading-area">
      <h1>Login</h1>
    </div>
    <div class="second-heading-area">
      <h3>Welcome Back,</h3>
    </div>
    <div class="third-heading-area">
      <h5>Sign in to continue</h5>
    </div>
    <div class="form-area">
      <div class="inputWithIcon">
           <input type="email" name="email" placeholder="Email">
           <i class="fa fa-envelope fa-lg"></i>
        </div>
        <div class="inputWithIcon">  
          <input type="password" name="password" placeholder="Password">
          <i class="fa fa-lock fa-lg"></i>
        </div>
        <div class="form-button">
          <button type="button" onclick="alert('Login')">Login</button>
        </div>
    </div>
    <div class="route-area">        
     <p>Don't have an account? click <a href="sign-up.php">here</a> to sign up new !</p>
    </div>
    <hr class="hr-text" data-content="OR">
    <div class="sign-with-heading-area">
      <h5>Sign in with</h5>
    </div>
      <div class="social-icons">
        <ul>
          <li><a href="https://www.facebook.com/apareciumlabs/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
          <li><a href="https://twitter.com/apareciumlabs" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
          <li><a href="https://instagram.com/apareciumlabs" target="_blank"><i class="fa fa-google"></i></a></li>
        </ul>
      </div>
  </div><!-- /content -->
</div><!-- page -->
</body>
</html>
