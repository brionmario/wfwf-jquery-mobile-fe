<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Thisura Sagara">
  <title>About | Westminster Fashion Week Festival 2019</title>
 
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
  <div data-role="page" class="about">
    <?php require './components/sidebar.php'?><!-- /panel -->
    <?php require './components/header.php'?><!-- header -->
    <div role="main" class="overlay ui-content main-content about">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div class="about-slider">
        <img src="assets/img/about/about-image.jpg" />
      </div>
      <div class="ui-grid-a ui-responsive">
        <div class="ui-block-solo">
          <div class="event-description-container body-padding text-center">
            <h2 class="event-title">
              WESMINSTER FASHION WEEK FESTIVAL
            </h2>
            <p class="event-description-text">
            Checks, plaids and tartans have been adopted by musical subcultures for decades, from punk to grunge or hip-hop. For a preppier take on the tartan look, think Cher Horowitz in 90s classic Clueless, teaming mini kilts with mohair knits and cropped jackets.Mix and match clashing checks in bright colours – orange, purple, blue and yellow – and dress them up as tailored separates and outerwear, or down by teaming them with denim and oversized pieces.
            </p>
          </div>
          <hr class="hr-text" data-content="Share on">
          <div class="social-icons">
            <ul>
              <li><a href="https://www.facebook.com/apareciumlabs/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
              <li><a href="https://twitter.com/apareciumlabs" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
              <li><a href="https://instagram.com/apareciumlabs" target="_blank"><i class="fa fa-instagram"></i></a></li>
              <li><a href="https://youtube.com/apareciumlabs" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
            </ul>
          </div>
        </div><!-- /ui-block -->
      </div><!-- /grid-a -->
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
        name: 'About',
        href: 'about.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.about-slider').slick();
    });

    
  </script>
</body>
</html>
