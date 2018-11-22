
<?php 
    include_once 'config.php' ;
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
 #query-form .form-search .form-field {width: 15.65%;}
 #query-form .form-search .form-field.field-date .datepicker { padding-top: 0; padding-bottom: 3px;}
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
                    <li class="cate-item active col-xs-2">
                        <a href="car.php" title=""><span>CAR / Taxi</span><img src="assets/images/icon-sedan-car.png" alt="icon-sedan-car"></a>
                    </li>
                    <li class="cate-item col-xs-2">
                        <a href="ambulance.php" title=""><span>Ambulance</span><img src="assets/images/ambulance-icon.png" alt="icon-taxi"></a>
                    </li>
                </ul>
                    <!-- End Tabs Cat -->

                    <!-- Tabs Content -->
                    <div class="tab-content">             
                        <!-- Search Car-->
                        <div class="form-cn form-flight active in tab-pane" id="form-car">
                            <!-- <h2 style="display: block; text-align: center;">COMING SOON </h2> --> <h2>Where would you like to go?</h2>
                            <form method='post' id="query-form" action=''>
                            <div class="form-search clearfix">
                            	 <div class="input-new field-select field-children">
                                    <div class="select">
                                        <span>Your Trip</span>
                                        <select name='trip_type'>
                                        	<option value="">Select</option>
                                            <option value="One Way">One Way</option>
                                            <option value="Round Trip">Round Trip</option>
                                            
                                        </select>
                                    </div>
                                    <span id="trip_type_error"></span>
                                </div>    
                                <div class="form-field">
                                    <input type="text" name="sourceCity" id="pickuplocation" class="field-input" placeholder="PickUp Location">
                                    <input type="hidden" name="pickuplocation_Lat" id="pickuplocation_Lat" >
                                    <input type="hidden" name="pickuplocation_Lng" id="pickuplocation_Lng" >
                                    <span id="sourceCity_error"></span>
                                </div>
                                <div class="form-field">
                                    <input type="text" name="destinationcity" id="droplocation" class="field-input" placeholder="Drop Location">
                                    <input type="hidden" name="droplocation_Lat" id="droplocation_Lat" >
                                    <input type="hidden" name="droplocation_Lng" id="droplocation_Lng" >
                                    <span id="destinationcity_error"></span>
                                </div>
                                <div class="form-field field-date">
                                    <input type="text" name="pickup_date" class="field-input datepicker" placeholder="Pickup Date">
                                    <span id="pickup_date_error"></span>
                                </div>
                                <div class="form-field field-date">
                                    <input type="text" name="drop_date" class="field-input datepicker" placeholder="Drop Date">
                                    <span id="drop_date_error"></span>
                                </div>
                                <div class="input-new field-select field-adult">
                                    <div class="select">
                                        <span>Seater</span>
                                        <select name="seater"> 
                                            <option value="">Select</option>
                                            <?php for($i=4;$i<=10;$i++){ ?>
                                            <option value="<?= $i; ?>"><?= $i; ?> Seaters</option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                    <span id="seater_error"></span>
                                </div>
                               
                                <div class="form-submit">
                                    <button type="submit" class="awe-btn awe-btn-medium">Next</button>
                                </div>
                            </div>
                        </form>
                        <p class="condition"> We charge <strong>Rs. 50</strong> per car booking </p></br>
                     <p> <center> (Rs 50 will be Adjusted in Final Bill) </center>    
                        <span><center>Only For J&K, Punjab, Haryana & Himanchal Pradesh</span></center> </p>
                        <span style="color:green"><?php if(isset($_SESSION['messages'])){echo $_SESSION['messages']; session_unset($_SESSION['messages']); } ?></span>
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
                                    <a href="https://www.facebook.com/Tabciionline-1856546944432590" title=""><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/tabcii" title=""><i class="fa fa-twitter"></i></a>
                                    <a href="https://in.pinterest.com/tabcii56/" title=""><i class="fa fa-pinterest"></i></a>
                                    <!-- <a href="" title=""><i class="fa fa-linkedin"></i></a> -->
                                   <!--  <a href="" title=""><i class="fa fa-instagram"></i></a> -->
                                    <a href="https://plus.google.com/100833290976805659149" title=""><i class="fa fa-google-plus"></i></a>
                                    <a href="https://digg.com/u/tabcii" title=""><i class="fa fa-digg"></i></a>
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

<script>
	$(function(){
      $('#query-form').validate({
       rules:{
       	trip_type:{
       		required:true
       	},
       	sourceCity:{
       		required:true
       	},
       	destinationcity:{
       		required:true
       	},
       	pickup_date:{
       		required:true
       	},
       	drop_date:{
       		required:true
       	},
       	seater:{
       		required:true
       	}

       },
       errorPlacement:function(error,element)
       {
       	if(element.attr('name')=='trip_type'){
       	  error.appendTo('#trip_type_error');
       	}
       	else if(element.attr('name')=='sourceCity'){
       	  error.appendTo('#sourceCity_error');
       	}
       	else if(element.attr('name')=='destinationcity'){
       	  error.appendTo('#destinationcity_error');
       	}
       	else if(element.attr('name')=='pickup_date'){
       	  error.appendTo('#pickup_date_error');
       	}
       	else if(element.attr('name')=='drop_date'){
       	  error.appendTo('#drop_date_error');
       	}
       	else if(element.attr('name')=='seater'){
       	  error.appendTo('#seater_error');
       	}
       },
       messages:{
       	trip_type:{
       		required:"Choose"
       	},
       	sourceCity:{
       		required:"Choose"
       	},
       	destinationcity:{
       		required:"Choose"
       	},
       	pickup_date:{
       		required:"Choose"
       	},
       	drop_date:{
       		required:"Choose"
       	},
       	seater:{
       		required:"Choose"
       	}
       },
       submitHandler:function(form){
       	$.ajax({
          url:'set_car_request.php',
          type:'post',
          data:$(form).serialize(),
          success:function(result){
           var res=JSON.parse(result);
           if(res.status=='true')
           {
           	window.location.href='car_query.php';
           }
          }
       	});
       }
      });
	});
</script>

<script type="text/javascript">
  
 function initialize_auto() {

        var pickuplocation = document.getElementById('pickuplocation');
        var autocomplete = new google.maps.places.Autocomplete(pickuplocation);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('pickuplocation_Lat').value = place.geometry.location.lat();
            document.getElementById('pickuplocation_Lng').value = place.geometry.location.lng();

        });

        var droplocation = document.getElementById('droplocation');
        var autocomplete2 = new google.maps.places.Autocomplete(droplocation);
        google.maps.event.addListener(autocomplete2, 'place_changed', function () {
            var place2 = autocomplete2.getPlace();
            document.getElementById('droplocation_Lat').value = place2.geometry.location.lat();
            document.getElementById('droplocation_Lng').value = place2.geometry.location.lng();
            
        });
    }

google.maps.event.addDomListener(window, 'load', initialize_auto);   


</script>