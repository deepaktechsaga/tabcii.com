<?php     
include_once 'config.php' ;
    
    include_once "library/OAuthStore.php";
    include_once "library/OAuthRequester.php";
    include_once "SSAPICaller.php";

    $sourceList = getSourcesAsDropDownList();

    include_once "header1.php";

?> 
  <!--Banner-->
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
                    <li class="cate-item active col-xs-2">
                        <a href="bus.php" title=""><span>BUS</span><img src="assets/images/icon-bus.png" alt=""></a>
                    </li>
                    <li class="cate-item col-xs-2">
                        <a href="car.php" title=""><span>CAR / Taxi</span><img src="assets/images/icon-sedan-car.png" alt="icon-sedan-car"></a>
                    </li>
                    <li class="cate-item col-xs-2">
                        <a href="ambulance.php" title=""><span>Ambulance</span><img src="assets/images/ambulance-icon.png" alt="icon-taxi"></a>
                    </li>
                </ul>
                    <!-- End Tabs Cat -->

                    <!-- Tabs Content -->
                    <div class="tab-content">
 
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
                          <!-- Search bus -->
                    <div class="form-cn form-car active in tab-pane " id="form-bus">
                <?php

                function getSourcesAsDropDownList()
                {   
                    global $scr,$sourceId , $sourcename;

                    $scr = getAllSources();
                    $json_o=json_decode($scr);
                    $cities = $json_o->cities;

                    function my_sort($a,$b)
                    {

                        if (strcasecmp($a->name , $b->name)<0)
                        { return 1;
                        }
                        elseif (strcasecmp($a->name, $b->name)>0)
                        {
                            return -1;
                        }
                        else 
                        {
                            return 0;
                        }
                    }

                    usort($cities, 'my_sort');

                    $selectControlForSources = "<span> From: </span> <select onChange='getDestination(this.value)' id='sourceList' class='form-control vehicle_type' name='sourceList' > ";


                    if(is_array($cities))
                    { 
                        foreach($cities as $cities)
                        {
                            $selectControlForSources = $selectControlForSources."<option value=". $cities->id." selected='selected'>"
                                    .$cities->name."</option>";
                        }
                        $selectControlForSources = $selectControlForSources."</select>";
                    }
                    return $selectControlForSources ;
                }  

                ?>
                    <h2>Where would you like to go?</h2> 

                    <div class="form-search clearfix" style="display: block;">
                        <form method='get' class="bookBusForm" name='bookBusForm' action='BusServiceList.php'>
                            <div class="form-field field-droping field-select field-style">
                                 <!--    <label>Source </label> -->
                                <select name="sourceCity" class="soucerCityName sourceCity form-control"></select>                    
                            </div>
                            <div id="" name="destdiv" class="form-field field-droping">
                            <!--   <label>Destination </label> -->
                                <select name="destinationcity" class="form-control tabciiDestinationCity"> </select>
                                
                            </div>
                            <div class="form-field field-date">
                                <?php $current_date = date('Y-m-d'); ?>
                                <input type="text" class="field-input phone "  id="datepicker" name="datepicker" value="<?php echo $current_date; ?>">                           
                            </div>   
                            <div class="form-submit">
                                <input  type="submit" value="Search Buses" class="btn btn-primary"/>
                            </div>
                        </form>  
                        <p class="condition"> We charge <strong>Rs. 50</strong> per bus ticket booking </p></br>
                     <p> <center> (Rs 50 will be Adjusted in Final Bill) </center></p>                   
                    </div>
                </div>  
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
                    <h2>Bus Booking Features</h2>
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
                        <i class="f glyph-icon flaticon-connection"></i>
                        <div class="topfor-tyext">
                            <h2>Extensive Options</h2>
                            <p>Book from the selection of buses, including AC, Non-AC, Deluxe and more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-discount"></i>
                        <div class="topfor-tyext">
                            <h2>Discounts or Cashbacks</h2>
                            <p>We also assure cash backs and reward points to the customers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-credit-card"></i>
                        <div class="topfor-tyext">
                            <h2>Payment Options</h2>
                            <p>Pay through cards, Net banking or mobile wallets for Bus reservation</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-taxi-driver"></i>
                        <div class="topfor-tyext">
                            <h2> 2500 Bus Operators</h2>
                            <p>We have tied up with best bus operators in India to make travel easy.</p>
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
                            <h2>Buses</h2>
                        </div>
                        <a href="#" title="" class="awe-btn awe-btn-5 awe-btn-lager arrow-right text-uppercase float-right">View  ALL</a>
                    </div>
                </div>
            </div>
            <!-- End Title -->
            <!-- Hot Sales Content -->
            <div class="container">
                <div class="sales-cn">
                    <div class="row">
                         <!--  Item -->
                        <div class="col-md-6">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-4.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">luxury bus</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">full Air Conditioning</a>,
                                             
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 457</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 1058<small>/night</small></span>
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
                                        <img src="assets/images/deal/img-5.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                     <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">luxury bus</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">full Air Conditioning</a>,
                                             
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 269</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 1175<small>/night</small></span>
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
                                        <img src="assets/images/deal/img-6.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                   <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">luxury bus</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">full Air Conditioning</a>,
                                             
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 354</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 255<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  Item -->
                        <div class="col-xs-6 col-md-3">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-5.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                     <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">luxury bus</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">full Air Conditioning</a>,
                                             
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 269</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 1175<small>/night</small></span>
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
                                        <img src="assets/images/deal/img-6.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                   <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">luxury bus</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">full Air Conditioning</a>,
                                             
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 354</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 255<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  Item -->

                         <!-- End  Item -->

                         <div class="col-md-6">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-4.jpg" alt="">
                                    </a>
                                    <figcaption>
                                        Save <span>30</span>%
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            <a href="#" title="">luxury bus</a>
                                        </div>
                                        <div class="home-sales-places">
                                            <a href="" title="">full Air Conditioning</a>,
                                             
                                        </div>
                                    </div>
                                    <hr class="hr">
                                    <div class="price-box">
                                        <span class="price old-price">From  <del><i class="fa fa-inr"></i> 457</del></span>
                                        <span class="price special-price"><i class="fa fa-inr"></i> 1058<small>/night</small></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End  Item -->
                      
                    </div>
                </div><!-- ./ sales-cn-->
            </div>
            <!-- End Hot Sales Content -->
        </section>
        <!-- End Sales --> 
  

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




