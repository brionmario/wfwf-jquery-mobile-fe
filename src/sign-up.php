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
<div data-role="page">
  <div role="main" class="overlay ui-content main-content auth-page">
    <div class="close-icon-container">
      <a data-rel="back" rel="external"><i class="fa fa-times fa-2x"></i></a>
    </div>
    <div class="content">
      <div class="main-heading-container">
        <h1>Sign up</h1>
        <h3>Howdy stranger,</h3>
        <h5>Complete the form to create an account</h5>
      </div>
      <div class="form-area">
        <div class="input-with-icon">
          <input type="text" name="fname" placeholder="First Name">
          <i class="fa fa-user"></i>
        </div>
        <div class="input-with-icon">  
          <input type="text" name="lname" placeholder="Last Name">
          <i class="fa fa-user"></i>
        </div>
        <div class="input-with-icon"> 
          <input type="email" name="email" placeholder="Email">
          <i class="fa fa-envelope"></i>
        </div>
        <div class="input-with-icon">  
          <input type="password" name="password" placeholder="Password">
          <i class="fa fa-lock"></i>
        </div>
        <div class="form-button">
          <button type="submit" class="btn btn-primary" onclick="alert('Sign up')">Sign up</button>
        </div>
      </div>
    
      <div class="route-area">        
        <p>Alredy have an account? Click <a href="login.php">here</a> to sign in!</p>
      </div>
    </div><!-- /content -->
  </div><!-- /main-content -->
</div><!-- page -->
</body>
</html>
