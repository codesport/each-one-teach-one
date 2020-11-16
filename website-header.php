<?php

  $src = array(
   'jorge-pr-10q.jpg',
   'marissa-pr-10q.jpg',
   'harold-nideen-op-72px-5q.jpg',
  );

  $src = $src[array_rand($src)]; //Return a random entry from the array.

  //$src = basename($src, '.jpg');

  $src =  'images/' . $src;

  session_start();

?>



<!DOCTYPE html>
<html lang="en" class="no-js">
  <!-- Head -->
  <head>
    <title><?php echo ucfirst( basename( $_SERVER["SCRIPT_FILENAME"], '.php' ) ) ?> | Each One, Teach One</title>

    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

<!-- Favicons -->
<link rel="apple-touch-icon" sizes="152x152" href="//treebright.com/assets/tbc/images/logo/logo-treebright-thumb.png">
<link rel="shortcut icon" href="//treebright.com/assets/tbc/images/logo/favicon.ico">
<!-- /Favicons -->   

    <!-- Web Fonts -->
    <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,700%7COpen+Sans:300,400,600,700" rel="stylesheet">

    <!-- Bootstrap Styles -->
    <link rel="stylesheet" type="text/css" href="./web-files_files/bootstrap.css">

    <!-- Components Vendor Styles -->
    <link rel="stylesheet" type="text/css" href="./web-files_files/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="./web-files_files/slick.css">

    <!-- Theme Styles -->
    <link rel="stylesheet" type="text/css" href="./web-files_files/styles.css">


    <style type="text/css">
    .img-responsive {
      display: block;
      height: auto;
      max-width: 100%;
    }
    @media (max-width: 1199px){
      .navbar-expand-lg.fixed-top {
        background-color: rgb(14 15 19 / 81%);  
      }
    }

  @media (min-width: 992px){
    .navbar-expand-lg > .container, .navbar-expand-lg > .container-fluid {
        flex-wrap: nowrap;
        background-color: #21140259;
    }
  }

.height{
  height: 10px;
}

    </style>
  </head>
  <!-- End Head -->

  <body>
    <!-- Header -->
    <header>
      <!-- Navbar -->
      <nav class="js-navbar-scroll navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img class="img-responsive" src="images/logo-557x100.png" alt="Each One, Teach One">
          </a>

          <button class="navbar-toggler" type="button"
                  data-toggle="collapse"
                  data-target="#navbarTogglerDemo"

                  aria-controls="navbarTogglerDemo"
                  aria-expanded="false"
                  aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo">

   <?php if( !isset($_SESSION['user_id']) ) : ?>
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item mr-4 mb-2 mb-lg-0">
                <a class="nav-link active" href="app-about.php">About</a>
              </li>

              <li class="nav-item dropdown mr-4 mb-2 mb-lg-0">
              <a id="create" class="nav-link" href="app-create.php">Register</a>
              </li>
            </ul>
            <div>
              <a class="btn btn-primary" href="app-login.php">
                <i id="login" class="fas fa-sign-in mr-1"></i> Login
              </a>
            </div>


    <?php else : ?>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item mr-4 mb-2 mb-lg-0">
                <a class="nav-link active" href="app-about.php">About</a>
              </li>

              <li class="nav-item mr-4 mb-2 mb-lg-0">
                <a class="nav-link active" href="app-admin.php">Connect With Others</a>
              </li>

              <li class="nav-item mr-4 mb-2 mb-lg-0">
                <a class="nav-link" href="app-update.php">Update Profile</a>
              </li>

              <li class="nav-item mr-4 mb-2 mb-lg-0">
                <a class="nav-link" href="app-read.php">View Profile</a>
              </li>              

              <li class="nav-item mr-4 mb-2 mb-lg-0">
                <a class="nav-link" href="app-delete.php">Delete Account</a>
              </li>
            </ul>
            <div>
              <a class="btn btn-primary" href="app-logout.php">
                <i class="fas fa-sign-out mr-1"></i> Logout
              </a>
            </div>


    <?php endif ?>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->