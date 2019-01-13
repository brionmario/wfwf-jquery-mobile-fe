<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Brion Silva">
  <title>Get Directions | Westminster Fashion Week Festival 2019</title>
 
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
    <?php require './components/header.php'?><!-- /header -->
    <div role="main" class="overlay ui-content main-content directions-page">
        <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
        <div id="map" class="google-map"></div>
    </div>
</div>

<?php
    $id = $_GET['id'];
    $lon = -0.141086; // defaults to westminster university
    $lat = 51.520692; // defaults to westminster university

    if (($_GET['lat'] == '' || $_GET['lat'] == NULL) && ($_GET['lon'] == '' || $_GET['lon'] == NULL)) {
        $lon = -$_GET['lon'];
        $lat = $_GET['lat'];
    }

    echo'<script type="text/javascript">var breadcrumb = [{name: \'Directions\',href: \'get-directions.php?id='.$id.'\'}];setBreadcrumb(breadcrumb);</script>';
    echo '<script>function initMap() {var location = {lat:'.$lat.', lng:'.$lon.'};var map = new google.maps.Map(document.getElementById(\'map\'), {zoom: 17, center: location});var marker = new google.maps.Marker({position: location, map: map});}</script>';
?>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYqG3QmAKCWHw5E5Z19jvNPjnqaFBOPDA&callback=initMap"
    async defer></script>
</body>
</html>
