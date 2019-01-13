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
  <div data-role="page" class="booking">
    <?php require './components/sidebar.php'?><!-- /panel -->
    <?php require './components/header.php'?><!-- header -->
    <div role="main" class="overlay ui-content main-content about">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div class="ui-grid-a">
        <div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:120px"><img src="assets/img/images/about-image.jpg" /></div></div>
        <div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:120px">
        <h5>Hipster Fashion Catwalk</h5>
        <p class="event-description-text">Checks, plaids and tartans have been adopted by musical subcultures for decades, from punk to grunge or hip-hop. For a preppier take on the tartan look, think Cher Horowitz in 90s classic Clueless, teaming mini kilts with mohair knits and cropped jackets.Mix and match clashing checks in bright colours – orange, purple, blue and yellow – and dress them up as tailored separates and outerwear, or down by teaming them with denim and oversized pieces.</p>
        <P>Tickets </p><input type="number" name="quantity" min="1" max="5">
    </div></div>
      </div><!-- /grid-a -->
      <hr class="style14"> 
     <div class="form-area">
       <h5>Pay with Paypal</h5>
       <div class="inputWithIcon"> 
           <input type="email" name="email" placeholder="Email">
           <i class="fa fa-envelope fa-lg"></i>
           </div>
           <div class="inputWithIcon">  
          <input type="password" name="password" placeholder="Password">
          <i class="fa fa-lock fa-lg"></i>
          </div>
           <p><a href="www.paypal.com">Don't have paypal account</a></p>
    </div>
    
    <hr class="style14">
     <div class="booking-detils">
     <h5>Booking Deatils</h5>
       <p>Number of tickets:   2</p>
       <h2>Total Amount:  $20.00</h2>
       <div class="form-button">
            <button type="button" onclick="alert('Submit')">Confirm & Pay</button>
          </div>
     </div>
     
    </div><!-- /content -->
    <?php require './components/footer.php'?><!--footer -->
  </div><!-- page -->

  
  <script type="text/javascript">
    var breadcrumb = [
      {
        name: 'Home',
        href: 'index.php'
      },
      {
        name: 'Book Tickets',
        href: 'booking.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.event-slider').slick();
    });

    $(document).ready(function () {
      var defaultHeight = 40;
      var text = $(".event-description-text");
      var textHeight = text[0].scrollHeight;
      text.css({"max-height": defaultHeight, "overflow": "hidden"});

    });
  </script>
</body>
</html>
