<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>jQuery Mobile Seed by Aparecium Labs</title>
  <!-- Favicon Package -->
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/icons/favicon_package/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="./assets/icons/favicon_package/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/icons/favicon_package/favicon-16x16.png">
  <link rel="manifest" href="./assets/icons/favicon_package/site.webmanifest">
  <link rel="mask-icon" href="./assets/icons/favicon_package/safari-pinned-tab.svg" color="#5bbad5">
  <!-- inject:css -->
  
  <!-- endinject -->
</head>

<body>
<div data-role="page">
  <?php require './components/sidebar.php'?><!-- /panel -->
  <?php require './components/header.php'?><!-- header -->
  <div role="main" class="overlay ui-content main-content">
    <div class="ui-grid-a ui-responsive">
      <div class="ui-block-a">
                <div class="event-image">
                <img src="assets/img/images/london_fashion_week_4.jpg">
          </div>
      </div>
      <div class="ui-block-b">
        <section class="right-section">
              <div class="desc-content">
                <h2 class="desc-title" style="font-size:18px;font-weight:bold;">Hipster Fashion Catwalk</h2>
                <p class="desc-para">The 2010s have thus far been defined by hipster fashion, athleisure, a revival of
                  contribute back to the community.
                  <button id="mc-embedded-subscribe" class="subscribe-btn" name="subscribe" type="submit">
                        <b>Show More</b>
                      </button>
                </p>
                <div class = "ui-content events_body rebdytrndng">
      <div class="tab_body">
        <div class="listCont events_list reEvents">
            <ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true">
                        <li>  
                            <a href="">
                            <h2>Models</h2>
                            </a>
                        </li>
                        <li>  
                            <a href="">
                            <h2>Designers</h2>
                            </a>
                        </li>
            </ul>
            <div>
            <button id="mc-embedded-subscribe" class="book-tickets-btn" name="book-tickets" type="submit">
                        <b>Book Tickets</b>
                      </button>
            </div>
            <div>
            <button id="mc-embedded-subscribe" class="get-directions-btn" name="get-directions" type="submit">
                        <b>Get Directions</b>
                      </button>
                      <div class = "fav-class-desc-page">
                            <i class="fa fa-heart-o"></i>
                        </div>
                        </div>  
                          
            
        </div>
        
        
        </section>
      </div>
    </div><!-- /grid-a -->
  </div><!-- /content -->
  <?php require './components/footer.php'?><!--footer -->
</div><!-- page -->
<!-- inject:js -->
<!-- endinject -->
<script async="" src="/browser-sync/browser-sync-client.2.11.1.js"></script>
</body>
</html>
