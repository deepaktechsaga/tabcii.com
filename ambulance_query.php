<?php

    include_once 'config.php' ;

    if(!isset($_SESSION['ambulanceQueryActive']))
    {
     echo "<script>window.location.href='ambulance.php';</script>";
    }
   
   function getLocationName($table,$col,$val,$getCol,$conn)
   {
     $sql ="SELECT $getCol from  $table where $col=$val limit 1";
     $result=mysqli_query($conn,$sql);
     return mysqli_fetch_assoc($result)[$getCol];
   }
   include_once "header1.php";
    
?>
  <!--Banner-->
  <style type="text/css">
    .form-cn .form-search .form-field span.select2-selection.select2-selection--single {
    position: relative;
    z-index: 2;
    width: 100%;
    border: 0;
    outline: none;
    color: #398fcf;
    background-color: transparent;
    font-weight: 600;
    border-bottom: 1px dashed #4da981;
}
.input-new{
float: left;
padding: 20px 11px;
border-right: 1px solid #e6e6e6;
font-size: 14px;
line-height: 29px;
color: #398fcf;
font-weight: 600;
}
.input-new .select{ border-bottom: 1px dashed #4da981; }
.form-cn .form-search .form-field span {
    width: 100% !important;
}

div#form-bus .form-field {
    width: 28%;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
    left: 95%;
}.select2-container--default .select2-selection--single .select2-selection__placeholder {
    color: #337ab7;
}
                        </style>
        <section class="banner">

            <!--Background-->
            <div class="bg-parallax bg-1"></div>
            <!--End Background-->

            <div class="container">

                <div class="logo-banner text-center">
                    <a href="" title="">
                        <img src="assets/images/logo-banner.png" alt="">
                    </a>
                </div>

                <!-- Banner Content -->
                <div class="banner-cn">

                    <!-- Tabs Cat Form -->
                <ul class="tabs-cat text-center row">
                    <li class="cate-item  col-xs-2">
                        <a href="index.php" title=""><span>Logistics</span><img src="assets/images/delivery-truck.png" alt=""></a>
                    </li>
                    <li class="cate-item col-xs-2">
                        <a href="bus.php" title=""><span>BUS</span><img src="assets/images/icon-bus.png" alt=""></a>
                    </li>
                    <li class="cate-item col-xs-2">
                        <a href="car.php" title=""><span>CAR / Taxi</span><img src="assets/images/icon-sedan-car.png" alt="icon-sedan-car"></a>
                    </li>
                    <li class="cate-item active col-xs-2">
                        <a href="ambulance.php" title=""><span>Ambulance</span><img src="assets/images/ambulance-icon.png" alt="icon-taxi"></a>
                    </li>
                </ul>
                    <!-- End Tabs Cat -->

                    <!-- Tabs Content -->
                    <div class="tab-content"> 
                        <!-- Search Car-->
                        <div class="form-cn form-flight active in tab-pane" id="form-car">
                        <h2>BOOKING Details</h2>
                           <div class="form-search clearfix query-data">
                            <div class="form-group">
                                <div class="row">
                                   
                                    <div class="col-md-3">
                                        <label>From </label>
                                        <p>
                                        <?php if(is_numeric($_SESSION['ambulanceSourceCity'])){$source=getLocationName('source_city','source_id',$_SESSION['ambulanceSourceCity'],'source_name',$conn);echo $source; $_SESSION['source']=$source; }else{ echo $_SESSION['ambulanceSourceCity'];}?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Destination</label>
                                        <p>
                                        <?php if(is_numeric($_SESSION['ambulanceDestinationcity'])){$destination=getLocationName('destination_city','destination_id',$_SESSION['ambulanceDestinationcity'],'destination_name',$conn); echo $destination; $_SESSION['destination']=$destination;}else{ echo $_SESSION['ambulanceDestinationcity'];}?>
                                       </p>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Pick Date</label>
                                        <p>
                                        <?= $_SESSION['ambulance_pickup_date']; ?></p>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Pick Time</label>
                                        <p>
                                        <?= $_SESSION['ambulance_pickup_time']; ?></p>
                                    </div>                                    
                                </div>
                            </div><!-- ./form-group -->  
                            
                           </div><!-- ./form-search -->
                            <h3>Personal Details</h3>
                            <form method="post" id="query_submit">
                           <div class="form-search clearfix query-data">
                            <div class="form-group">
                               
                            <div class="form-field field-droping">
                                <input type="text" class="field-input" name="name" placeholder="Name">
                            </div>

                            <div class="form-field field-droping">
                                <input type="tel" class="field-input" name="contact" placeholder="Contact">
                            </div>

                            <div class="form-field field-droping">
                                <input type="email" class="field-input" name="email" placeholder="Email">
                            </div>

                            <div class="form-field field-droping">
                                <input type="text" class="field-input" name="address" id="address" placeholder="Address">
                            </div>

                            <div class="form-submit">
                            <input  type="submit"  class="awe-btn awe-btn-medium" value="Submit" >
                            </div>

                            </div><!-- ./form-group -->

                           </div>
                           </form>

                           <script>
                               $(function(){
                                $('#query_submit').validate({
                                  rules:{
                                    name:{
                                        required:true
                                    },
                                    contact:{
                                        required:true,
                                        number:true
                                    },
                                    email:{
                                        required:true,
                                        email:true
                                    }
                                  },
                                  submitHandler:function(form){
                                    $.ajax({
                                      url:'ambulance_query_submit.php',
                                      type:'post',
                                      data:$(form).serialize(),
                                      success:function(result)
                                      {
                                        window.location.href='ambulance.php';
                                      }
                                    });
                                  }
                                });
                               });
                           </script>



                        </div>
                        <!-- End Search Car -->
                        

                    </div>
                    <!-- End Tabs Content -->

                </div>
                <!-- End Banner Content -->

            </div>

        </section>
        <!--End Banner-->


