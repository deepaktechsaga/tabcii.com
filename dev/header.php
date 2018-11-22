<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <title>Travel Booking </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Font Google -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400%7COpen+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <!-- End Font Google -->
    <!-- Library CSS -->
    <link rel="stylesheet" href="assets/css/library/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/library/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/library/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/library/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/library/jquery.mb.YTPlayer.min.css">

    <!-- Include Bootstrap Datepicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css"> 
    <!-- homepage fonticon CSS -->
    <link rel="stylesheet" href="assets/homepage-iocn/flaticon.css">
    <!-- homepage fonticon CSS -->
<!-- Library JS -->
<script src="assets/js/library/jquery-1.11.0.min.js"></script>
   
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLisGXY5L64UQcIHJUnbhCpQkX3EUwJfU&amp;libraries=places" type="text/javascript"></script>

</head>
<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="tb-cell">
            <div id="page-loading">
                <div></div>
                <p>Loading</p>
            </div>
        </div>
    </div> 
      <!-- Wrap -->
    <div id="wrap"> 
        <!-- Header -->
        <header id="header" class="header">
            <div class="container"> 
                <!-- Logo -->
                <div class="logo float-left">
                    <a href="index.php" title=""><img src="assets/images/logo-header.png" alt=""></a>
                </div>
                <!-- End Logo -->
                <!-- Bars -->
                <div class="bars" id="bars"></div>
                <!-- End Bars --> 
                <!--Navigation-->
                <nav class="navigation nav-c" id="navigation" data-menu-type="1200">
                    <div class="nav-inner">
                        <a href="#" class="bars-close" id="bars-close">Close</a>
                        <div class="tb">
                            <div class="tb-cell">
                                <?php $uri = $_SERVER['REQUEST_URI']; ?>
                                <ul class="menu-list text-uppercase">
                                    <li class="<?php if($uri == '/tabcii-dev/index.php'){echo 'current-menu-parent';}?>"> <a href="index.php" title="">Home</a> </li>
                                    <li class="<?php if($uri == '/tabcii-dev/about.php'){echo 'current-menu-parent';}?>"> <a href="about.php">About Us</a> </li>
                                    <li class="<?php if($uri == '/tabcii-dev/car.php'){echo 'current-menu-parent';}?>"> <a href="car.php">Car</a> </li>
                                    <li class="<?php if($uri == '/tabcii-dev/bus.php'){echo 'current-menu-parent';}?>"> <a href="bus.php">Bus</a></li>
                                    <li class="<?php if($uri == '/tabcii-dev/logistic.php'){echo 'current-menu-parent';}?>"> <a href="logistic.php">Logistics</a>
                                    </li>
                                    <li> <a target="_blank" href="http://www.tabcii.com/online-truck-booking/signup">Signup</a> </li>
                                    <li> <a target="_blank" href="http://www.tabcii.com/online-truck-booking/login">Login</a> </li>
                                    <li class="<?php if($uri == '/tabcii-dev/contact.php'){echo 'current-menu-parent';}?>"> <a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
                <!--End Navigation-->
            </div>
        </header>
        <!-- End Header -->
