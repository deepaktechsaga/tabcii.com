<style type="text/css">
 .heading {color:red; font-size:12px; text-align: left;}
    .dropdown {
    position: relative;
    
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}
</style>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <title>TABCII - THE DEFINITIVE TRANSPORATION SERVICES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <link rel="canonical" href="http://www.tabcii.com/">
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

    <link rel="stylesheet" href="assets/timepicker/bootstrap-timepicker.min.css" /> 
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css"> 
    <!-- homepage fonticon CSS -->
    <link rel="stylesheet" href="assets/homepage-iocn/flaticon.css">
    <!-- homepage fonticon CSS -->
<!-- Library JS -->
<script src="assets/js/library/jquery-1.11.0.min.js"></script>
   
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLisGXY5L64UQcIHJUnbhCpQkX3EUwJfU&amp;libraries=places" type="text/javascript"></script>
<script>
    $(function() {
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        autoclose: true,
        startDate:'today'
    })
    });
  </script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125383770-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125383770-1');
</script>



<meta name="google-site-verification" content="-bKKikL9w6apEmPqhS1c4BTq7ljMBZyrsD1NWF8xipE" />

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
                    <a href="http://tabcii.com/" title=""><img src="assets/images/logo-header.png" alt="logo-header"></a>
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
                                    <li class="<?php if($uri == '/tabcii.com'){echo 'current-menu-parent';}?>"> <a href="http://tabcii.com/" title="">Home</a> </li>
                                    <li class="<?php if($uri == '/tabcii.com/about.php'){echo 'current-menu-parent';}?>"> <a href="about.php">About Us</a> </li>
                                    <li class="<?php if($uri == '/tabcii/car.php'){echo 'current-menu-parent';}?>"> <a href="car.php">Car</a> </li>
                                    <li class="<?php if($uri == '/tabcii/bus.php'){echo 'current-menu-parent';}?>"> <a href="bus.php">Bus</a></li>
                                    <li class="<?php if($uri == '/tabcii/logistic.php'){echo 'current-menu-parent';}?>"> <a href="logistic.php">Logistics</a>
                                    </li>
                                    
                                    <li class="<?php if($uri == '/tabcii/contact.php'){echo 'current-menu-parent';}?>"> <a href="contact.php">Contact Us</a></li>
                                    <li class="dropdown"><?php if($_SESSION['email']!= ''){ 
                                        $con=mysqli_connect("localhost","root","R@tech$183","tabcii_db");
                                        $email=$_SESSION['email'];
                                        $query = "SELECT * FROM `users` WHERE email='$email'";
                                        $result = mysqli_query($con, $query);
                                        while($row = mysqli_fetch_assoc($result)) {?>
                                            <a  href="#"><?= $row['first_name'].' '.$row['last_name']?></a></li>
                                       <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size:20px;color:red"></i></a></li>
                                         <?php
                                   } 
                               }else{?>
                               <a  href="sign-up.php">Signup</a>  </li>
                                   <!-- <a  href="" class="dropdown-toggle" data-toggle="dropdown">Signup</a>
                                   <div class="dropdown-menu">
                                                <a class="dropdown-item" href="sign-up.php">User</a>
                                                <a class="dropdown-item" href="vendor.php">Vendor</a>
                                            </div> </li>                                 -->
                                    <li> <a  href="login.php">Login</a>  </li> 
                                        <!-- <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Login</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div><?php } ?> -->
                                   

                                </ul>
                                <style type="text/css">
                                 
                                img.main-logo { margin: 0 auto;}
                                /* .nav-desktop ul>li:last-child:hover {background: none;} */
                                
                                .nav-desktop .tb .dropdown .dropdown-menu a.dropdown-item {display: block; padding: 5px;}
                                .nav-desktop .tb .dropdown button.btn {margin-bottom: -11px;}
                                </style>
                            </div>
                        </div>
                    </div>
                </nav>
                <!--End Navigation-->
            </div>
        </header>
        <!-- End Header -->