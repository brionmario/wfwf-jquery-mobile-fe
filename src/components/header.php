<div data-role="header" class="header" data-position="fixed">
    <a href="#sidepanel" class="hamburger"><i class="fa fa-bars"></i></a>
    <img src="assets/img/logos/logo-mini-white-on-black.png" class="mini-logo"/>
    
    <div data-role="navbar" class="navbar">
        <ul>
            <li class="nav-link">
                <a href="./index.php" rel="external">
                    <i class="fa fa-home"></i>
                    Home
                </a>
            </li>
            <li class="nav-link">
                <a href="./products.php" rel="external">
                    <i class="fa fa-dropbox"></i>
                    Products
                </a>
            </li>
            <li class="nav-link">
                <a href="./events.php" rel="external">
                    <i class="fa fa-calendar"></i>
                    Events
                </a>
            </li>
            <li class="nav-link">
                <a href="./news.php" rel="external">
                    <i class="fa fa-globe"></i>
                    News
                </a>
            </li>
            <li class="nav-link">
                <a href="./poi.php" rel="external">
                    <i class="fa fa-map-marker"></i>
                    POI
                </a>
            </li>
            <li class="nav-link">
                <a href="./about.php" rel="external">
                    <i class="fa fa-info"></i>
                    About
                </a>
            </li>
            <li class="nav-link">
                <a href="./members.php" rel="external">
                    <i class="fa fa-group"></i>
                    Team
                </a>
            </li>
            <li class="nav-link">
                <a href="./contact.php" rel="external">
                    <i class="fa fa-phone"></i>
                    Contact
                </a>
            </li>
            <li class="nav-link logout-link">
                <a onclick='return logout()' rel="external">
                    <i class="fa fa-power-off"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div><!-- /navbar -->

    <button class="btn btn-primary text-uppercase login-btn" onclick="navigatePage('login.php')">Login</button>
    <div class="avatar-container" onclick="goToProfile()">
        <img class="avatar" src="assets/img/avatars/avatar.svg" />
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      if (isLoggedIn()) {
        $('.login-btn').hide();
      } else {
        $('.avatar-container').hide();
        $('.logout-link').hide();
      }
    });
</script>
