<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Home | Westminster Fashion Week Festival 2019</title>

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
    <?php require './components/header.php'?><!-- /header -->
    <div role="main" class="overlay ui-content main-content intro-page">
      <div class="page-slider">
        <img src="assets/img/home/1.jpg" />
        <img src="assets/img/home/2.jpg" />
        <img src="assets/img/home/3.jpg" />
        <img src="assets/img/home/4.jpg" />
        <img src="assets/img/home/5.jpg" />
        <img src="assets/img/home/6.jpg" />
      </div>

      <div class="padded-content full-height">
        <div class="welcome-placeholder-container text-center">
          <h2>WELCOME</h2>
          <h6 class="description">Home to official Westminster Fashion Week Festival 2018. Catwalk shows, a series of inspiring talks by industry experts, exclusive events and curated shopping galleries,.
            Come and treat yourself to a VIP experience.</h6>
        </div>

        <!-- Event Cards -->
        <div class="card-grid-wrapper">
          <h3 class="text-center">LATEST EVENTS</h3>
          <div class="card-flex-container">
          <?php
            $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/events?filter[limit]=6";

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

              $events = json_decode($response, true);

              foreach($events as $event):
              ?>
              <div class="card" onclick="navigatePage('<?php echo 'event-description.php?id='.$event['id']; ?>')">
                <div class="card-thumbnail-container">
                  <div class="thumbnail">
                    <img src="<?php echo $event['thumbnail']; ?>" />
                  </div>
                </div>
                <div class="card-content-container">
                  <div class="card-heading"><?php echo $event['title']; ?></div>
                  <div class="card-description">
                    <div class="meta-1"><?php echo $event['date']; ?></div>
                    <div class="meta-2">
                      <i class="fa fa-location-arrow"></i>
                      <?php echo $event['location']; ?>
                    </div>
                    <div class="favourite-btn-container">
                      <?php 
                        if ($event['favourited'] == 'true') {
                          echo '<i class="favourited fa fa-heart"></i>';
                        } else if ($event['favourited'] == 'false') {
                          echo '<i class="fa fa-heart-o"></i>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
          </div>
          
          <div class="show-more-btn-container">
            <button class="btn btn-default btn-sm center-button show-more-btn" onclick="navigatePage('events.php')">Show more</button>
          </div>
        </div>
        <!-- /Event Cards -->

        <!-- Products Cards -->
        <div class="card-grid-wrapper">
          <h3 class="text-center">FEATURED PRODUCTS</h3>
          <div class="card-flex-container">
          <?php
            $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/products?filter[limit]=6";

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

              $products = json_decode($response, true);

              foreach($products as $product):
              ?>
              <div class="card" onclick="navigatePage('<?php echo 'product-description.php?id='.$product['id']; ?>')">
                <div class="card-thumbnail-container">
                  <div class="thumbnail">
                    <img src="<?php echo $product['thumbnail']; ?>" />
                  </div>
                </div>
                <div class="card-content-container">
                  <div class="card-heading"><?php echo $product['title']; ?></div>
                  <div class="card-description">
                    <div class="meta-1">£<?php echo $product['price']; ?></div>
                    <div class="meta-2">
                      <i class="fa fa-tag"></i>
                      <?php echo $product['category']; ?>
                    </div>
                    <div class="favourite-btn-container">
                      <?php 
                        if ($product['favourited'] == 'true') {
                          echo '<i class="favourited fa fa-heart"></i>';
                        } else if ($product['favourited'] == 'false') {
                          echo '<i class="fa fa-heart-o"></i>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
          </div>
          
          <div class="show-more-btn-container">
            <button class="btn btn-default btn-sm center-button show-more-btn" onclick="navigatePage('products.php')">Show more</button>
          </div>
        </div>
        <!-- /Product Cards -->


        <!-- News Cards -->
        <div class="card-grid-wrapper">
          <h3 class="text-center">HOT NEWS</h3>
          <div class="card-flex-container">
          <?php
            $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/news?filter[limit]=6";

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

              $news = json_decode($response, true);

              foreach($news as $newsItem):
              ?>
              <div class="card" onclick="navigatePage('<?php echo 'news-description.php?id='.$newsItem['id']; ?>')">
                <div class="card-thumbnail-container">
                  <div class="thumbnail">
                    <img src="<?php echo $newsItem['thumbnail']; ?>" />
                  </div>
                </div>
                <div class="card-content-container">
                  <div class="card-heading"><?php echo $newsItem['title']; ?></div>
                  <div class="card-description">
                    <div class="meta-1"><?php echo $newsItem['date']; ?></div>
                    <div class="meta-2">
                      <i class="fa fa-user"></i>
                      <?php echo $newsItem['author']; ?>
                    </div>
                    <div class="favourite-btn-container">
                      <?php 
                        if ($newsItem['favourited'] == 'true') {
                          echo '<i class="favourited fa fa-heart"></i>';
                        } else if ($newsItem['favourited'] == 'false') {
                          echo '<i class="fa fa-heart-o"></i>';
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
            <div class="card empty"></div>
          </div>
          
          <div class="show-more-btn-container">
            <button class="btn btn-default btn-sm center-button show-more-btn" onclick="navigatePage('news.php')">Show more</button>
          </div>
        </div>
        <!-- /News Cards -->

        <!-- Sponsors -->
        <div class="sponsor-logo-container">
          <div class="ui-grid-c sponsor-logo-grid breakpoint">
            <div class="ui-block-a"><img src="assets/img/sponsors/1.png" /></div>
            <div class="ui-block-b"><img src="assets/img/sponsors/2.png" /></div>
            <div class="ui-block-c"><img src="assets/img/sponsors/3.png" /></div>
            <div class="ui-block-d"><img src="assets/img/sponsors/4.png" /></div>
            <div class="ui-block-a"><img src="assets/img/sponsors/5.png" /></div>
            <div class="ui-block-b"><img src="assets/img/sponsors/6.png" /></div>
            <div class="ui-block-c"><img src="assets/img/sponsors/7.png" /></div>
            <div class="ui-block-d"><img src="assets/img/sponsors/8.png" /></div>
          </div><!-- /grid-c -->
        </div>
        <!-- /Sponsors -->

      </div>
      <?php require './components/footer.php'?><!--/footer -->
    </div><!-- /content -->  
  </div><!-- /page -->

  <script type="text/javascript">
    var breadcrumb = [
      {
        name: 'Home',
        href: 'index.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      if (!isLoggedIn()) {
        $('.favourite-btn-container').hide();
      }
    });

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
