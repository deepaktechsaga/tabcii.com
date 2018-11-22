
<?php include 'header.php' ?>

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
                <li class="cate-item active col-xs-2">
                    <a data-toggle="tab" href="logistic.php" title=""><span>Logistics</span><img src="assets/images/delivery-truck.png" alt="delivery-truck"></a>
                </li>
                <li class="cate-item col-xs-2">
                    <a href="bus.php" title=""><span>BUS</span><img src="assets/images/icon-bus.png" alt="icon-bus"></a>
                </li>
                <li class="cate-item col-xs-2">
                    <a href="car.php" title=""><span>CAR / Taxi</span><img src="assets/images/icon-sedan-car.png" alt="icon-sedan-car"></a>
                </li>
                <li class="cate-item col-xs-2">
                    <a data-toggle="tab" href="#form-taxi" title=""><span>Ambulance</span><img src="assets/images/ambulance-icon.png" alt="icon-taxi"></a>
                </li>
            </ul>
                    <!-- End Tabs Cat -->

                    <!-- Tabs Content -->
                    <div class="tab-content">
  
                        <!-- Search Tour-->
                        <div class="form-cn form-tour active in tab-pane" id="form-tour">
                            <h2>Where would you like to go?</h2>
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
                                    <option>Vehicle Type</option>
                                    <?php foreach ($vehicles as $value) { ?>                                   
                                    <option value="<?= $value['name']; ?>"><?= $value['name']; ?></option>
                                    <?php } ?>
                            </select> 
                        </div>
                        <div class="form-field field-date">
                            <input type="text" name="weight" class="field-input  " placeholder="Weight">
                        </div>
                        <div class="form-submit">
                            <input  type="submit" name="submit_step1" class="awe-btn awe-btn-medium awe-search" value="Submit">
                        </div>
                    </div>
                    <p class="condition"> We charge <strong>Rs. 200</strong> for per truck booking </p>
                        </div>
                        <!-- End Search Tour -->

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
                                        <img src="assets/images/deal/img-7.jpg" alt="">
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
                                        <img src="assets/images/deal/img-17.jpg" alt="">
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
                                        <img src="assets/images/deal/img-8.jpg" alt="">
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


                         <!--  Item -->
                        <div class="col-xs-6 col-md-3">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-7.jpg" alt="">
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
                                        <img src="assets/images/deal/img-8.jpg" alt="">
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
                            <!--  Item -->
                        <div class="col-md-6">
                            <div class="sales-item">
                                <figure class="home-sales-img">
                                    <a href="" title="">
                                        <img src="assets/images/deal/img-17.jpg" alt="">
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