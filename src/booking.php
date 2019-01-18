<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Booking | Westminster Fashion Week Festival 2019</title>
 
  <!-- Favicon Package -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/icons/favicon_package/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/favicon_package/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/icons/favicon_package/favicon-16x16.png">
  <link rel="manifest" href="./assets/icons/favicon_package/site.webmanifest">
  <link rel="mask-icon" href="./assets/icons/favicon_package/safari-pinned-tab.svg" color="#5bbad5">
  <script src="https://checkout.stripe.com/checkout.js"></script>
  <!-- inject:css -->
  <!-- endinject -->

  <!-- inject:js -->
  <!-- endinject -->
</head>

<body onload="displayTotal()">
    <?php
    echo '<div data-role="page">';
    require './components/sidebar.php';
    require './components/header.php';
        echo '<div role="main" class="overlay ui-content main-content booking-page">';
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
                echo '<div class="ui-block-a">';
                    echo '<div class="booking-image-container">';
                        echo '<img src="'.$event->imageSlider[0].'" />';
                    echo '</div>';
                echo '</div>';
                
        echo '<div class="ui-block-b">';
            echo '<div class="booking-details">';
                echo '<p class="booking-title">'.$event->title.'</p>';
                echo '<p class="booking-description-text">'.$event->description.'</p>';
                echo '<div class="ticket-count"><P>Tickets</p><input type="number" id="total" name="quantity" min="1"  value="1"></div>';
                echo '<h2 id="ticketprice" class="ticketprice">£'.$event->ticketPrice.'.00</h2>';
            echo '</div>';    
        echo '</div>';
        echo '
            <script type="text/javascript">
            $( "#total" ).keyup(function() {
                var value = $( this ).val();
                var ticketprice = $(\'#ticketprice\').val();
                console.log(ticketprice);
                console.log(value);
                var totalprice = value * '.$event->ticketPrice.';
                $( "#numticket" ).text( value );
                $( "#totalprice" ).text( totalprice );
                }).keyup();

                function displayTotal() {
                    var value = $(\'#total\' ).val();
                    var ticketprice = $(\'#ticketprice\').val();
                    var totalprice = value * '.$event->ticketPrice.';
                    $( "#numticket" ).text( value );
                    $( "#totalprice" ).text( totalprice );
                }
                
            </script>';
            echo'<script type="text/javascript">var breadcrumb = [{name: \'Home\',href: \'index.php\'},{name: \'Events\',href: \'events.php\'},{name: \''.$event->title.'\',href: \'event-description.php?id='.$event->id.'\'},{name: \'Booking\',href: \'booking.php?id='.$event->id.'\'}];setBreadcrumb(breadcrumb);</script>';
            echo '</div><!-- /grid-a -->';

    echo '
    <script type="text/javascript">
    $(document).ready(function(){
      $(".event-slider").slick();
    });

    $(document).ready(function () {
      var defaultHeight = 40;
      var text = $(".booking-description-text");
      var textHeight = text[0].scrollHeight;
      text.css({"max-height": defaultHeight, "overflow": "hidden"});
    
    });
    </script>
    ';
    echo '<hr class="hr">';
        echo '<form id="first_form"  action="booking.php?id='.$event->id.'">'; 
            echo ' <div class="total-container padded-content">';
                echo '<h4>Booking Deatils</h4>';
                echo '<p>Number of tickets: &ensp; <span id=numticket></span></p>';
                echo '<h2>Total Amount: &ensp; £<span id=totalprice></span></h2>';
                    echo ' <div class="form-button">';
                        echo '<button class="btn btn-primary" type="submit" value="Submit" id="payment-button">Pay With Stripe</button>';
                    echo ' </div>';
            echo ' </div>';
        echo '</form>';

        echo '<div align="center" id="thankyou-payment"></div>';
        
        echo '
        <script>
            jQuery(function($) {
            var $form = $("#first_form");
            var handler = StripeCheckout.configure({
            key: "pk_test_cp21BcECf4kMMUbSlRlZlsMo",
            token: function(token) {
        
            if(token.id){
                $(\'#payment-successful\').popup("open");   
            }
           }
           });

           $("#payment-button").on("click", function(e) {
           // Open Checkout with further options
           handler.open({
           name: "Westminster Fashion Week Festival",
           currency: "gbp",
           description: $("#numticket").val(),
           amount: $("#totalprice").val() * 100
           });
           e.preventDefault();
           });

           // Close Checkout on page navigation
           $(window).on("popstate", function() {
           handler.close();
           });
           });
        </script>
        ';
        

        echo '<!-- /success popup -->
        <div data-role="popup" id="payment-successful" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
            <h3>Success!</h3>
            <p>Your payment was successful</p>
            <p>You will be redirected to the event page</p>
            <img class="check-mark" src="assets/img/check-mark-circular.svg" />
            <a data-rel="back" class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" onclick="navigatePage(\'events.php\')">Continue</a>
        </div>

            <!-- /Failed message popup -->
        <div data-role="popup" id="payment-fail" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
            <h3>Failed!</h3>
            <p>Your payment was Faild</p>
            <p>Check youre mail and password</p>
            <img class="check-mark" src="assets/img/cross-mark-circular.svg" />
            <a data-rel="back" class="btn btn-danger ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini">Continue</a>
        </div>';
    echo ' </div><!-- /content -->';
     require './components/footer.php';
echo '</div><!-- page -->';
   ?>
        
</body>
</html>