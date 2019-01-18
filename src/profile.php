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

  <!-- inject:js -->
  <!-- endinject -->
</head>

<body>
<div data-role="page">
  <?php require './components/sidebar.php'?><!-- /panel -->
  <?php require './components/header.php'?><!-- header -->
  <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
  <div role="main" class="overlay ui-content main-content profile-page">
    <div class="ui-grid-a ui-responsive breakpoint">
    <?php
        $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/users/{$_GET['id']}";
        
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

        $user = json_decode($response);

        echo '<div class="ui-block-a breakpoint-a">
        <div class="profile-image">
          <img src="assets/img/default-avatar.png" />
        </div>
        <h2 class="desc-title text-uppercase text-center">'.$user->displayName.'</h2>
        <h5 class="desc-para text-center">'.$user->email.'</h5>
      </div>
      <div class="ui-block-b breakpoint-b">
        <section class="profile-right-side">
          <div class="desc-content">
            <div class = "ui-content events_body">
              <div class="tab_body">
                <div class="profile-content">
                  <ul data-role="listview" data-split-icon="gear" data-split-theme="a" data-inset="true">
                    <li class="profile-content-list">
                      <div class="ui-grid-a">
                        <div class="ui-block-a">
                          <div class="current-position">
                            <h2>Current Position</h2>
                            <h3><i class="fa fa-trophy"></i>'.$user->position.'</h3>
                          </div>
                        </div>
                        <div class="ui-block-b">
                          <div class="total-points">
                            <h2>Total Points</h2>
                            <h3>'.$user->score.'</h3>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                <div>
            
                <button class="btn btn-primary" onclick="routeWithId(\'favourites.php\')">View Favourites</button>
                <button class="btn btn-default" onclick="routeWithId(\'tasks.php\')">View Tasks</button>
                <button class="btn btn-secondary" onclick="routeWithId(\'game.php\')">Join Game</button>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div><!-- /grid-a -->';
    ?>
  </div><!-- /content -->
  <?php require './components/footer.php'?><!--footer -->
</div><!-- page -->
<script type="text/javascript">
    var userID = getUserID();
    var breadcrumb = [
      {
        name: 'Home',
        href: 'index.php'
      },
      {
        name: 'Profile',
        href: `profile.php?id=${userID}`
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
</body>
</html>