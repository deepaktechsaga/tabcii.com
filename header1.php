
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
<html lang='en'>
<head>
<meta charset="utf-8" />
<title>The Definitive Transport Service India | +91-9149-602-313</title>
<meta name="description" content=" Tabcii is the most nimble and convenient source for Transport services India. We focus on domestic man oeuvre for taxis, cabs, buses and logistics by covenant with the customers for reliable and cost effective solutions.">
<meta name="keywords" content="Truck Loads in India, Online Truck Booking in India, Bus Booking Online, Transport Service India, Cab Booking Online, Online cab booking, Online Taxi Booking, Taxi Booking Online, Bus ticket Booking, Online Bus Booking, Online bus ticket, bus ticket online, Online Bus booking, book bus online, book truck online">
<link rel="canonical" href="http://www.tabcii.com/">
 <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="css/jquery-ui.css" />
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<meta name="google-site-verification" content="PbXG7oP-i7L5nr89GjWsSPSluzENqyZYyJE9VS7LuFo" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

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

<script>
function getXMLHTTP() 
    { 
        var xmlhttp=false;  
        try
        {
            xmlhttp=new XMLHttpRequest();
        }
        catch(e)    
        {       
            try
            {           
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e)
            {
                try
                {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e1)
                {
                    xmlhttp=false;
                }
            }
        }
            
        return xmlhttp;
    }
    

function getDestination(chosensource)
{

var strURL="destinationList.php?sourceList="+chosensource;
var req = getXMLHTTP();

        if(req)
        {

        req.onreadystatechange = function()
        {
                if (req.readyState == 4) 
                {
                    
                    if (req.status == 200) 
                    {
                        document.getElementById('destdiv').innerHTML=req.responseText;
                    } else
                    {
                        alert("There was a problem while using XMLHTTP:\n" + req.statusText);
                    }
                }               
        }   
                req.open("GET",strURL,true);
                req.send(null);

        }

}

</script>
<script language="javascript" type="text/javascript">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125383770-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125383770-1');
</script>
</head>

<body>
        <!-- Preloader -->
<!--     <div id="preloader">
        <div class="tb-cell">
            <div id="page-loading">
                <div></div>
                <p>Loading</p>
            </div>
        </div>
    </div> --> 

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
                <nav class="navigation nav-c nav-desktop" id="navigation" data-menu-type="1200">
                    <div class="nav-inner">                  
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
                                    
                                    <!-- <li> <a target="_blank" href="http://www.tabcii.com/online-truck-booking/signup">Signup</a> </li>
                                    <li> <a target="_blank" href="http://www.tabcii.com/online-truck-booking/login">Login</a> </li> -->
                                    <li class="<?php if($uri == '/tabcii/contact.php'){echo 'current-menu-parent';}?>"> <a href="contact.php">Contact Us</a></li>
                                    <li><?php if($_SESSION['email']!= ''){ 
                                        $con=mysqli_connect("localhost","root","R@tech$183","tabcii_db");
                                        $email=$_SESSION['email'];
                                        $query = "SELECT * FROM `users` WHERE email='$email'";
                                        $result = mysqli_query($con, $query);
                                        while($row = mysqli_fetch_assoc($result)) {?>
                                            
                                       <a  href="#"><?= $row['first_name'].' '.$row['last_name']?></a></li>
                                       <li><a href="logout.php"><i class="fa fa-sign-out" style="font-size:20px;color:red"></i></a></li>  <?php
                                   } 
                               }else{?>
                                   <li><a href="sign-up.php">Signup</a> </li>
                                    <li> <a href="login.php">Login</a>  </li> 
                                        <!-- <div class="dropdown">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Login</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Link 1</a>
                                                <a class="dropdown-item" href="#">Link 2</a>
                                                <a class="dropdown-item" href="#">Link 3</a>
                                            </div>
                                        </div> --><?php } ?>
                                   

                                </ul>
                                <style type="text/css">
                                .nav-desktop .tb .dropdown {idth: auto; float: left; }
                                .nav-desktop ul>li:last-child:hover {background: none;}
                                .nav-desktop .tb .dropdown .dropdown-menu {top: 29px; /* float: left; */}
                                a.dropdown-item {}
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