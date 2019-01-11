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
<div data-role="page" id="events">
  <?php require './components/sidebar.php'?><!-- /panel -->
  <?php require './components/header.php'?><!-- header -->
   <div role="main" class="overlay ui-content main-content">
      <div  class="ui-content events_body rebdytrndng">
      <div class="tab_body">
        <div class="listCont events_list reEvents">
            <ul data-role="listview” data-insert="true" class="ui-listview ui-listview-inset ui-corner-all ui-shadow">
                        <li class="ui-li-static ui-body-inherit ui-first-child" >  
                        <div class="event_image">
                        <a href="event_description.php"  class="ui-li-icon">
                          <img src="assets/img/images/gettyimages.jpg">
                        </a>
                        </div>
                        <div class="event_desc">
                            <a href="event_description.php">
                            <h2>Hipster Fashion Catwalk</h2>
                            <p>Dec 10, 3.00 p.m</p>
                            <p class="event_loaction"><img src ="assets/icons/ui_icon/location-arrow.png"/>King James Hall, Westminster University</p>
                            </a>
                        </div>
                        <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>  
                        </li>
                        <li class="ui-li-static ui-body-inherit ui-first-child" >  
                        <div class="event_image">
                        <a href="#"  class="ui-li-icon">
                          <img src="assets/img/images/gettyimages.jpg">
                        </a>
                        </div>
                        <div class="event_desc">
                            <a href="">
                            <h2>Trend Catwalk Show</h2>
                            <p>Dec 10, 5.00 p.m</p>
                            <p class="event_loaction"><img src ="assets/icons/ui_icon/location-arrow.png"/>Queen Mary Hall, Westminster University</p>
                            </a>
                        </div>
                        <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>   
                        </li>
                        <li class="ui-li-static ui-body-inherit ui-first-child" >  
                        <div class="event_image">
                        <a href="#"  class="ui-li-icon">
                          <img src="assets/img/images/gettyimages.jpg">
                        </a>
                        </div>
                        <div class="event_desc">
                            <a href="">
                            <h2>A talk on modern fashion</h2>
                            <p>Dec 11, 10.00 a.m</p>
                            <p class="event_loaction"><img src ="assets/icons/ui_icon/location-arrow.png"/>Auditorium, Westminster University</p>
                            </a>
                        </div>
                        <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>  
                        </li>
                        <li class="ui-li-static ui-body-inherit ui-first-child" >  
                        <div class="event_image">
                        <a href="#"  class="ui-li-icon">
                          <img src="assets/img/images/gettyimages.jpg">
                        </a>
                        </div>
                        <div class="event_desc">
                            <a href="">
                            <h2>Deluxe Fashion</h2>
                            <p>Dec 11, 1.00 p.m</p>
                            <p class="event_loaction"><img src ="assets/icons/ui_icon/location-arrow.png"/>Open Arena, Westminster University</p>
                            </a>
                        </div>
                        <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>   
                        </li>
                        <li class="ui-li-static ui-body-inherit ui-first-child" >  
                        <div class="event_image">
                        <a href="#"  class="ui-li-icon">
                          <img src="assets/img/images/gettyimages.jpg">
                        </a>
                        </div>
                        <div class="event_desc">
                            <a href="">
                            <h2>Fashion Show</h2>
                            <p>Dec 11, 3.00 p.m</p>
                            <p class="event_loaction"><img src ="assets/icons/ui_icon/location-arrow.png"/>King James Hall, Westminster University</p>
                            </a>
                        </div>
                        <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>  
                        </li>
                        <!-- <li><a href="#"><img src="assets/img/images/gettyimages.jpg" class="ui-li-icon">Dogs </a></li>
                        <li><a href="#"><img src="assets/img/images/gettyimages.jpg" class="ui-li-icon">Cows </a></li>
                         <li data-role="list-divider">Zoo animals</li>
                        <li><a href="#"><img src="images/elephant.png" class="ui-li-icon">Elephant </a></li>
                        <li><a href="#">Tigers</a></li>
                       <li><a href="#">Giraffes</a></li> -->
            </ul>
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
