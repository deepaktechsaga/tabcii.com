<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabcii | Admin panel</title>
        <link rel="shortcut icon" href="img/favicon.ico">
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
   
    <body>
        <div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
         
            <header id="navbar">
                <div id="navbar-container" class="boxed">
                  
                    <div class="navbar-content clearfix">
                        <ul class="nav navbar-top-links pull-left">
                           
                            <li class="tgl-menu-btn">
                                <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                            </li>
                            
                            <li class="dropdown">
                              
                                <div class="dropdown-menu dropdown-menu-md with-arrow">
                                    <div class="pad-all bord-btm">
                                        <div class="h4 text-muted text-thin mar-no"> Notification </div>
                                    </div>
                                    <div class="nano scrollable">
                                        <div class="nano-content">
                                            <ul class="head-list">
                                               
                                                <li>
                                                    <a href="#" class="media">
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-primary"> <i class="fa fa-comment fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">New comments waiting approval</div>
                                                            <small class="text-muted">15 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!-- Dropdown list-->
                                                <li>
                                                    <a href="#" class="media">
                                                        <span class="badge badge-success pull-right">90%</span>
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-danger"> <i class="fa fa-hdd-o fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">HDD is full</div>
                                                            <small class="text-muted">50 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!-- Dropdown list-->
                                                <li>
                                                    <a href="#" class="media">
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-info"> <i class="fa fa-file-word-o fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Write a news article</div>
                                                            <small class="text-muted">Last Update 8 hours ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!-- Dropdown list-->
                                                <li>
                                                    <a href="#" class="media">
                                                        <span class="label label-danger pull-right">New</span>
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-purple"> <i class="fa fa-comment fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">Comment Sorting</div>
                                                            <small class="text-muted">Last Update 8 hours ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!-- Dropdown list-->
                                                <li>
                                                    <a href="#" class="media">
                                                        <div class="media-left"> <span class="icon-wrap icon-circle bg-success"> <i class="fa fa-user fa-lg"></i> </span> </div>
                                                        <div class="media-body">
                                                            <div class="text-nowrap">New User Registered</div>
                                                            <small class="text-muted">4 minutes ago</small>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--Dropdown footer-->
                                    <div class="pad-all bord-top">
                                        <a href="#" class="btn-link text-dark box-block"> <i class="fa fa-angle-right fa-lg pull-right"></i>Show All Notifications </a>
                                    </div>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End notifications dropdown-->
                        </ul>
                        <ul class="nav navbar-top-links pull-right">
                            <!--Fullscreen toogle button-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li class="hidden-xs" id="toggleFullscreen">
                                <a class="fa fa-expand" data-toggle="fullscreen" href="#" role="button">
                                    <span class="sr-only">Toggle fullscreen</span>
                                </a>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End Fullscreen toogle button-->
                            <!--User dropdown-->
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <li id="dropdown-user" class="dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right"> <img class="img-circle img-user media-object" src="<?php echo base_url();?>assets/user-img.jpg" alt="Profile Picture"> </span>
                                    <div class="username hidden-xs"> Admin</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right with-arrow">
                                    <!-- User dropdown menu -->
                                    <ul class="head-list">
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/profile"> <i class="fa fa-user fa-fw"></i> Profile </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/changePassword"> <i class="fa fa-gear fa-fw"></i> Settings </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>admin/logout" > <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                            <!--End user dropdown-->
                        </ul>
                    </div>
                    <!--================================-->
                    <!--End Navbar Dropdown-->
                </div>
            </header>
            <!--===================================================-->
            <!--END NAVBAR-->
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
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
                                    <li class="list-header">Admin Panel</li>
                                    <li class="list-divider"></li>
                                    <!--Menu list item-->
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/admin/dashboard">
                                            <i class="fa fa-home"></i><span class="menu-title">Dashboard</span></a>
                                        </li>
                                        
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-truck"></i>
                                                <span class="menu-title">Logistic</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="<?php echo base_url()?>logistics/manage_log"><i class="fa fa-history"></i>Booking Log</a></li>                                                                                              
                                            </ul>
                                        </li>  

                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-bus"></i>
                                                <span class="menu-title">Bus</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="<?php echo base_url()?>bus/manage_log"><i class="fa fa-history"></i>Booking Log</a></li>
                                                <!-- <li><a href="<?php echo base_url()?>admin/add_user"><i class="fa fa-plus"></i>Add User</a></li> -->                                                
                                            </ul>
                                        </li>    

                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-car"></i>
                                                <span class="menu-title">Car / Taxi</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="<?php echo base_url()?>car/manage_log"><i class="fa fa-history"></i>Booking Log</a></li>                                                                                              
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-ambulance"></i>
                                                <span class="menu-title">Ambulance</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="<?php echo base_url()?>ambulance/manage_log"><i class="fa fa-history"></i>Booking Log</a></li>                                                                                              
                                            </ul>
                                        </li>
                                         <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-user"></i>
                                                <span class="menu-title">Users</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="<?php echo base_url()?>admin/manage_log"><i class="fa fa-user"></i>Users Details</a></li>                                                                                              
                                            </ul>
                                        </li>  
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="fa fa-user"></i>
                                                <span class="menu-title">Vendors</span>
                                                <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="<?php echo base_url()?>index.php/admin/vendors"><i class="fa fa-user"></i>Vendor Users</a></li> 
                                                <li><a href="<?php echo base_url()?>index.php/admin/vendor_vehicles"><i class="fa fa-truck"></i>Vendor Vehicles</a></li>                                                                                            
                                            </ul>
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