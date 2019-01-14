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

<body onload="myFunction()">
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
                echo '<div class="ui-block-a"><div class="ui-bar ui-bar-a" style="height:160px">';
                    echo '<img src="'.$event->imageSlider[0].'" />';
                echo '</div>';
            echo '</div>';
        echo '<div class="ui-block-b">';
            echo'<div class="ui-bar ui-bar-a" style="height:160px">';
                echo '<h5  class="event-title">'.$event->title.'</h5>';
                echo  '<p class="event-description-text">'.$event->description.'</p>';
                echo '<P>Tickets </p><input type="number" id="total" name="quantity" min="1"  value="1">';
                echo '<h2 id="ticketprice">£'.$event->ticketPrice.'.00</h2>';
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

                function myFunction() {
                    var value = $(\'#total\' ).val();
                    var ticketprice = $(\'#ticketprice\').val();
                    var totalprice = value * '.$event->ticketPrice.';
                    $( "#numticket" ).text( value );
                    $( "#totalprice" ).text( totalprice );
                }
                
            </script>';
            echo'<script type="text/javascript">var breadcrumb = [{name: \'Home\',href: \'index.php\'},{name: \'Events\',href: \'events.php\'},{name: \''.$event->title.'\',href: \'event-description.php?id='.$event->id.'\'},{name: \'Booking\',href: \'booking.php?id='.$event->id.'\'}];setBreadcrumb(breadcrumb);</script>';
            
            ?>
    </div><!-- /grid-a -->
    <hr class="style14">
        <form id="first_form" method="post" action="">
            <div class="form-area">
                 <h5>Pay with Paypal</h5>
                    <div class="inputWithIcon">
                        <input type="email" id="email" name="email" placeholder="Email">
                         <i class="fa fa-envelope fa-lg"></i>
                    </div>
                    <div class="inputWithIcon">
                        <input type="password" id="password" name="password" placeholder="Password">
                        <i class="fa fa-lock fa-lg"></i>
                    </div>
                    <p><a href="www.paypal.com">Don\'t have paypal account</a></p>
            </div>
            <hr class="style14">
             <div class="booking-detils">
                <h5>Booking Deatils</h5>
                <p>Number of tickets: &ensp;<span id=numticket></span></p>
                <h2>Total Amount: &ensp; £<span id=totalprice></span></h2>
                     <div class="form-button">
                        <button type="submit" value="Submit">Confirm & Pay</button>
                    </div>
            </div>
        </form>

        <!-- /success popup -->
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
        </div>
    </div><!-- /content -->
    <?php require './components/footer.php'?><!--footer -->
</div><!-- page -->
   
<!--           
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
</script> -->
<script type="text/javascript">
    $(document).ready(function(){
      $('.event-slider').slick();
    });

    $(document).ready(function () {
      var defaultHeight = 40;
      var text = $(".event-description-text");
      var textHeight = text[0].scrollHeight;
      text.css({"max-height": defaultHeight, "overflow": "hidden"});
    
      $('#first_form').submit(function(e) {
    e.preventDefault();

    var email = $('#email').val();
    var password = $('#password').val();
    console.log(email);
    console.log(password);
    if (password.length < 1) {
        $("#payment-fail").popup("open"); 
    } else if (email.length < 1){
        $("#payment-fail").popup("open"); 
    } else {
      var regEx = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var validEmail = regEx.test(email);
      if (!validEmail) {
        $("#payment-fail").popup("open"); 
      }else{
        $("#payment-successful").popup("open"); 
      }
    }

  });
    });
</script>
</body>
</html>