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
                <p>The size you have specified is available</p>
                <img class="check-mark" src="assets/img/check-mark-circular.svg" />
                <a data-rel="back" class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini">Continue</a>
             </div>';

        echo '<div class="page-slider">';
          foreach($product->imageSlider as $image):
            echo '<img src="'.$image.'" />';
          endforeach;
        echo '</div>';
        echo '<div>';
          echo '<div class="ui-grid-a ui-responsive">';
            echo '<div class="ui-block-solo">';
              echo '<div class="page-description-container body-padding text-center">';
                echo '<h2 class="page-title">'.$product->title.'</h2>';
                echo '<h3 class="product-price">£'.$product->price.'</h3>';
                echo '<div class="product-category-container">'; 
                  echo '<i class="fa fa-tag"></i>';
                  echo '<span class="product-category">&ensp;'.$product->category.'</span>';
                echo '</div>';
              echo '</div>';

              echo '<div class="action-button-container body-padding text-center">';
                  //dropdown
                  echo '<div class="ui-field-contain ui-btn-inline">';
                    echo '<select name="select-custom-21" id="select-custom-21" data-native-menu="false">';
                      echo '<option value="choose-one" data-placeholder="true">Select Size</option>';
                      foreach($product->sizes as $size):
                      echo '<option value="1">'.$size.'</option>';
                      endforeach;
                    echo '</select>';
                  echo '</div>';
                  echo '<a class="availability-btn-anchor" href="#check-avaliability" data-rel="popup" data-position-to="window" data-transition="pop")>';
                    echo '<button class="btn btn-primary ui-btn-inline check-availability-btn">Check Availability</button>';
                  echo '</a>';
                  echo '<button class="btn btn-secondary directions-btn ui-btn-inline" onclick="navigatePage(\'get-directions.php?id='.$product->id.'&lat='.$product->latitude.'&lon='.$product->longitude.'\')">Get Directions</button>';
                  echo '<button class="btn btn-outline favourites-btn ui-btn-inline" id="favourited-filter-button" onclick="favourite('.$product->favourited.',\'products\',\''.$product->id.'\'); navigatePage(\'product-description.php?id='.$product->id.'\')">';    
                    if ($product->favourited == 'true') {
                      echo '<i class="fa fa-heart-o"></i>Remove From Favourites';
                    } else if ($product->favourited == 'false') {
                      echo '<i class="favourited fa fa-heart"></i>Add To Favourites';
                    }
                  echo '</button>';
              echo '</div>';

              echo '<div class="product-specs body-padding">';
                echo '<h4>Product Specifications</h4>';
                foreach($product->specs as $spec):
                  echo '<h5>'.$spec.'</h5>';
                endforeach;
              echo '</div>';
              
              echo '<div class="product-description body-padding">';
                echo '<h4>Product Description</h4>';
                echo '<p class="page-description-text">'.$product->description.'</p>';
                echo '<button class="btn btn-default btn-sm show-more-btn ">Show More</b></button>';
              echo '</div>';

            echo '</div>';
          echo '</div>';
        echo '</div><!-- /padded-content-->';
      echo '</div>';
      require './components/footer.php';
    echo '</div>';

  echo'<script type="text/javascript">var breadcrumb = [{name: \'Home\',href: \'index.php\'},{name: \'Products\',href: \'products.php\'},{name: \''.$product->title.'\',href: \'event-description.php?id='.$event->id.'\'}];setBreadcrumb(breadcrumb);</script>';
  ?>
  
    

  <script type="text/javascript">
     $(document).ready(function(){
      $('.page-slider').slick({
        dots: true
      });
    });

    $(document).ready(function(){
      if (!isLoggedIn()) {
        $('#favourited-filter-button').hide();
      }
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

