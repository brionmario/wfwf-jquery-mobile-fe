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
    <?php require './components/header.php'?><!-- header -->
    <div role="main" class="overlay ui-content main-content event-description">
      <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
      <div class="event-slider">
        <img src="assets/img/events/1.jpg" />
        <img src="assets/img/events/2.jpg" />
      </div>
      <div class="ui-grid-a ui-responsive">
        <div class="ui-block-solo">
          <div class="event-description-container body-padding text-center">
            <h2 class="event-title">
              Hipster Fashion Catwalk
            </h2>
            <p class="event-description-text">
            Checks, plaids and tartans have been adopted by musical subcultures for decades, from punk to grunge or hip-hop. For a preppier take on the tartan look, think Cher Horowitz in 90s classic Clueless, teaming mini kilts with mohair knits and cropped jackets.Mix and match clashing checks in bright colours – orange, purple, blue and yellow – and dress them up as tailored separates and outerwear, or down by teaming them with denim and oversized pieces.
            </p>
            <button class="btn btn-default btn-sm show-more-btn center-button">Show More</b></button>
          </div><!-- /event-description-container -->
          <div data-role="collapsible-set" data-corners="false" data-theme="false" data-content-theme="false">
            <div data-role="collapsible">
              <h3>Models</h3>
              <ul data-role="listview" data-inset="false">
                <li>Cara Delevingne</li>
                <li>kate moss</li>
                <li>Rosie Huntington-Whiteley</li>
                <li>Leomie Anderson</li>
              </ul>
            </div>
            <div data-role="collapsible">
              <h3>Designers</h3>
              <ul data-role="listview" data-inset="false">
                <li>Tom Ford</li>
                <li>Sandy Powell</li>
                <li>Alexandra Byrne</li>
              </ul>
            </div>
          </div><!-- /collapsible-set -->
          <div class="action-button-container body-padding text-center">
            <button class="btn btn-primary btn-full book-tickets-btn">Book Tickets</button>
            <button class="btn btn-secondary directions-btn ui-btn-inline">Get Directions</button>
            <button class="btn btn-outline favourites-btn ui-btn-inline"><i class="fa fa-heart-o"></i>Add To Favourites</button>
          </div><!-- /action-button-container  -->
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
        name: 'Events',
        href: 'events.php'
      },
      {
        name: 'Hipster Fashion Catwalk',
        href: 'event-description.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.event-slider').slick();
    });

    $(document).ready(function () {
      var defaultHeight = 40;
      var text = $(".event-description-text");
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
