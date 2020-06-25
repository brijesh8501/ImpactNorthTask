<?php
session_start();
error_reporting(0);
if(!(isset($_SESSION['name'])) && !(isset($_SESSION['email']))){
  header("location: impactnorth-login.php");
}
include '../form_csrf/csrf.php';

$menu = array(
  'home' => array('title' => 'Home', 'href' => 'home.php'),
  'register' => array('title' => 'Register', 'href' => 'contact-us.php'),
  'online-tool' => array('fb' => array('title' => 'Facebook Advertising Pixel', 'href' => 'online-tool.php?id=1&action=online-tool'),
                  'google' => array('title' => 'Google Analytics Tag', 'href' => 'online-tool.php?id=2&action=online-tool')),
);
$logout_csrf_token = generateToken('logout');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Impact North | Brijesh Ahir's Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <link rel="icon" type="image/png" href="../assets/Charisma-on-the-Park.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/bootstrap-dataTable.css">
</head>
<body>
<header class="mb-5">
    <div class="header-wrapper">
      <div class="container header-container">
          <div class="header-section-1 d-flex align-items-center justify-content-between">
              <div class="logo">
                  <img src="assets/php-logo.png" class="img-fluid" alt="logo" />
              </div>
              <span class="btn-sidebar sidebar-open d-md-none" onclick="openNav()">&#9776; Menu</span>
          </div>
      </div>
      <div id="menu-wrapper">
            <div id="mySidenav" class="sidenav d-flex flex-column justify-content-between">
              <a class="closebtn" onclick="closeNav()">&times;</a>
              <div class="side-1">
                <div class="sidebar-item border-top border-bottom">
                      <a href="<?php echo $menu['home']['href'] ?>"><?php echo $menu['home']['title'] ?></a>
                </div>
                <div class="sidebar-item border-top border-bottom">
                      <a href="<?php echo $menu['register']['href'] ?>"><?php echo $menu['register']['title'] ?></a>
                </div>
                <div class="sidebar-item sidebar-item-dropdown border-top border-bottom d-flex justify-content-between pr-3">
                      <div>Online-tool</div><div><i class="arrow down"></i></div>
                </div>
                <div class="border float-right side-submenu d-none">
                    <a href="<?php echo $menu['online-tool']['fb']['href'] ?>" class="border-bottom"><?php echo $menu['online-tool']['fb']['title'] ?></a>
                    <a href="<?php echo $menu['online-tool']['google']['href'] ?>"><?php echo $menu['online-tool']['google']['title'] ?></a>
                </div>
              </div>    
              <div class="side-2 text-white d-flex align-items-end">
                  <div class="w-100 d-flex justify-content-end">
                      <a href="logout.php?ounce=<?php echo $logout_csrf_token; ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></span>
                  </div>
              </div>             
            </div>
            <div class="navbar-wrapper d-none d-md-block">
                <div class="container">
                    <div class="row justify-content-between">
                        <nav class="navbar navbar-expand-md navbar-skin justify-content-end">
                            <div class="collapse navbar-collapse">
                              <ul class="navbar-nav">
                                <li class="nav-item">
                                  <a class="custom-link nav-link" href="<?php echo $menu['home']['href'] ?>"><?php echo $menu['home']['title'] ?></a>
                                </li>
                                <li class="nav-item ml-3">
                                  <a class="custom-link nav-link" href="<?php echo $menu['register']['href'] ?>"><?php echo $menu['register']['title'] ?></a>
                                </li>
                                <li class="nav-item dropdown ml-3">
                                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbardrop" data-toggle="dropdown">
                                    Online Tool
                                  </a>
                                  <div class="dropdown-menu">
                                    <a class="custom-link dropdown-item" href="<?php echo $menu['online-tool']['fb']['href'] ?>"><?php echo $menu['online-tool']['fb']['title'] ?></a>
                                    <a class="custom-link dropdown-item" href="<?php echo $menu['online-tool']['google']['href'] ?>"><?php echo $menu['online-tool']['google']['title'] ?></a>
                                  </div>
                                </li>
                              </ul>
                            </div>
                        </nav>
                        <span class="text-white navbar-logout">
                          <a href="logout.php?ounce=<?php echo $logout_csrf_token; ?>" class="text-white"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </span>
                    </div>
                </div>
            </div>
      </div>
  </div>
</header>
