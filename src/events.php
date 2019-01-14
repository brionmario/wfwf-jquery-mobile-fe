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
                  <input class="form-control" id="filter-input" data-type="search" placeholder="Search Events">
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
            $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/events";

            if ($_GET['sort'] != '' && $_GET['sort_order'] != '') {
              $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/events?filter[order]={$_GET['sort']}%20{$_GET['sort_order']}";
            }

            if ($_GET['filter'] != '' && $_GET['filter_value'] != '') {
              $url = "https://westminster-fashion-week-api.herokuapp.com/api/v1/events?filter[where][{$_GET['filter']}]={$_GET['filter_value']}";
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

              $events = json_decode($response, true);

              foreach($events as $event):
              ?>
              
              <li class="list-item card">
                <a class="content" href="<?php echo 'event-description.php?id='.$event['id']; ?>" rel="external">
                  <img src="<?php echo $event['thumbnail']; ?>">
                  <h2><?php echo $event['title']; ?></h2>
                  <p><?php echo $event['date']; ?></p>
                  <p class="location"><i class="fa fa-location-arrow"></i><?php echo $event['location']; ?></p>
                </a>
                <a class="fav-btn" href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop" onclick="favourite(<?php echo $event['favourited']; ?>, 'events','<?php echo $event['id']; ?>')">Add to favourites</a>
                <div class = "heart-icon-container">
                  <?php 
                    if ($event['favourited'] == 'true') {
                      echo '<a href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop" onclick="favourite('.$event['favourited'].',\'events\',\''.$event['id'].'\')"><i class="favourited fa fa-heart"></i></a>';
                    } else if ($event['favourited'] == 'false') {
                      echo '<a href="#add-remove-favourite" data-rel="popup" data-position-to="window" data-transition="pop" onclick="favourite('.$event['favourited'].',\'events\',\''.$event['id'].'\')"><i class="fa fa-heart-o"></i></a>';
                    }
                  ?>
                </div>
              </li>
              <?php endforeach; 
            
            echo ' <div class="fabs">';
              echo '<a id="prime" class="fab" href="#send-email-event" data-rel="popup" data-position-to="window" data-transition="pop"><i class="fa fa-envelope-o"></i></a>';
            echo '</div>';

        echo '</ul>';

            echo '<!-- /success popup email send -->';
            echo '<div data-role="popup" id="send-email-event" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">';
              echo '<form action="events.php" method="post">';
                echo '<h3>Email Event List</h3>';
                foreach($events as $list):?>
                  <ol>
                    <li><?php echo $list['title']; ?></li>
                  </ol>
                <?php endforeach; 
                echo ' <input type="email" name="email" placeholder="Email">';
                echo ' <img class="check-mark" src="assets/img/check-mark-circular.svg" />';
                echo '<input class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" type="submit" value="Send Email" name="send"/>';
              echo '</form>';
            echo ' </div>';    

            require 'lib/PHPMailerAutoload.php';
            if(isset($_POST['send']))
                {

                  $eventList = [];

                  for($i=0; $i < sizeof($events); $i++) {
                    $eventList[$i] = $i+1 .". ".$events[$i]['title'];
                  }

                  $test = implode("<br>",$eventList);
              
                  $email = $_POST['email'];                    

                  $mail = new PHPMailer;

                  $mail->isSMTP();

                  $mail->Host = 'smtp.gmail.com';

                  $mail->Port = 587;

                  $mail->SMTPSecure = 'tls';

                  $mail->SMTPAuth = true;

                  $mail->Username = 'westministerfashionweek@gmail.com';

                  $mail->Password = 'wfwf1234';

                  $mail->setFrom('westministerfashionweek@gmail.com', 'Event List');

                  $mail->addAddress($email);

                  $mail->Subject = 'Westminister Fashion Week Event List';

                  $mail->msgHTML($test);

                  if (!$mail->send()) {
                     $error = "Mailer Error: " . $mail->ErrorInfo;
                      ?><script>alert('<?php echo $error ?>');</script><?php
                  } 
                  else {
                     echo '<script>alert("Message sent!");</script>';
                  }
             }
        ?>
        <!-- /success popup -->
        <div data-role="popup" id="add-remove-favourite" data-theme="a" data-overlay-theme="b" class="popup text-center success-popup">
          <h3>Success!</h3>
          <p>Favourites list has been successfully updated</p>
          <img class="check-mark" src="assets/img/check-mark-circular.svg" />
          <a data-rel="back" class="btn btn-success ui-shadow ui-btn ui-corner-all ui-btn-b ui-mini" onclick="navigatePage('events.php')">Continue</a>
        </div>

        <!-- /filter popup -->
        <div data-role="popup" id="filter-popup" data-theme="a" data-overlay-theme="b" class="popup filter-popup">
          <div class="filter-popup-inner">
            <h3>Filter</h3>
            <div class="sort-block">
              <h5>Sort by</h5>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('events.php?sort=date&sort_order=DESC')">Latest</button>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('events.php?sort=title&sort_order=ASC')">A-Z</button>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('events.php?sort=title&sort_order=DESC')"> Z-A</button>
            </div>
            <div class="filter-block">
              <h5>Filter by</h5>
              <button class="btn btn-default btn-sm inline-block" onclick="navigatePage('events.php?filter=favourited&filter_value=true')">Favourited</button>
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
        name: 'Events',
        href: 'events.php'
      }
    ];
    setBreadcrumb(breadcrumb);

    $(document).ready(function(){
      if (!isLoggedIn()) {
        $('.heart-icon-container').hide();
        $('.filter-block').hide();
      }
    });
  </script>
</body>
</html>
