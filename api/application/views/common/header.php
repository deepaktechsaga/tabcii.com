<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>bizworks</title>
<meta name="description" content="Free Web tutorials">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Mihtilesh Sah">

<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.ico">

<!-- Slider -->
<link href="<?php echo base_url(); ?>assets/frontend/js/revolution-slider/css/settings.css" rel="stylesheet">

<!-- Bootstrap -->
<link href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">

<!-- Owl carousel -->
<link href="<?php echo base_url(); ?>assets/frontend/css/owl.carousel.css" rel="stylesheet">

<!-- Font Awesome -->
<link href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.css" rel="stylesheet">

<!-- Custom Style -->
<link href="<?php echo base_url(); ?>assets/frontend/css/main.css" rel="stylesheet">

<!-- JQuery -->
<script src="<?php echo base_url(); ?>assets/frontend/js/jquery-1.11.2.min.js"></script> 

<script src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js"></script> 

</head>
<body>
<!-- Header start -->
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-sm-3 col-xs-12"> 
      <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url(); ?>assets/frontend/images/logo.png" alt="Bizwork" /></a>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="col-md-10 col-sm-12 col-xs-12"> 
        <!-- Social Icons -->
        <div class="social">
        <a href="#"> <i class="fa fa-linkedin"></i></a>
         <a href="#"><i class="fa fa-twitter"></i></a>         
         <a href="#"> <i class="fa fa-slideshare"></i></a>
         <a href="#"><i class="fa fa-google-plus"></i></a>
         <!-- <a href="#"><i class="fa fa-youtube"></i></a>  -->
        </div>
        <!-- Social Icons end --> 
      </div>
    </div>
    <!-- row end --> 
  </div>
  <!-- Header container end --> 
</div>
<!-- Header end --> 
<nav class="navbar second-menu">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <?php $uri2 = $this->uri->segment(2); ?>
            <ul class="nav navbar-nav">                                    

                  <li class="<?php if($uri2 == 'ask-reply') echo 'active'; ?> down "><a href="<?= base_url(); ?>site/ask-reply"> Ask & Reply <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Strategy</a></li>
                        <li><a href="#">Operation</a></li>
                        <li><a href="#">Technology</a></li>
                        <li><a href="#">People</a></li>
                    </ul>
                  </li>
                  <li ><a href="#"> Business Doctor</a></li>
                  <li class="<?php if($uri2 == 'request-a-service') echo 'active'; ?> "><a href="<?= base_url()?>site/request-a-service">Expert Help</a></li>
                  <li class="<?php if($uri2 == 'how_it_works') echo 'active'; ?>" ><a href="<?= base_url(); ?>site/how_it_works">How it Works </a></li>
                  <li class="<?php if($uri2 == 'about-us') echo 'active'; ?> "><a href="<?= base_url(); ?>site/about-us"> About us </a></li>                
            </ul>
          
            <?php   if($this->session->userdata('userid')) {  ?>
                                 
              <ul class="nav navbar-nav pull-right">
                <li class="dropdown user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $this->session->userdata('userfname'); ?> &nbsp; 
                <span class="glyphicon glyphicon-user pull-right"></span></a>

                <?php   if($this->session->userdata('is_expert_logged')) {  ?>

                  <ul class="dropdown-menu">
                    <li><a href="<?= base_url(); ?>expert/dashboard">Dashboard<span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                    
                    <li><a href="#">Projects <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                   
                    <li><a href="#">Question <span class="badge pull-right"> 42 </span></a></li>                                       
                    
                    <li><a href="<?= base_url(); ?>site/logout">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                  </ul>
                  <?php }?>

                  <?php   if($this->session->userdata('is_client_logged')) {  ?>

                  <ul class="dropdown-menu">
                    <li><a href="<?= base_url(); ?>client/dashboard">Dashboard<span class="glyphicon glyphicon-cog pull-right"></span></a></li>
                    
                    <li><a href="#">Projects <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
                   
                    <li><a href="#">Question <span class="badge pull-right"> 42 </span></a></li>                                       
                    
                    <li><a href="<?= base_url(); ?>site/logout">Sign Out <span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                  </ul>
                  <?php }?>

              <?php }else{?>

              <ul class="nav navbar-nav pull-right"> 
              <li class="<?php if($uri2 == 'signup') echo 'active'; ?> "><a href="<?= base_url(); ?>site/signup"> Sign Up</a></li>  
              <li class="<?php if($uri2 == 'login') echo 'active'; ?>"> <a href="<?= base_url(); ?>site/login" class=""> Log In </a> </li>               
            </ul>

              <?php }?>
              </li>
            </ul>
        </div>
    </div>
</nav>