
<?php     
include_once 'config.php' ;

    $sql = "SELECT * FROM vehicles where is_active = 1";    
    $result =   mysqli_query($conn, $sql);    
    $vehicles = array();

    while($data = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    //will output all data on each loop.
    $vehicles[] = array('id'=>$data['id'],'name'=>$data['name']); 
   }

   //check if form1 submitted

    if(isset($_POST['submit_step1']))
    {   
        $_SESSION['user_id']            = $_POST['user_id'];
        $_SESSION['pickuplocation']     = $_POST['pickuplocation'];
        $_SESSION['pickuplocation_Lat'] = $_POST['pickuplocation_Lat'];
        $_SESSION['pickuplocation_Lng'] = $_POST['pickuplocation_Lng'];
        $_SESSION['droplocation']       = $_POST['droplocation'];
        $_SESSION['droplocation_Lat']   = $_POST['droplocation_Lat'];
        $_SESSION['droplocation_Lng']   = $_POST['droplocation_Lng'];
        $_SESSION['vehicle_type']       = $_POST['vehicle_type'];
        $_SESSION['phone']              = $_POST['phone'];
        $_SESSION['num_of_truck']       = $_POST['num_of_truck'];
        $_SESSION['totalAmount']        = $_POST['totalAmount'];

        header("location:confirm_details.php");
    }
    
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
                <img src="assets/images/logo-banner.png" alt="logo-banner">
            </a>
        </div>
        <!-- Banner Content -->
        <div class="banner-cn">
            <!-- Tabs Cat Form -->
            <ul class="tabs-cat text-center row">
                <li class="cate-item active col-xs-2">
                    <a data-toggle="tab" href="#formTruck" title=""><span>Logistics</span><img src="assets/images/delivery-truck.png" alt="delivery-truck"></a>
                </li>
                <li class="cate-item col-xs-2">
                    <a href="bus.php" title=""><span>BUS</span><img src="assets/images/icon-bus.png" alt="icon-bus"></a>
                </li>
                <li class="cate-item col-xs-2">
                    <a href="car.php" title=""><span>CAR / Taxi</span><img src="assets/images/icon-sedan-car.png" alt="icon-sedan-car"></a>
                </li>
                <li class="cate-item col-xs-2">
                    <a href="ambulance.php" title=""><span>Ambulance</span><img src="assets/images/ambulance-icon.png" alt="icon-taxi"></a>
                </li>
            </ul>
            <!-- End Tabs Cat -->
            <style type="text/css">
                .form-cn .form-search {display: none;}
            </style>
            <!-- Tabs Content -->
            <div class="tab-content">
                
                <!-- Search Truck-->
                <div class="form-cn form-tour active tab-pane" id="formTruck">
                   <h1>Where would you like to go?</h1> 
                    <form method="post" name="bookLogistickForm" action="<?= $_SERVER["PHP_SELF"] ?>">
                    <div class="form-search clearfix" style="display: block;">
                        <div class="form-field field-droping">
                            <input type="text" class="field-input" name="pickuplocation" id="pickuplocation" placeholder="PickUp Location">
                            <input type="hidden" name="pickuplocation_Lat" id="pickuplocation_Lat" >
                             <input type="hidden" name="pickuplocation_Lng" id="pickuplocation_Lng" >
                        </div>
                        <div class="form-field field-droping">
                            <input type="text" class="field-input" name="droplocation" id="droplocation" placeholder="Destination">
                             <input type="hidden" name="droplocation_Lat" id="droplocation_Lat" >
                            <input type="hidden" name="droplocation_Lng" id="droplocation_Lng" >
                        </div>
                        <div class="form-field field-date">
                            <input type="text" class="field-input phone " name="phone" placeholder="Mobile Number">
                        </div>
                        
                        <div class="form-field field-select field-style">
                            <select class="form-control vehicle_type" name="vehicle_type">
                                    <option value="">Vehicle Type</option>
                                    <?php foreach ($vehicles as $value) { ?>                                   
                                    <option value="<?= $value['name']; ?>"><?= $value['name']; ?></option>
                                    <?php } ?>
                            </select> 
                        </div>
                        <div class="form-field field-date">
                            <input type="text" name="num_of_truck" id="num_of_truck" class="field-input " value="" placeholder="No of Trucks">
                        </div>

                        <input type="hidden" id="totalAmount" name="totalAmount" value="">

                        <div class="form-submit">
                            <input  type="submit" name="submit_step1" class="awe-btn awe-btn-medium awe-search" value="Submit">
                        </div>
                    </div>
                    </form>
                    <p class="condition"> We charge <strong>Rs. 200</strong> per truck booking </p></br>
                     <p> <center> (Rs. 200 will be Adjusted in Final Bill) </center></p>
                </div>
                <div class="form-cn form-car tab-pane " id="form-bus">
                </div>
                <div class="form-cn form-flight in tab-pane" id="form-car">
                    
                    <div class="form-search clearfix">
                        <div class="form-field field-select field-children">
                            <div class="select">
                                <span>Your Trip</span>
                                <select>
                                    <option>One Way</option>
                                    <option>Round Trip</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-field field-from">
                            <label for="flight-from"><span></span> </label>
                            <input id="searchInput1" name="flightfrom" class="field-input" type="text" placeholder="PickUp">
                            <div class="map"></div> </br>
                        </div>
                        <div class="form-field field-to">
                            <label for="flight-to"><span> </span></label>
                            <input id="searchInput2" class="field-input" type="text" placeholder="Destination">
                            <div class="map"></div>
                        </div>
                        <div class="form-field field-date">
                            <input type="text" class="field-input calendar-input" placeholder="Pickup Date">
                        </div>
                        <div class="form-field field-date">
                            <input type="text" class="field-input calendar-input" placeholder="Drop Date">
                        </div>
                        <div class="form-field field-select field-adult">
                            <div class="select">
                                <span>Seater</span>
                                <select>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <button type="submit" class="awe-btn awe-btn-medium awe-search">Search</button>
                        </div>
                    </div>
                </div>
                <!-- End Search Car -->
                
                <!-- Search taxi-->
                <div class="form-cn form-flight in tab-pane" id="form-taxi">
                    
                    <div class="form-search clearfix">
                        <div class="form-field field-select field-children">
                            <div class="select">
                                <span>Your Trip</span>
                                <select>
                                    <option>One Way</option>
                                    <option>Round Trip</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-field field-from">
                            <label for="flight-from"><span>PickUp</span> </label>
                            <input type="text" name="flightfrom" id="flight-from" class="field-input">
                        </div>
                        <div class="form-field field-to">
                            <label for="flight-to"><span> Destination</span></label>
                            <input type="text" id="flight-to" class="field-input">
                        </div>
                        <div class="form-field field-date">
                            <input type="text" class="field-input calendar-input" placeholder="Pickup Date">
                        </div>
                        <div class="form-field field-date">
                            <input type="text" class="field-input calendar-input" placeholder="Drop Date">
                        </div>
                        <div class="form-field field-select field-adult">
                            <div class="select">
                                <span data-toggle="modal" data-target="#myModaltaxi">Model</span>
                                <!-- <select>
                                    <option>4</option>
                                    <option>4</option>
                                    <option>4</option>
                                </select> -->
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <button type="submit" class="awe-btn awe-btn-medium awe-search">Search</button>
                        </div>
                    </div>
                </div>
                <!-- End Search taxi -->
            </div>
            <!-- End Tabs Content -->
        </div>
        <!-- End Banner Content -->
    </div>
