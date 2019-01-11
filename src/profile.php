<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Profile | Westminster Fashion Week Festival 2019</title>
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
  <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
  <div role="main" class="overlay ui-content main-content">
    <div class="ui-grid-a ui-responsive">
      <div class="ui-block-a">
                <div class="profile-image">
                <img src="assets/img/profile/tila.jpg">
          </div>
      </div>
      <div class="ui-block-b">
        <section class="right-section">
              <div class="desc-content">
                <h2 class="desc-title" style="font-size:18px;font-weight:bold;">Bindula Sagara</h2>
                <p class="desc-para">The 2010s have thus far been defined by hipster fashion, athleisure, a revival of
                  contribute back to the community.sssssss sssssssssssssa sssssss ssdsdasdasd asdasdassda scdsac
                  sasa sdhksd sdasldksad  skldadasdk  sdjkasd asdhasld sd sjkdsajdksad ksdsa. 
                </p>
                <div class = "ui-content events_body rebdytrndng">
      <div class="tab_body">
        <div class="profile-content">
            <ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true">
                        <li class="profile-content-list">  
                        <div class="current-position">
                            <h2>Current Position</h2>
                            <div class="trophy-icon">
                            <i class="fa fa-trophy"></i>
                            </div>
                            <h3>2</h3>
                        </div>

                        <div class="total-points">
                            <h2>Total Points</h2>
                            <h3>80</h3>
                        </div>
                        </li>
            </ul>
            <div>
            <button id="mc-embedded-favourites" class="view-favourites-btn" name="view-favourites" type="submit">
                        <b>View Favourites</b>
                      </button>
            </div>
            <div>
            <button id="mc-embedded-tasks" class="view-tasks-btn" name="view-tasks" type="submit" onclick="location.href='tasks.php'">
                        <b>View Tasks</b>
                      </button>
           </div>  
           <div>
            <button id="mc-embedded-game" class="join-game-btn" name="join-game" type="submit">
                        <b>Join Game</b>
                      </button>
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
<script type="text/javascript">
    var breadcrumb = [
      {
        name: 'Profile',
        href: 'profile.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
<script async="" src="/browser-sync/browser-sync-client.2.11.1.js"></script>
</body>
</html>