<!-- top 4 services car start  -->
<div class="clearfix"></div>
<section class="topfor-service-holder">
    <div class="title-wrap">
        <div class="head-title">
            <div class="container">
                <div class="travel-title float-left">
                    <h2>Car Booking Features</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-award"></i>
                        <div class="topfor-tyext">
                            <h2>Quality</h2>
                            <p>Customer provided ratings
                                Informed decision making
                            No surprises</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-idea"></i>
                        <div class="topfor-tyext">
                            <h2>Reliability</h2>
                            <p>24 x 7 Customer support 
Instant booking confirmation 
Transparent billing</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-good"></i>
                        <div class="topfor-tyext">
                            <h2>Convenience</h2>
                            <p>Book in 3 easy steps 
Search by car model 
Book on web, app or phone</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f fa fa-inr"></i>
                        <div class="topfor-tyext">
                            <h2>Quality</h2>
                            <p>Customer provided ratings
                                Informed decision making
                            No surprises</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- top 4 services car end -->

        <!-- Sales -->
        <section class="sales">
            <!-- Title -->
            <div class="title-wrap">
                <div class="head-title"> 
                    <div class="container">
                        <div class="travel-title float-left">
                            <h2>Cars</h2>
                        </div>
                        <a href="#" title="" class="awe-btn awe-btn-5 awe-btn-lager arrow-right text-uppercase float-right">View ALL  </a>
                    </div>
                </div>
            </div>
            <!-- End Title -->
            <!-- Hot Sales Content -->
            <div class="container">
                <div class="sales-cn">
                    <div class="row">
                        <!--  Item -->
                        <div class="col-xs-6 col-md-3">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-1.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">Swift Dzire / Similar</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">4 Passenger Seats</a>,
                                            <a href="" title="">Air Conditioning </a>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 269</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 175<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  Item -->
                        <!--  Item -->
                        <div class="col-xs-6 col-md-3">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-2.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>

                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">Toyota Innova / Similar</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">6 Passenger Seats</a>,
                                            <a href="" title="">Air Conditioning </a>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 632</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 345<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  Item -->
                        <!--  Item -->
                        <div class="col-md-6">
                            <div class="sales-item ">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-3.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">BMW 5 Series</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">4 Passenger Seats</a>,
                                            <a href="" title="">Air Conditioning </a>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 582</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 558<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  Item -->

                         <!--  Item -->
                        <div class="col-md-6">
                            <div class="sales-item ">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-3.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">BMW 5 Series</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">4 Passenger Seats</a>,
                                            <a href="" title="">Air Conditioning </a>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 582</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 558<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  Item -->
                         <!--  Item -->
                        <div class="col-xs-6 col-md-3">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-1.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">Swift Dzire / Similar</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">4 Passenger Seats</a>,
                                            <a href="" title="">Air Conditioning </a>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 269</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 175<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  Item -->
                        <!--  Item -->
                        <div class="col-xs-6 col-md-3">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-2.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>

                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">Toyota Innova / Similar</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">6 Passenger Seats</a>,
                                            <a href="" title="">Air Conditioning </a>
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 632</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 345<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  Item -->
                       
                      
                    </div>
                </div>
            </div>
            <!-- End Hot Sales Content -->
        </section>
        <!-- End Sales --> 
  

    <!-- Travel Destinations -->
   
        <!-- End Travel Destinations -->



  <!-- Confidence and Subscribe  -->
        <section class="confidence-subscribe">
            <!-- Background -->
            <div class="bg-parallax bg-3"></div>
            <!-- End Background -->
            <div class="container">
                <div class="row cs-sb-cn">

                    <!-- Confidence -->
                    <div class="col-md-6">
                        <div class="confidence">
                            <h3>Book with confidence</h3>
                            <ul>
                                <li>
                                    <span class="label-nb"><i class="fa fa-car" aria-hidden="true"></i></span>
                                    <h5>Car Booking </h5>
                                    <p>We don't charge you an extra fee for online car booking </p>
                                </li>
                                <li>
                                    <span class="label-nb"><i class="fa fa-bus" aria-hidden="true"></i></span>
                                    <h5>Bus Booking</h5>
                                    <p>We don't charge you an extra fee for online bus booking</p>
                                </li>
                                <li>
                                    <span class="label-nb"><i class="fa fa-truck" aria-hidden="true"></i></span>
                                    <h5>Truck Booking</h5>
                                    <p>We don't charge you an extra fee for online ruck booking</p>
                                </li>
                                <li>
                                    <span class="label-nb"><i class="fa fa-taxi" aria-hidden="true"></i></span>
                                    <h5>Cab Booking</h5>
                                    <p>We don't charge you an extra fee for online cab booking</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Confidence -->
                    <!-- Subscribe -->
                    <div class="col-md-6">
                        <div class="subscribe">
                            <h3>Subscribe to our newsletter</h3>
                            <p>Enter your email address and we’ll send you our regular promotional emails, packed with special offers, great deals, and huge discounts</p>
                            <!-- Subscribe Form -->
                            <div class="subscribe-form">
                                <form action="#" method="get">
                                    <input type="text" name="" value="" placeholder="Your email" class="subscribe-input">
                                    <button type="submit" class="awe-btn awe-btn-5 arrow-right text-uppercase awe-btn-lager">subcrible</button>
                                </form>
                            </div>
                            <!-- End Subscribe Form -->
                            <!-- Follow us -->
                            <div class="follow-us">
                                <h4>Follow us</h4>
                                <div class="follow-group">
                                    <a href="" title=""><i class="fa fa-facebook"></i></a>
                                    <a href="" title=""><i class="fa fa-twitter"></i></a>
                                    <a href="" title=""><i class="fa fa-pinterest"></i></a>
                                    <a href="" title=""><i class="fa fa-linkedin"></i></a>
                                    <a href="" title=""><i class="fa fa-instagram"></i></a>
                                    <a href="" title=""><i class="fa fa-google-plus"></i></a>
                                    <a href="" title=""><i class="fa fa-digg"></i></a>
                                </div>
                            </div>
                            <!-- Follow us -->
                        </div>
                    </div>
                    <!-- End Subscribe -->

                </div>
            </div>
        </section>
        <!-- End Confidence and Subscribe  -->
     

<?php include 'footer.php' ?>

<script type="text/javascript">
  
 function initialize_auto() 
 {
    var pickuplocation = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(pickuplocation);
    google.maps.event.addListener(autocomplete, 'place_changed', function () 
    {
      
    
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
      
        //Location details
        for (var i = 0; i < place.address_components.length; i++) {
            if(place.address_components[i].types[0] == 'postal_code'){              
                document.getElementById('postal_code').value = place.address_components[i].long_name;
            }           
        }

        document.getElementById('addressLat').value = place.geometry.location.lat();
        document.getElementById('addressLng').value = place.geometry.location.lng();
    });
}

google.maps.event.addDomListener(window, 'load', initialize_auto);  



</script>