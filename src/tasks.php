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
<div data-role="page" id="events">
  <?php require './components/sidebar.php'?><!-- /panel -->
  <?php require './components/header.php'?><!-- header -->
  <?php require './components/breadcrumb.php'?><!-- /breadcrumb -->
   <div role="main" class="overlay ui-content main-content">
      <div  class="ui-content events_body rebdytrndng">
      <div class="tab_body">
        <div class="task-content">
            <ul data-role="listview" data-split-icon="" data-split-theme="a" data-inset="true">
                        <li class="list-item tasks"> 
                          <div class="task-block">
                          <h2>Day 01 Task</h2>
                          <p>Dec 10, 3.00 p.m</p>
                          </div>
                          <div class="bar-one bar-con">
		                      <div class="bar" data-percent="100"><h2>COMPLETED</h2></div>
                        	</div>
                        </li>
                        <li class="list-item tasks">  
                        <div class="task-block">
                            <h2>Day 02 Task</h2>
                            <p>Dec 10, 5.00 p.m</p> 
                            </div>
                          <div class="bar-one bar-con">
		                      <div class="bar" data-percent="100"><h2>COMPLETED</h2></div>
                        	</div>
                        </li>
                        <li class="list-item tasks">     
                        <div class="task-block">                     
                            <h2>Day 03 Task</h2>
                            <p>Dec 11, 10.00 a.m</p>
                            </div>
                          <div class="bar-two bar-con">
		                      <div class="bar" data-percent="100"><h2>PENDING</h2></div>
                        	</div>
                        </li>
                        <li class="list-item tasks">  
                        <div class="task-block">
                            <h2>Day 04 Task</h2>
                            <p>Dec 11, 1.00 p.m</p> 
                            </div>
                          <div class="bar-two bar-con">
		                      <div class="bar" data-percent="100"><h2>PENDING</h2></div>
                        	</div>
                        </li>
                        <li class="list-item tasks">  
                        <div class="task-block">
                            <h2>Day 05 Task</h2>
                            <p>Dec 11, 3.00 p.m</p> 
                            </div>
                          <div class="bar-two bar-con">
		                      <div class="bar" data-percent="100"><h2>PENDING</h2></div>
                        	</div>
                        </li>
                        <li class="list-item tasks">
                        <div class="task-block">                          
                            <h2>Day 06 Task</h2>
                            <p>Dec 11, 5.00 p.m</p>  
                            </div>
                          <div class="bar-two bar-con">
		                      <div class="bar" data-percent="100"><h2>PENDING</h2></div>
                        	</div> 
                        </li>
                        <li class="list-item tasks">  
                        <div class="task-block">                        
                            <h2>Day 07 Task</h2>
                            <p>Dec 11, 5.00 p.m</p>  
                            </div>
                          <div class="bar-two bar-con">
		                      <div class="bar" data-percent="100"><h2>PENDING</h2></div>
                        	</div> 
                        </li>
            
            </ul>
        </div>
        
        </section>
  
      </div>
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
        name: 'Profile',
        href: 'profile.php'
      },
      {
        name: 'Tasks',
        href: 'tasks.php'
      }
    ];
    setBreadcrumb(breadcrumb);
  </script>
</body>
</html>
