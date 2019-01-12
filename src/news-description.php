<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>News Description | Westminster Fashion Week Festival 2019</title>
 
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
      echo '<div role="main" class="overlay ui-content main-content page-description">';
        require './components/breadcrumb.php';

        $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/news/{$_GET['id']}";
        
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

        $news = json_decode($response);

        echo '<div class="news-slider">';
          foreach($news->imageSlider as $image):
            echo '<img src="'.$image.'" />';
          endforeach;
        echo '</div>';
        echo '<div class="ui-grid-a ui-responsive">';
          echo '<div class="ui-block-solo">';
            echo '<div class="page-description-container body-padding text-center">';
              echo '<h2 class="page-title">'.$news->title.'</h2>';
              echo '<p class="page-description-text">'.$news->description.'</p>';
              echo '<button class="btn btn-default btn-sm show-more-btn center-button">Show More</b></button>';
            echo '</div>';

            echo '<div class="action-button-container body-padding text-center">';
              echo '<button class="btn btn-secondary directions-btn" onclick="navigatePage(\'get-directions.php?id='.$news->id.'\')">Get Directions</button>';
              echo '<button class="btn btn-outline favourites-btn ui-btn-inline" onclick="favourite('.$news->favourited.',\'news\',\''.$news->id.'\'); navigatePage(\'news-description.php?id='.$news->id.'\')">';    
                if ($news->favourited == 'true') {
                  echo '<i class="fa fa-heart-o"></i>Remove From Favourites';
                } else if ($news->favourited == 'false') {
                  echo '<i class="favourited fa fa-heart"></i>Add To Favourites';
                }
              echo '</button>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
      echo '</div>';
      require './components/footer.php';
    echo '</div>';

  echo'<script type="text/javascript">var breadcrumb = [{name: \'Home\',href: \'index.php\'},{name: \'News\',href: \'news.php\'},{name: \''.$news->title.'\',href: \'news-description.php?id='.$news->id.'\'}];setBreadcrumb(breadcrumb);</script>';
  ?>
  
  <script type="text/javascript">
    $(document).ready(function(){
      $('.page-slider').slick();
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
