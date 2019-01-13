<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Points of Interests | Westminster Fashion Week Festival 2019</title>

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
    <?php require './components/header.php'?><!-- header -->
    <div role="main" class="overlay ui-content main-content list-page">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div class="filter-panel">
        <div class="ui-grid-a breakpoint">
          <div class="ui-block-a">
            <div class="ui-bar ui-bar-a">
              <div class="filter-input-container">
                <form class="ui-filterable">
                  <input class="form-control" id="filter-input" data-type="search" placeholder="Search Points of Interests">
                </form>
              </div>
            </div>
          </div>
          <div class="ui-block-b">
            <div class="ui-bar ui-bar-a">
              <div class="filter-btn-container">
                <a href="#filter-popup" data-rel="popup" data-position-to="#footer" data-transition="slideup"><button class="btn btn-primary btn-sm filter-btn"><i class="fa fa-sliders"></i><span>Filter</span></button></a>
              </div>
            </div>
          </div>
        </div><!-- /grid-a -->
      </div>
      <div class="list-wrapper">
        <ul class="list" data-role="listview" data-split-icon="gear" data-split-theme="a" data-input="#filter-input" data-inset="true" data-filter="true">
          <?php
            $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/poi";

            if ($_GET['sort'] != '' && $_GET['sort_order'] != '') {
              $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/poi?filter[order]={$_GET['sort']}%20{$_GET['sort_order']}";
            }

            if ($_GET['filter'] != '' && $_GET['filter_value'] != '') {
              $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/poi?filter[where][{$_GET['filter']}]={$_GET['filter_value']}";
            }

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

              $poi = json_decode($response, true);

              foreach($poi as $poiItem):
              ?>
              
              <li class="list-item card">
                <a class="content" href="<?php echo 'poi-description.php?id='.$poiItem['id']; ?>" rel="external">
                  <img src="<?php echo $poiItem['thumbnail']; ?>">
                  <h2><?php echo $poiItem['title']; ?></h2>
                  <p><?php echo $poiItem['interests']; ?></p>
                  <p class="location"><i class="fa fa-map-marker"></i><?php echo $poiItem['location']; ?></p>
                </a>
                <a class="fav-btn" href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop" onclick="favourite(<?php echo $poiItem['favourited']; ?>, 'poi','<?php echo $poiItem['id']; ?>')">Add to favourites</a>
                <div class = "heart-icon-container">
                  <?php 
                    if ($poiItem['favourited'] == 'true') {
                      echo '<a href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop" onclick="favourite('.$poiItem['favourited'].',\'poi\',\''.$poiItem['id'].'\')"><i class="favourited fa fa-heart"></i></a>';
                    } else if ($poiItem['favourited'] == 'false') {
                      echo '<a href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop" onclick="favourite('.$poiItem['favourited'].',\'poi\',\''.$poiItem['id'].'\')"><i class="fa fa-heart-o"></i></a>';
                    }
                  ?>
                </div>
              </li>
            <?php endforeach; ?>
            
        </ul>

        <!-- /success popup -->
        <div data-role="popup" id="add-remove-favourite" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
          <h3>Success!</h3>
          <p>Favourites list has been successfully updated</p>
          <img class="check-mark" src="assets/img/check-mark-circular.svg" />
          <a data-rel="back" class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" onclick="navigatePage('poi.php')">Continue</a>
        </div>

        <!-- /filter popup -->
        <div data-role="popup" id="filter-popup" data-theme="a" data-overlay-theme="b" class="popup filter-popup">
          <div class="filter-popup-inner">
            <h3>Filter</h3>
            <div class="sort-block">
              <h5>Sort by</h5>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('poi.php?sort=interests&sort_order=ASC')">Interests</button>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('poi.php?sort=title&sort_order=ASC')">A-Z</button>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('poi.php?sort=title&sort_order=DESC')"> Z-A</button>
            </div>
            <div class="filter-block">
              <h5>Filter by</h5>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('poi.php?filter=favourited&filter_value=true')">Favourited</button>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('poi.php?filter=poiType&filter_value=auditorium')">Auditoriums</button>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('poi.php?filter=poiType&filter_value=hall')">Hall</button>
            </div>
          </div>
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
        name: 'POI',
        href: 'poi.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
</body>
</html>
