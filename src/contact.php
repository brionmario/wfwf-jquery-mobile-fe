<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Contact | Westminster Fashion Week Festival 2019</title>
 
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
    <?php require './components/sidebar.php'?><!-- /panel -->
    <?php require './components/header.php'?><!-- header -->
    <div role="main" class="overlay ui-content main-content page-description contact-page">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div id="map" class="google-map"></div><!-- map -->
      <div class="padded-content full-height">
        <div class="ui-grid-a breakpoint">
          <div class="ui-block-a">
            <div class="contact-details">
              <p class="address"><span>Address</span>309 Regent Street, London W1B 2HW</p>
              <p class="phone"><span>Hotline</span>+44(0)20 7911 5000</p>
              <p class="email"><span>Email</span>wfwf@apareciumlabs.com</p>
            </div>
            <hr class="hr vertical" /> 
          </div>
          <div class="ui-block-b">
            <div class="form-container">
            <form action="contact.php" method="post">
              <h4>Send us a message</h4>
              <div class="input-with-icon">
                <input type="text" name="name" placeholder="Name">
                <i class="fa fa-user fa-lg"></i>
              </div>
              <div class="input-with-icon"> 
                <input type="email" name="email" placeholder="Email">
                <i class="fa fa-envelope fa-lg"></i>
              </div>
              <div class="input-with-icon">  
                <textarea rows="2" name="textarea" placeholder="Type your message here"></textarea>
              </div>
              <div class="form-button-container">
                <button class="btn btn-primary" type="submit" name="send">Submit</button>
              </div>
              </form>
            </div>
          </div>
        </div><!-- /grid-a -->
      </div>
 <!-- /success popup -->

      <?php 

            require 'libs/phpmailer/PHPMailerAutoload.php';
            if(isset($_POST['send']))
                {

                  $test = "Email: ".$_POST['email']."<br>"."Name: ".$_POST['name']."<br>"."Message: ".$_POST['textarea'];
              
                  $email = 'westministerfashionweek@gmail.com';                    

                  $mail = new PHPMailer;

                  $mail->isSMTP();

                  $mail->Host = 'smtp.gmail.com';

                  $mail->Port = 587;

                  $mail->SMTPSecure = 'tls';

                  $mail->SMTPAuth = true;

                  $mail->Username = 'westministerfashionweek@gmail.com';

                  $mail->Password = 'wfwf1234';

                  $mail->setFrom('westministerfashionweek@gmail.com', 'Event List');

                  $mail->addAddress($email);

                  $mail->Subject = 'Westminister Fashion Week Event List';

                  $mail->msgHTML($test);

                  if (!$mail->send()) {
                     $error = "Mailer Error: " . $mail->ErrorInfo;
                     echo '<script type="text/javascript">navigatePage(\'contact.php\');</script>';
                  } else {
                    echo '<script type="text/javascript">navigatePage(\'contact.php\');</script>';
                  }
             }
        ?>
    </div><!-- /content -->
    <?php require './components/footer.php'?><!--footer -->
  </div><!-- page -->

  <script>
    function initMap() {
      var lon = -0.141086;
      var lat = 51.520692;
      var location = {lat: lat, lng: lon}
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: lat, lng: lon},
        zoom: 17
      });
      var marker = new google.maps.Marker({position: location, map: map});
    }
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYqG3QmAKCWHw5E5Z19jvNPjnqaFBOPDA&callback=initMap"
    async defer></script>
  <script type="text/javascript">
    var breadcrumb = [
      {
        name: 'Home',
        href: 'index.php'
      },
      {
        name: 'Contact',
        href: 'contact.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
</body>
</html>
