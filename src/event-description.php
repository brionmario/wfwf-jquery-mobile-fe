<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Event Description | Westminster Fashion Week Festival 2019</title>
 
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
      echo '<div role="main" class="overlay ui-content main-content event-description">';
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

        echo '<div class="event-slider">';
          foreach($event->imageSlider as $image):
            echo '<img src="'.$image.'" />';
          endforeach;
        echo '</div>';
        echo '<div class="ui-grid-a ui-responsive">';
          echo '<div class="ui-block-solo">';
            echo '<div class="event-description-container body-padding text-center">';
              echo '<h2 class="event-title">'.$event->title.'</h2>';
              echo '<p class="event-description-text">'.$event->description.'</p>';
              echo '<button class="btn btn-default btn-sm show-more-btn center-button">Show More</b></button>';
            echo '</div>';

            echo '<div data-role="collapsible-set" data-corners="false" data-theme="false" data-content-theme="false">';
              echo '<div data-role="collapsible">';
                echo '<h3>Models</h3>';
                echo '<ul data-role="listview" data-inset="false">';
                  foreach($event->models as $model):
                    echo '<li>'.$model.'</li>';
                  endforeach;
                echo '</ul>';
              echo '</div>';
              echo '<div data-role="collapsible">';
                echo '<h3>Designers</h3>';
                echo '<ul data-role="listview" data-inset="false">';
                  foreach($event->designers as $designer):
                    echo '<li>'.$designer.'</li>';
                  endforeach;
                echo '</ul>';
              echo '</div>';
            echo '</div>';

            echo '<div class="action-button-container body-padding text-center">';
              echo '<button class="btn btn-primary btn-full book-tickets-btn" onclick="navigatePage(\'booking.php?id='.$event->id.'\')">Book Tickets</button>';
              echo '<button class="btn btn-secondary directions-btn ui-btn-inline" onclick="navigatePage(\'get-directions.php?id='.$event->id.'\')">Get Directions</button>';
              echo '<button class="btn btn-outline favourites-btn ui-btn-inline" onclick="favourite('.$event->favourited.',\'events\',\''.$event->id.'\'); navigatePage(\'event-description.php?id='.$event->id.'\')">';    
                if ($event->favourited == 'true') {
                  echo '<i class="fa fa-heart-o"></i>Remove From Favourites';
                } else if ($event->favourited == 'false') {
                  echo '<i class="favourited fa fa-heart"></i>Add To Favourites';
                }
              echo '</button>';
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
      $('.event-slider').slick();
    });

    $(document).ready(function () {
      var defaultHeight = 40;
      var text = $(".event-description-text");
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
