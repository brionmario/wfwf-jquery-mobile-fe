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
  <div data-role="page" class="contact">
    <?php require './components/sidebar.php'?><!-- /panel -->
    <?php require './components/header.php'?><!-- header -->
    <div role="main" class="overlay ui-content main-content about">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div id="map" class="map"></div><!-- map -->
     <div class="contact-detils">
       <p><b>Address:</b>   309 Regent Street, London W1B 2HW</p>
       <p><b>Hotline:</b>   +44 (0)20 7911 5000</p>
       <p><b>Email:</b>   wfwf@westminster.ac.uk</p>
     </div>
     <hr class="style14"> 
     <div class="form-area">
       <p>Send us a message</p>
          <div class="inputWithIcon">
            <input type="text" name="name" placeholder="Name">
            <i class="fa fa-user fa-lg"></i>
          </div>
           <div class="inputWithIcon"> 
           <input type="email" name="email" placeholder="Email">
           <i class="fa fa-envelope fa-lg"></i>
           </div>
          <div class="inputWithIcon">  
          <textarea rows="2" placeholder="Type your message here"></textarea>
          </div>
          <div class="form-button">
            <button type="button" onclick="alert('Sign up')">Submit</button>
          </div>
    </div>
    </div><!-- /content -->
    <?php require './components/footer.php'?><!--footer -->
  </div><!-- page -->

  <script>
    mail(thisuras4@gmail.com, )
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVbXTnxIFacAj5Yp67HgRX2yykjUD9BYg&callback=initMap"
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
