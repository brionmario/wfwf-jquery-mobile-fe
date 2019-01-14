<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Product Description | Westminster Fashion Week Festival 2019</title>
 
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
    echo '<div data-role="page">';
      require './components/sidebar.php';
      require './components/header.php';
      echo '<div role="main" class="overlay ui-content main-content page-description product-description">';
        require './components/breadcrumb.php';

        $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/products/{$_GET['id']}";
        
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

        $product = json_decode($response);

        //<!-- /availability popup -->
        echo '<div data-role="popup" id="check-avaliability" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
                <h3>Available!</h3>
                <p>This product is available</p>
                <img class="check-mark" src="assets/img/check-mark-circular.svg" />
                <a data-rel="back" class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" onclick="navigatePage(\'products-description.php\')">Continue</a>
             </div>';

        echo '<div class="page-slider">';
          foreach($product->imageSlider as $image):
            echo '<img src="'.$image.'" />';
          endforeach;
        echo '</div>';
        echo '<div class="ui-grid-a ui-responsive">';
          echo '<div class="ui-block-solo">';
            echo '<div class="page-description-container body-padding text-center">';
              echo '<h2 class="page-title">'.$product->title.'</h2>';
              echo '<h4 class="product-price">'.$product->price.'</h4>';
              echo '<div class="product-category">'; 
                echo '<i class="fa fa-tag"></i>';
                echo '<p class="product-category-text">'.$product->category.'</p>';
              echo '</div>';
            echo '</div>';

           //dropdown
            echo '<div class="ui-field-contain">';
                echo '<select name="select-custom-21" id="select-custom-21" data-native-menu="false">';
                 echo '<option value="choose-one" data-placeholder="true">Select Size</option>';
                 foreach($product->sizes as $size):
                 echo '<option value="1">'.$size.'</option>';
                endforeach;
                echo '</select>';
            echo '</div>';

            echo '<div class="action-button-container body-padding text-center">';
              echo '<a class="availability-btn" href="#check-avaliability" data-rel="popup" data-position-to="window" data-transition="pop")>';
                echo '<button class="btn btn-primary btn-full check-availability-btn">Check Availability</button>';
              echo '</a>';
              echo '<button class="btn btn-secondary directions-btn ui-btn-inline" onclick="navigatePage(\'get-directions.php?id='.$product->id.'&lat='.$product->latitude.'&lon='.$product->longitude.'\')">Get Directions</button>';
            echo '</div>';

            echo '<div class="product-specs">';
               foreach($product->specs as $spec):
                echo '<h5>'.$spec.'</h5>';
               endforeach;
            echo '</div>';
            
            echo '<div class="product-description">';
              echo '<h2>Description</h2>';
              echo '<p class="product-description-text">'.$product->descrition.'</p>';
              echo '<button class="btn btn-default btn-sm show-more-btn center-button">Show More</b></button>';
            echo '</div>';

          echo '</div>';
        echo '</div>';
      echo '</div>';
      require './components/footer.php';
    echo '</div>';

  echo'<script type="text/javascript">var breadcrumb = [{name: \'Home\',href: \'index.php\'},{name: \'Events\',href: \'events.php\'},{name: \''.$event->title.'\',href: \'event-description.php?id='.$event->id.'\'}];setBreadcrumb(breadcrumb);</script>';
  ?>
  
    

  <script type="text/javascript">
     $(document).ready(function(){
      $('.page-slider').slick({
        dots: true
      });
    });

    $(document).ready(function () {
      var defaultHeight = 40;
      var text = $(".page-description-text");
      var textHeight = text[0].scrollHeight;
      var button = $(".show-more-btn");
      text.css({"max-height": defaultHeight, "overflow": "hidden"});

      button.on("click", function(){
        var newHeight = 0;
        var label = 'Shore more';

        if (text.hasClass("active")) {
          newHeight = defaultHeight;
          text.removeClass("active");
          label = "Show more";
        } else {
          newHeight = textHeight;
          text.addClass("active");
          label = 'Shore less';
        }
        text.animate({
          "max-height": newHeight
        }, 200);

        $(".show-more-btn").text(label);
      });
    });
  </script>
</body>
</html>

