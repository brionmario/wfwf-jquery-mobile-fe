<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Tasks | Westminster Fashion Week Festival 2019</title>
  
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
  <div role="main" class="overlay ui-content main-content">
    <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
    <div class="list-wrapper">
      <ul class="list" data-role="listview" data-split-icon="" data-split-theme="a" data-inset="true">
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

        foreach ($user->tasks as $key=>$task) {
          if ($task->completed === true) {
            echo '<li class="list-item card">
              <div class="task-block float-left">
                <h2>Day '.($key+1).' Task</h2>
                <p>Score 10</p>
              </div>
              <button class="btn btn-success btn-sm float-right" style="width: 90px !important;">Completed</button>
            </li>';
          } else {
            echo '<li class="list-item card">
              <div class="task-block float-left">
                <h2>Day '.($key+1).' Task</h2>
                <p>Score 0</p>
              </div>
              <button class="btn btn-warning btn-sm float-right" style="width: 90px !important;">Pending</button>
            </li>';
          }
        }
        ?>
      </ul>
    </div>
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
        name: 'Tasks',
        href: `tasks.php?id=${userID}`
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
</body>
</html>