</section>
<h1></h1>
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
<!-- top 4 services car start  -->
<div class="clearfix"></div>
<section class="topfor-service-holder">
    <div class="title-wrap">
        <div class="head-title">
            <div class="container">
                <div class="travel-title float-left">
                    <h2>Truck Booking Features</h2>
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
                        <i class="f glyph-icon flaticon-placeholder"></i>
                        <div class="topfor-tyext">
                            <h2>RELOCATION SERVICE</h2>
                            <p>Looking for High-quality Professional Packaging and Moving Services. Allow us to handle all this.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-moving-truck"></i>
                        <div class="topfor-tyext">
                            <h2>CONSTRUCTION SUPPLIES</h2>
                            <p>Looking for Truck to Supply Construction Material at your Construction Site. Then, YES you are at Right Place</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-groceries"></i>
                        <div class="topfor-tyext">
                            <h2>PERISHABLE SUPPLIES</h2>
                            <p>We offers you the high-quality Service of transportation of Perishable goods like Food, Medical Items etc.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-big-screen"></i>
                        <div class="topfor-tyext">
                            <h2>EVENT MANAGEMENT SUPPLIES</h2>
                            <p>We also Provide Service to Transport your Event Management Supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- top 4 services car end -->
<!-- top 4 services car start  -->
<div class="clearfix"></div>
<section class="topfor-service-holder">
    <div class="title-wrap">
        <div class="head-title">
            <div class="container">
                <div class="travel-title float-left">
                    <h2>Taxi Booking Features</h2>
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
                        <i class="f glyph-icon flaticon-auto-insurance"></i>
                        <div class="topfor-tyext">
                            <h2>FASTER</h2>
                            <p>Find and book at your ease with the tap of a button, all on a single screen.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-seat-belt"></i>
                        <div class="topfor-tyext">
                            <h2>SAFER</h2>
                            <p>Track your driver identity & cab info on the go. Only verified chauffer’s/ drivers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-embarrassed"></i>
                        <div class="topfor-tyext">
                            <h2>SEAMLESS EXPERIENCE</h2>
                            <p>Enjoy the seamless app & one-touch service. Effortless payment through your mobile phone.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-network"></i>
                        <div class="topfor-tyext">
                            <h2>SHARE YOUR RIDE</h2>
                            <p>Share your ride with your family & friend on the go. Sharing is Caring</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- top 4 services car end -->
