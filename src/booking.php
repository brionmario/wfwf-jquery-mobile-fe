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
    <?php
  echo '<div data-role="page" class="booking">';
    require './components/sidebar.php';
    require './components/header.php';
    echo '<div role="main" class="overlay ui-content main-content about">';
    require './components/breadcrumb.php';

    $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/events/{$_GET['id']}";
        
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache"
        ),
      ));

    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    $event = json_decode($response);


    echo '<div class="ui-grid-a">';
      echo '<div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:160px">';
        echo '<img src="'.$event->imageSlider[0].'" />';
      echo '</div></div>';
      echo '<div class="ui-block-b"><div class="ui-bar ui-bar-a" style="height:160px">';
        echo '<h5  class="event-title">'.$event->title.'</h5>';
        echo  '<p class="event-description-text">'.$event->description.'</p>';
        echo '<P>Tickets </p><input type="number" id="total" name="quantity" min="1" max="5" value="0">';
        echo '<h2>$ '.$event->ticketPrice.'.00</h2>';
      echo '</div></div>';
    echo '</div><!-- /grid-a -->';
    echo '<hr class="style14">'; 
    echo '<div class="form-area">';
        echo ' <h5>Pay with Paypal</h5>';
            echo '<div class="inputWithIcon">';
                echo '<input type="email" name="email" placeholder="Email">';
                echo ' <i class="fa fa-envelope fa-lg"></i>';
            echo '</div>';
            echo ' <div class="inputWithIcon">';
                echo ' <input type="password" name="password" placeholder="Password">';
                echo ' <i class="fa fa-lock fa-lg"></i>';
            echo ' </div>';
            echo ' <p><a href="www.paypal.com">Don\'t have paypal account</a></p>';
        echo '</div>';
        echo '<hr class="style14">';
        echo ' <div class="booking-detils">';
            echo '<h5>Booking Deatils</h5>';
            echo ' <p>Number of tickets:   </p>';
            echo '<h2>Total Amount:  $20.00</h2>';
                echo ' <div class="form-button">';
                echo ' <button type="button" onclick="alert(\'Submit\')">Confirm & Pay</button>';
                echo ' </div>';
        echo ' </div>';
    echo ' </div><!-- /content -->';
     require './components/footer.php';
   echo '</div><!-- page -->';
   ?>
  
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