<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Thisura Sagara">
  <title>Join Game | Westminster Fashion Week Festival 2019</title>
 
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
    <div role="main" class="overlay ui-content main-content page-description join-game-page">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div class="game-description-container padded-content">
        <h3 class="title">Game Description</h3>
        <div class="task-decription-container">
          <div class="ui-grid-a">
            <div class="ui-block-a">
              <img src="assets/img/products/1_thumb.jpg" />
            </div>
            <div class="ui-block-b">
              <h5 class="game-description-text">A daily challenge was made available for all users. The objective was figure out the product displayed in the challenge specification and to find the actual product and scan its QR code. The most successful were eligible for exclusive rewards. This was done in order to enhance the user activity with application and with the products. This also acts as promotion for certain products.</h5>
              <button class="btn btn-default btn-sm show-more-btn">Show More</b></button>
            </div>
          </div><!-- /ui-grid-a -->

          <?php
          $url_user = "https://westminster-fashion-week-api.herokuapp.com/api/v1/users/{$_GET['id']}";
          $url_users = "https://westminster-fashion-week-api.herokuapp.com/api/v1/users?filter[order]=score%20DESC";
          
          $curl1 = curl_init();
          curl_setopt_array($curl1, array(
            CURLOPT_URL => $url_user,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "cache-control: no-cache"
              ),
            ));

          $response1 = curl_exec($curl1);
          $err1 = curl_error($curl1);
          curl_close($curl1);

          $curl2 = curl_init();
          curl_setopt_array($curl2, array(
            CURLOPT_URL => $url_users,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "cache-control: no-cache"
              ),
            ));

          $response2 = curl_exec($curl2);
          $err2 = curl_error($curl2);
          curl_close($curl2);

          $user = json_decode($response1);
          $users = json_decode($response2);

          $completedTaskCount = 0;
          $pendingTaskID = 1;

          foreach ($user->tasks as $key=>$task) {
            if ($task->completed === true) {
              $completedTaskCount++;
            }
            if ($task->completed === false) {
              $pendingTaskID = $key;
              break;
            }
          }

          echo '<div class="task-status-container">';
          if ($completedTaskCount === 7) {
            echo '<h5 class="todays-task">Congratulations! You have completed all the tasks.</h5>';
            echo '<button class="btn btn-sm disabled">Scan QR</button>';
          } else {
            echo '<h5 class="todays-task">Today\'s Task - '.$user->tasks[$pendingTaskID]->description.'</h5>';
            echo '<button class="btn btn-primary btn-sm" onclick="routeWithIdAtEnd(\'scan-qr.php?taskID='.$user->tasks[$pendingTaskID]->id.'&taskName='.$user->tasks[$pendingTaskID]->name.'\')">Scan QR</button>';
          }
          echo '</div>';

          echo '<div class="leaderbaord-container">';
            echo '<h3 class="title">Leaderboard</h3>';
            echo '<div class="list-wrapper">';
              echo '<ul class="list" data-role="listview" data-split-icon="" data-split-theme="a" data-inset="true">';
              foreach($users as $key=>$user) {
                echo '<li class="list-item card">';
                  echo '<div class="task-block float-left">';
                    echo '<h2>'.$user->displayName.'</h2>';
                    echo '<p>'.$user->score.'&ensp;Points</p>';
                    echo '<h1 class="position">'.($key + 1).'</h1>';
                  echo '</div>';
                echo '</li>';
              }
              echo '</ul>';
            echo '</div>';
          echo '</div>';

          ?>
          
        </div><!-- /task-decription-container -->
      </div><!-- /game-description-container -->
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
      },
      {
        name: 'Join the Game',
        href: `game.php?id=${userID}`
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.page-slider').slick({
        // dots: true
      });
    });

    $(document).ready(function () {
      var defaultHeight = 110;
      var text = $(".game-description-text");
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