<script type="text/javascript">
$( document ).ready(function() {

$('.soucerCityName').select2({
placeholder: 'From',
ajax: {
  url: 'ms-sourceCity.php',
  dataType: 'json',
  delay: 250,
  processResults: function (data) {
    return {
      results: data
    };
  },
  cache: true
}

});
//close city name search

// set sourcecity id  

$('.soucerCityName').on('select2:select', function (e) {
    var data = e.params.data;
    sourceID = data.id;

    $('.bookBusForm').append('<input type="hidden" name="sourceList" value="'+sourceID+'" />');

    console.log(data); 

    $.ajax({
      url: 'ms-getDestination.php',
      type: 'post',
      data: {'sourceID':sourceID},
      dataType: 'json',      
      success: function(data) {
        console.log(data);       
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call   

});

// start destination search

$(".tabciiDestinationCity").select2({
  
placeholder: 'To',
ajax: {
  url: 'ms-destinationCity.php',
  dataType: 'json',
  delay: 250,
  delay: 250,
  processResults: function (data) {
    return {
      results: data
    };
  },
  cache: true
}
});

//closed destination search

// set sourcecity id  

$('.tabciiDestinationCity').on('select2:select', function (e) {
    var data = e.params.data;
    destinationID = data.id;

    $('.bookBusForm').append('<input type="hidden" name="destinationList" value="'+destinationID+'" />');

});


});
</script>

<script type="text/javascript"> 
$(function() {
  $("form[name='bookBusForm']").validate({
    rules: { 
      sourceCity: "required",     
      destinationcity: "required"      
    },
    errorPlacement: function(error, element) 
     {

      error.insertAfter(element);
     },
    messages:{
      sourceCity:{
        required:"Please enter origin city"
      },
      destinationcity:{
        required:"Please enter destination city"
      }
    }
   
  }); 
});
</script>

<?php include 'footer.php' ?>