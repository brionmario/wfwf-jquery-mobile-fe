<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <meta name="author" content="Thisura Sagara">
  <title>Gane | Westminster Fashion Week Festival 2019</title>
 
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
    <div role="main" class="overlay ui-content main-content page-description about-page">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div class="description-container">
        <img src="assets/img/about/1.jpg" />
      </div>
      <div class="ui-grid-a ui-responsive">
        <div class="ui-block-solo">
          <div class="page-description-container body-padding text-center">
            <h2 class="page-title">WESMINSTER FASHION WEEK FESTIVAL</h2>
            <p class="page-description-text">
            The time of the fashion enthusiasts has returned. The Westminster Fashion Week Festival be held from 10th to 16th December 2018. This year the festival is bound to be majestic with an arsenal of over 150 world renowned models and designers taking part. A bigger variety and diversity can be expected from the festival which has been known over the years for its rich products. The international element of the festival notes that the doors to Westminster are truly open, with designers showcasing from countries including Australia, China, Dubai, Europe and South Korea. The pull of London on a global scale is undeniable. The UK continues to be an attractive and fertile home for an array of designer businesses of any size. Showcasing in the highly curated Designer Showrooms allows brands to develop lasting relationships with globally influential stores, enterprises and helps to increase their exposure to top international journalists, publications and stylists. In addition to this, designers will also gain access to seasonal press and buyer accreditation lists as well as a pre-show business seminars. The fashion enthusiast public on the other hand will receive a grandeur exposure to the pinnacle of global fashion.
            </p>
            <button class="btn btn-default btn-sm show-more-btn center-button">Show More</b></button>
          </div>
          <hr class="hr" data-content="Share on">
          <div class="social-icon-container text-center">
            <div class="social-icons">
              <ul>
                <li><a href="https://www.facebook.com/apareciumlabs/" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="https://twitter.com/apareciumlabs" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                <li><a href="https://instagram.com/apareciumlabs" target="_blank"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://youtube.com/apareciumlabs" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
              </ul>
            </div>
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
      $('.page-slider').slick({
        // dots: true
      });
    });

    $(document).ready(function () {
      var defaultHeight = 40;
      var text = $(".page-description-text");
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