<!-- top 4 services car start  -->
<div class="clearfix"></div>
<section class="topfor-service-holder">
    <div class="title-wrap">
        <div class="head-title">
            <div class="container">
                <div class="travel-title float-left">
                    <h2>Ambulance Booking Features</h2>
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
                        <i class="f glyph-icon flaticon-helicopter"></i>
                        <div class="topfor-tyext">
                            <h2>On the go convenience</h2>
                            <p>One touch access to medical emergency Services</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-first-aid-kit"></i>
                        <div class="topfor-tyext">
                            <h2>Advance Booking</h2>
                            <p>Book ambulances in advance for hassle-free hospital visits</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-tag"></i>
                        <div class="topfor-tyext">
                            <h2>Transparent pricing</h2>
                            <p>Convenient mechanism, with online and cash payment mode.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="topfor-service">
                        <i class="f glyph-icon flaticon-emergency-call"></i>
                        <div class="topfor-tyext">
                            <h2>Emergency contact</h2>
                            <p>Keep your dear ones close with emergency contact option.</p>
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
                                <img src="assets/images/taxi-1.jpg" alt="taxi-1">
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
                                <img src="assets/images/taxi-2.jpg" alt="taxi-2">
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
                                <img src="assets/images/taxi-3.jpg" alt="taxi-3">
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
                
            </div>
        </div>
    </div>
    <!-- End Hot Sales Content -->
