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
<div data-role="page">
  <?php require './components/sidebar.php'?><!-- /panel -->
  <?php require './components/header.php'?><!-- /header -->
  <div role="main" class="overlay ui-content main-content">
    <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
    <?php require './components/footer.php'?><!--/footer -->
  </div><!-- /page -->

  <script type="text/javascript">
    var breadcrumb = [
      {
        name: 'Home',
        href: 'index.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
</body>
</html>
