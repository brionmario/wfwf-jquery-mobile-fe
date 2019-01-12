<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Events | Westminster Fashion Week Festival 2019</title>

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
  <div data-role="page" id="events">
    <?php require './components/sidebar.php'?><!-- /panel -->
    <?php require './components/header.php'?><!-- header -->
    <div role="main" class="overlay ui-content main-content">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div class="filter-panel">
        <div class="ui-grid-a breakpoint">
          <div class="ui-block-a">
            <div class="ui-bar ui-bar-a">
              <div class="filter-input-container">
                <form class="ui-filterable">
                  <input class="form-control" id="filter-input" data-type="search" placeholder="Search Events">
                </form>
              </div>
            </div>
          </div>
          <div class="ui-block-b">
            <div class="ui-bar ui-bar-a">
              <div class="filter-btn-container">
                <button class="btn btn-primary btn-sm filter-btn"><i class="fa fa-sliders"></i><span>Filter</span></button>
              </div>
            </div>
          </div>
        </div><!-- /grid-a -->
      </div>
      <div class="list-wrapper">
        <ul class="list" data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true">
          <?php
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://westminster-fashion-week-api.herokuapp.com/api/v1/events",
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
              
              <li class="list-item card">
                <a class="content" href="event-description.php" rel="external">
                  <img src="<?php echo $event['thumbnail']; ?>">
                  <h2><?php echo $event['title']; ?></h2>
                  <p><?php echo $event['date']; ?></p>
                  <p class="location"><i class="fa fa-location-arrow"></i><?php echo $event['location']; ?></p>
                </a>
                <a  class="fav-btn" href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop">Add to favourites</a>
                <div class = "heart-icon-container">
                  <?php 
                    if ($event['favourited'] == true) {
                      echo '<a href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop"><i class="favourited fa fa-heart"></i></a>';
                    } else {
                      echo '<a href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop"><i class="fa fa-heart-o"></i></a>';
                    }
                  ?>
                </div>
              </li>

            <?php endforeach; ?>
        </ul>
        <div data-role="popup" id="add-remove-favourite" data-theme="a" data-overlay-theme="b" class="popup text-center">
          <h3>Event Favourited</h3>
          <p>The event has been successfully added to your favourites list</p>
          <img class="check-mark" src="assets/img/check-mark-circular.svg" />
          <a data-rel="back" class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini">Continue</a>
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
        name: 'Events',
        href: 'events.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
</body>
</html>