</section>
<!-- End Sales -->
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
                                <img src="assets/images/taxi-4.jpg" alt="taxi-4">
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
                                <img src="assets/images/taxi-5.jpg" alt="taxi-5">
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
                                <img src="assets/images/taxi-6.jpg" alt="taxi-6">
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
                
            </div>
            </div><!-- ./ sales-cn-->
        </div>
        <!-- End Hot Sales Content -->
    </section>
    <!-- End Sales -->
    <!-- Sales -->
    <section class="sales">
        <!-- Title -->
        <div class="title-wrap">
            <div class="head-title">
                <div class="container">
                    <div class="travel-title float-left">
                        <h2> Logistics</h2>
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
                    <div class="col-xs-6 col-md-3">
                        <div class="sales-item">
                            <figure class="home-sales-img">
                                <a href="" title="">
                                    <img src="assets/images/taxi-7.jpg" alt="taxi-7">
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
                    <div class="col-md-6">
                        <div class="sales-item">
                            <figure class="home-sales-img">
                                <a href="" title="">
                                    <img src="assets/images/taxi-17.jpg" alt="taxi-17">
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
                                    <img src="assets/images/taxi-8.jpg" alt="taxi-8">
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

        <?php include 'footer.php' ?>
        <!-- Modal Logistics Start -->
        <div id="myModalLogistics" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Vehicle Type</h4>
                    </div>
                    <div class="modal-bodyscrol">
                        <div class="modal-body">
                            
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-1.jpg" alt="logi-1">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                Champion
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-2.jpg" alt="logi-2">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                ACE
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-3.jpg" alt="logi-3">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                Chota Hathi
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-4.jpg" alt="logi-4">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                Turbo
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-5.jpg" alt="logi-5">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                LTP 1613
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-6.jpg" alt="logi-6">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                LGC 1518
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-7.jpg" alt="logi-7">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                Eicher 14 feet
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-8.jpg" alt="logi-8">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                Eicher 19 feet
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-9.jpg" alt="logi-9">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                Eicher 17 feet
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-10.jpg" alt="logi-10">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                20 feet closed
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-11.jpg" alt="logi-11">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                9 ton / 6 wheel
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-12.jpg" alt="logi-12">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                16 ton / 10 wheel
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-13.jpg" alt="logi-13">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                21 ton / 12 wheel
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-14.jpg" alt="logi-14">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                25 ton / 14 wheel
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-md-4">
                                <div class="sales-item modl-item">
                                    <figure class="home-sales-img">
                                        
                                        <img src="assets/images/logi-6.jpg" alt="logi-6">
                                        
                                        <figcaption>
                                        
                                        </figcaption>
                                    </figure>
                                    <div class="home-sales-text">
                                        <div class="home-sales-name-places">
                                            <div class="home-sales-name">
                                                LGC 1518
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Logistics end -->
        <!-- Modal taxi Start -->
        <div id="myModaltaxi" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Taxi</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="col-xs-6 col-md-4">
                            <div class="sales-item modl-item">
                                <figure class="home-sales-img">
                                    
                                    <img src="assets/images/ambulance.jpg" alt="ambulance">
                                    
                                    <figcaption>
                                    
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            Ambulance
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-6 col-md-4">
                            <div class="sales-item modl-item">
                                <figure class="home-sales-img">
                                    
                                    <img src="assets/images/obituary.jpg" alt="obituary">
                                    
                                    <figcaption>
                                    
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            Obituary
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xs-6 col-md-4">
                            <div class="sales-item modl-item">
                                <figure class="home-sales-img">
                                    
                                    <img src="assets/images/taxi-1.jpg" alt="">
                                    
                                    <figcaption>
                                    
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            Maruti Suzuki Ciaz
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <div class="sales-item modl-item">
                                <figure class="home-sales-img">
                                    
                                    <img src="assets/images/taxi-2.jpg" alt="">
                                    
                                    <figcaption>
                                    
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            Honda
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xs-6 col-md-4">
                            <div class="sales-item modl-item">
                                <figure class="home-sales-img">
                                    
                                    <img src="assets/images/taxi-3.jpg" alt="taxi-3">
                                    
                                    <figcaption>
                                    
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            Audi Q4
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <div class="sales-item modl-item">
                                <figure class="home-sales-img">
                                    
                                    <img src="assets/images/taxi-4.jpg" alt="taxi-4">
                                    
                                    <figcaption>
                                    
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            Toyota Yaris iA
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <div class="sales-item modl-item">
                                <figure class="home-sales-img">
                                    
                                    <img src="assets/images/taxi-5.jpg" alt="taxi-5">
                                    
                                    <figcaption>
                                    
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            Toyota  EZ
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <div class="sales-item modl-item">
                                <figure class="home-sales-img">
                                    
                                    <img src="assets/images/taxi-6.jpg" alt="taxi-6">
                                    
                                    <figcaption>
                                    
                                    </figcaption>
                                </figure>
                                <div class="home-sales-text">
                                    <div class="home-sales-name-places">
                                        <div class="home-sales-name">
                                            BMW 5 Series
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal taxi end -->


<script type="text/javascript">    

// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='bookLogistickForm']").validate({
    // Specify validation rules
    rules: {      
      pickuplocation: "required",
      droplocation: "required",
      phone: {required:true,number:true,minlength: 10},
      vehicle_type: "required",
      num_of_truck: {required:true,number:true},
            
    },
    // Specify validation error messages
    messages: {
      pickuplocation: "Enter your pickuplocation",
      droplocation: "Enter your droplocation",      
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

$('#num_of_truck').keyup(function(e){

var totalAmount = 0;
var num_of_truck = $('#num_of_truck').val();
var charges_per_truck  = 200;
totalAmount = num_of_truck * charges_per_truck;

$('#totalAmount').val(totalAmount);

});

});

</script>        


<script type="text/javascript">
  
 function initialize_auto() {
       var options = {
       //types: ['(cities)'],
       componentRestrictions: {country: "IN"}
       };

        var pickuplocation = document.getElementById('pickuplocation');
        var autocomplete = new google.maps.places.Autocomplete(pickuplocation, options);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace(place);
            document.getElementById('pickuplocation_Lat').value = place.geometry.location.lat();
            document.getElementById('pickuplocation_Lng').value = place.geometry.location.lng();
        });

        var droplocation = document.getElementById('droplocation');
        var autocomplete2 = new google.maps.places.Autocomplete(droplocation, options);
        google.maps.event.addListener(autocomplete2, 'place_changed', function () {
            var place2 = autocomplete2.getPlace();
            document.getElementById('droplocation_Lat').value = place2.geometry.location.lat();
            document.getElementById('droplocation_Lng').value = place2.geometry.location.lng();
            
        });
    }

google.maps.event.addDomListener(window, 'load', initialize_auto); 
     
function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
      return true;
    }
};


</script>

</body>
</html>
