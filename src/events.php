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
  <!-- inject:js -->
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
            <ul data-role="listview" data-split-icon="" data-split-theme="a" data-inset="true">
                        <li> 
                        <a href="event_description.php">
                          <img src="assets/img/images/gettyimages.jpg">
                          <h2>Hipster Fashion Catwalk</h2>
                          <p>Dec 10, 3.00 p.m</p>
                          <p><i class="fa fa-location-arrow"></i>King James Hall, Westminster University</p>
                          <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>  
                          </a>
                        </li>
                        <li>  
                        <a href="#" >
                          <img src="assets/img/images/gettyimages.jpg">
                            <h2>Trend Catwalk Show</h2>
                            <p>Dec 10, 5.00 p.m</p>
                            <p><i class="fa fa-location-arrow"></i>Queen Mary Hall, Westminster University</p>
                            <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>     
                          </a>  
                        </li>
                        <li>                          
                        <a href="#">
                          <img src="assets/img/images/gettyimages.jpg">
                            <h2>A talk on modern fashion</h2>
                            <p>Dec 11, 10.00 a.m</p>
                            <p><i class="fa fa-location-arrow"></i>Auditorium, Westminster University</p>
                            <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>    
                          </a>
                        </li>
                        <li>  
                        <a href="#">
                          <img src="assets/img/images/gettyimages.jpg">
                            <h2>Deluxe Fashion</h2>
                            <p>Dec 11, 1.00 p.m</p>
                            <p><i class="fa fa-location-arrow"></i>Open Arena, Westminster University</p>
                            <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>    
                          </a>
                        </li>
                        <li>  
                        <a href="#">
                          <img src="assets/img/images/gettyimages.jpg">
                            <h2>Fashion Show</h2>
                            <p>Dec 11, 3.00 p.m</p>
                            <p><i class="fa fa-location-arrow"></i>King James Hall, Westminster University</p>
                            <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>    
                          </a>
                        </li>
                        <li>                          
                        <a href="#">
                          <img src="assets/img/images/gettyimages.jpg">
                            <h2>A talk on modern fashion</h2>
                            <p>Dec 11, 5.00 p.m</p>
                            <p><i class="fa fa-location-arrow"></i>Auditorium, Westminster University</p>
                            <div class = "fav-class">
                            <i class="fa fa-heart-o"></i>
                        </div>    
                          </a>
                        </li>
            
            </ul>
        </div>
        
        </section>
  
      </div>
    </div><!-- /grid-a -->
  </div><!-- /content -->
  <?php require './components/footer.php'?><!--footer -->
</div><!-- page -->

<script async="" src="/browser-sync/browser-sync-client.2.11.1.js"></script>
</body>
</html>
