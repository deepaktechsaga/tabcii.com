<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Travel Booking</title>
        <link rel="shortcut icon" href="img/favicon.ico">
        <!--STYLESHEET-->
        <!--=================================================-->
        <!--Roboto Slab Font [ OPTIONAL ] -->
        <link href="http://fonts.googleapis.com/css?family=Roboto+Slab:400,300,100,700" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:500,400italic,100,700italic,300,700,500italic,400" rel="stylesheet">
        <!--Bootstrap Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
        <!--Jasmine Stylesheet [ REQUIRED ]-->
        <link href="<?php echo base_url();?>assets/backend/css/style.css" rel="stylesheet">
        <!--Font Awesome [ OPTIONAL ]-->
        <link href="<?php echo base_url();?>assets/backend/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--Switchery [ OPTIONAL ]-->
        <link href="<?php echo base_url();?>assets/backend/plugins/switchery/switchery.min.css" rel="stylesheet">
        <!--Bootstrap Select [ OPTIONAL ]-->
        <link href="<?php echo base_url();?>assets/backend/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <link href="<?php echo base_url();?>assets/backend/plugins/bootstrap-validator/bootstrapValidator.min.css" rel="stylesheet">
        
        <!--Morris.js [ OPTIONAL ]-->
        <link href="<?php echo base_url();?>assets/backend/plugins/morris-js/morris.min.css" rel="stylesheet">
        <!-- bs calender css -->
        <!--Bootstrap Timepicker [ OPTIONAL ]-->
        <link href="<?php echo base_url();?>assets/backend/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <!--Bootstrap Datepicker [ OPTIONAL ]-->
        <link href="<?php echo base_url();?>assets/backend/plugins/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
        <!--jQuery [ REQUIRED ]-->
        <script src="<?php echo base_url();?>assets/backend/js/jquery-2.1.1.min.js"></script>
        <!-- jquery form validation -->
        <script src="<?php echo base_url();?>assets/backend/js/jquery.validate.min.js"></script>
        <!--SCRIPT-->
        <!--=================================================-->
        <!--Page Load Progress Bar [ OPTIONAL ]-->
        <link href="<?php echo base_url();?>assets/backend/plugins/pace/pace.min.css" rel="stylesheet">
        <script src="<?php echo base_url();?>assets/backend/plugins/pace/pace.min.js"></script>
    </head>
    <!--TIPS-->
    <!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->
    <body>
        <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                            </li>
                        
                        </ul>
                        <ul class="nav navbar-top-links pull-right">
                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">
                                    <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right"> <img class="img-circle img-user media-object" src="<?php echo base_url();?>assets/user-img.jpg" alt="Profile Picture"> </span>
                                    <div class="username hidden-xs"> 
                                         <?php $id=$this->session->userdata('userid');
                                $query = $this->db->query("select * from users where id= $id")->result();
                                                foreach ($query as $key => $data) { ?>
                                    <?php echo $data->first_name;?>
                                <?php } ?>
                                </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">
                                    <!-- User dropdown menu -->
                                    <ul class="head-list">
                                        
                                        <li>
                                            <a href="<?php echo base_url(); ?>user_admin/logout" > <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <nav id="mainnav-container">
                <!--Brand logo & name-->
                <!--================================-->
                <div class="navbar-header">
                    <a href="<?php echo base_url(); ?>index.php/employee/dashboard" class="navbar-brand">
                        <i class="fa fa-cube brand-icon"></i>
                        <div class="brand-title">
                            <span class="brand-text">Travel Booking</span>
                        </div>
                    </a>
                </div>
                <!--================================-->
                <!--End brand logo & name-->
                <div id="mainnav">
                    <!--Menu-->
                    <!--================================-->
                    <div id="mainnav-menu-wrap">
                        <div class="nano">
                            <div class="nano-content">
                                
                                <ul id="mainnav-menu" class="list-group">
                                    <!--Category name-->
                                    <li class="list-header">User Panel</li>
                                    <li class="list-divider"></li>
                                    <!--Menu list item-->
                                    <li>
                                        <a href="<?php echo base_url(); ?>user_admin/dashboard">
                                            <i class="fa fa-home"></i><span class="menu-title">Dashboard</span></a>
                                        </li>
                                        
                                        <li>
                                         <a href="<?php echo base_url()?>user_admin/bus"><i class="fa fa-bus"></i>Bus</a>   
                                        </li>
                                         <li>
                                         <a href="<?php echo base_url()?>user_admin/logistic"><i class="fa fa-truck"></i>Logistic</a>   
                                        </li>
                                         <li>
                                         <a href="<?php echo base_url()?>user_admin/car"><i class="fa fa-car"></i>Car</a>   
                                        </li>
                                        <li>
                                         <a href="<?php echo base_url()?>user_admin/ambulance"><i class="fa fa-ambulance"></i>Ambulance</a>   
                                        </li>                                  
                                    </div>
                                </div>
                            </div>
                            <!--================================-->
                            <!--End menu-->
                        </div>
                    </nav>
                    <!--===================================================-->
                    <!--END MAIN NAVIGATION-->

<script type="text/javascript">
$(function(){

  $("#create_new_row").click(function(){  
  var  createData = {"id":"create_new"};

    $.ajax({
    type:"POST",
    data:createData,
    url:"<?php echo base_url();?>admin/create_new_p_row",
    statusCode:{
      200:function(data)
      {   
      console.log(data);
        
        if(data = 1)
        {
          $("#error_del").addClass('show');  
          $("#error_del").removeClass('hide');  
        }
        else
        {
          $("#error_del").removeClass('show');   
          $("#error_del").addClass('hide');
        }  
        
      },
      500:function(data){
        console.log("Error :  Internal Server Error");
      },
      404:function(data){
        console.log("Error :  Page not found");
      },
      502:function(data){
        console.log("Error :  Internal Server Error");
      }
    }
  }); //ajax close

  });

});
</script>