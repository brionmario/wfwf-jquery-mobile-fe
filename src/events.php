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
          <li class="list-item card">
            <a class="content" href="event-description.php" rel="external">
              <img src="assets/img/default-image-placeholder.png">
              <h2>Hipster Fashion Catwalk</h2>
              <p>Dec 10, 3.00 p.m</p>
              <p class="location"><i class="fa fa-location-arrow"></i>King James Hall, Westminster University</p>
            </a>
            <a  class="fav-btn" href="#favourites" data-rel="popup" data-position-to="window" data-transition="pop">Add to favourites</a>
            <div class = "heart-icon-container">
                <a href="#favourites" data-rel="popup" data-position-to="window" data-transition="pop"><i class="fa fa-heart-o"></i></a>
            </div>
          </li>

          <li class="list-item card">
            <a class="content" href="#">
              <img src="assets/img/default-image-placeholder.png">
              <h2>Hipster Fashion Catwalk</h2>
              <p>Dec 10, 3.00 p.m</p>
              <p class="location"><i class="fa fa-location-arrow"></i>King James Hall, Westminster University</p>
            </a>
            <a  class="fav-btn" href="#favourites" data-rel="popup" data-position-to="window" data-transition="pop">Add to favourites</a>
            <div class = "heart-icon-container">
                <a href="#favourites" data-rel="popup" data-position-to="window" data-transition="pop"><i class="fa fa-heart-o"></i></a>
            </div>
          </li>
        </ul>
        <div data-role="popup" id="favourites" data-theme="a" data-overlay-theme="b" class="" style="max-width:500px; padding: 0.8em 2em !important;">
          <h3>Success!</h3>
          <p>The item is added to favourites.</p>
          <a href="index.html" data-rel="back" class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini">Continue</a>
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
