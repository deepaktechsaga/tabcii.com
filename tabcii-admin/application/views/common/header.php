<!DOCTYPE html>
<html>
   
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Travel Booking</title>
  
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/frontend/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url(); ?>assets/frontend/css/custom.css" rel="stylesheet" media="screen">

    <!-- Carousel -->
  <link href="<?php echo base_url(); ?>assets/frontend/css/carousel.css" rel="stylesheet">
    
  
    <!-- Fonts -->  
  <link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,300,300italic' rel='stylesheet' type='text/css'> 
  <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/css/font-awesome.css" media="screen" />
  
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/fullwidth.css" media="screen" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/settings2.css" media="screen" />

    <!-- Picker UI--> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/frontend/css/jquery-ui.css" />    
    

   <script src="<?php echo base_url(); ?>assets/frontend/js/jquery-ui.js"></script>  
    <!-- jQuery --> 
    <script src="<?php echo base_url(); ?>assets/frontend/js/jquery.v2.0.3.js"></script>

    <!-- js process  -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/src/loadingoverlay.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@1.6.0/extras/loadingoverlay_progress/loadingoverlay_progress.min.js"></script>


  
  </head>
  <body id="top" class="thebg">
    
  <!-- Top wrapper -->  
  <div class="navbar-wrapper2 navbar-fixed-top">
      <div class="container">
    <div class="navbar mtnav">

      <div class="container offset-3">
        <!-- Navigation-->
        <div class="navbar-header">
        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?php echo base_url();?>" class="navbar-brand"><img src="<?php echo base_url(); ?>assets/frontend/images/holiday-logo.png" alt="Travel Booking" class="logo"/></a>
        </div>
        <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
         
          <li class="active"><a href="#">BECOME A HOST</a></li>
          <?php if($this->session->userdata('user_id')){ ?>
          <li class="dropdown-toggle" data-toggle="dropdown"><a href=""><img src="<?php echo base_url(); ?>assets/frontend/images/profile.png "> <?php echo $this->session->userdata('username'); ?> <span class="caret"></span></a></li>
          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Account</a></li>
            <li><a href="<?php echo base_url();?>site/logout"><i class="fa fa-sign-out"> Logout</a></li>
          </ul>

          <!-- <li><a href=""> Welcome <?php echo $this->session->userdata('username'); ?></a></li>
          <li><a href="<?php echo base_url();?>site/logout">Log Out</a></li>
           -->
            <?php } else{?>
          <li><a href="<?php base_url();?>site/userLogin">Sign IN</a></li>
          <li><a href="<?php base_url();?>site/userRegister">Sign UP</a></li>                  
          <?php } ?>    
        </ul>
        </div>
        <!-- /Navigation-->       
      </div>
    
        </div>
      </div>
    </div>
  <!-- / Top wrapper -->