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
                            <a data-toggle="tab" href="#form-tour" title=""><span>Logistics</span><img src="assets/images/delivery-truck.png" alt=""></a>
                        </li>
                        <li class="cate-item col-xs-2">
                            <a data-toggle="tab" href="#form-car" title="">
                                <span>CAR</span>
                                <img src="assets/images/icon-sedan-car.png" alt="">
                            </a>
                        </li>
                        <li class="cate-item col-xs-2">
                            <a data-toggle="tab" href="#form-bus" title=""><span>BUS</span><img src="assets/images/icon-bus.png" alt=""></a>
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
                        </div>
                        <!-- End Search Tour -->
                        <!-- Search Car-->
                        <div class="form-cn form-flight tab-pane" id="form-car">
                            <h2 style="display: block; text-align: center;">COMING SOON </h2>
                            <div class="form-search clearfix" style="display: none;">
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
                                        <span>seater</span>
                                        <select> 
                                            <option>4</option>
                                            <option>4</option>
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
                        
                          <!-- Search bus -->
                        <div class="form-cn form-car tab-pane " id="form-bus">
                            <h2 style="display: block; text-align: center;">COMING SOON </h2>
                            <div class="form-search clearfix" style="display: none;">
                                 
                                <div class="form-field field-picking">
                                    <label for="picking"><span>PickUp:</span> </label>
                                    <input type="text" id="picking" class="field-input">
                                </div>
                                <div class="form-field field-droping">
                                    <input type="text" class="field-input" placeholder="Droping off">
                                </div>
                                <div class="form-field field-date">
                                    <input type="text" class="field-input calendar-input" placeholder="Pink up date">
                                </div>

                                 <div class="form-field field-date">
                                    <input type="text" class="field-input phone " placeholder="Mobile No">
                                </div>
                                
                                <div class="form-submit">
                                    <button type="submit" class="awe-btn awe-btn-lager awe-search">Search</button>
                                </div>
                            </div>
                        </div>
                        <!-- End Search bus -->
 

                    </div>
                    <!-- End Tabs Content -->

                </div>
                <!-- End Banner Content -->

            </div>

        </section>
        <!--End Banner-->
        
        <!-- Cruise Deals -->
        <section class="cruise-deals">
             <!-- Title -->
            <div class="title-wrap">
                <div class="head-title"> 
                    <div class="container">
                        <div class="travel-title float-left">
                            <h2>ALL Services</h2>
                        </div>
                        <a href="#" title="" class="awe-btn awe-btn-5 awe-btn-lager arrow-right text-uppercase float-right">View ALL  </a>
                    </div>
                </div>
            </div>
            <!-- End Title -->
            <!-- Cruise Deals Content -->
            <div class="container">
                <div class="cruise-deals-cn clearfix">
                    <!-- Cruise Deal Item -->
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="cruise-deal-item">
                            <figure class="cruise-img">
                                <a href="" title="">
                                    <img src="assets/images/deal/img-9.jpg" alt="">
                                </a>
                            </figure>
                            <div class="cruise-text">
                                <div class="cruise-name">
                                    <a href="#" title="">Los Angeles</a>
                                </div>
                                <div class="cruise-night">
                                    <span>9 nights</span> - 05/12 - 12/14
                                </div>
                                <hr class="hr">
                                <div class="price-box">
                                    <span class="price old-price">Only  <del><i class="fa fa-inr"></i> 269</del></span>
                                    <span class="price special-price"><i class="fa fa-inr"></i> 44</span>
                                    <a href="#" class="awe-btn awe-btn-medium" style="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cruise Deal Item -->
                    <!-- Cruise Deal Item -->
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="cruise-deal-item">
                            <figure class="cruise-img">
                                <a href="" title="">
                                    <img src="assets/images/deal/img-10.jpg" alt="">
                                </a>
                            </figure>
                            <div class="cruise-text">
                                <div class="cruise-name">
                                    <a href="#" title="">Fort Lauderdale</a>
                                </div>
                                <div class="cruise-night">
                                    <span>9 nights</span> - 05/12 - 12/14
                                </div>
                                <hr class="hr">
                                <div class="price-box">
                                    <span class="price old-price">Only  <del><i class="fa fa-inr"></i> 345</del></span>
                                    <span class="price special-price"><i class="fa fa-inr"></i> 65</span>
                                    <a href="#" class="awe-btn awe-btn-medium" style="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cruise Deal Item -->
                    <!-- Cruise Deal Item -->
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="cruise-deal-item">
                            <figure class="cruise-img">
                                <a href="" title="">
                                    <img src="assets/images/deal/img-11.jpg" alt="">
                                </a>
                            </figure>
                            <div class="cruise-text">
                                <div class="cruise-name">
                                    <a href="#" title="">Seattle</a>
                                </div>
                                <div class="cruise-night">
                                    <span>9 nights</span> - 05/12 - 12/14
                                </div>
                                <hr class="hr">
                                <div class="price-box">
                                    <span class="price old-price">Only  <del><i class="fa fa-inr"></i> 269</del></span>
                                    <span class="price special-price"><i class="fa fa-inr"></i> 80</span>
                                    <a href="#" class="awe-btn awe-btn-medium" style="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cruise Deal Item -->
                    <!-- Cruise Deal Item -->
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="cruise-deal-item">
                            <figure class="cruise-img">
                                <a href="" title="">
                                    <img src="assets/images/deal/img-12.jpg" alt="">
                                </a>
                            </figure>
                            <div class="cruise-text">
                                <div class="cruise-name">
                                    <a href="#" title="">Atlanta</a>
                                </div>
                                <div class="cruise-night">
                                    <span>9 nights</span> - 05/12 - 12/14
                                </div>
                                <hr class="hr">
                                <div class="price-box">
                                    <span class="price old-price">Only  <del><i class="fa fa-inr"></i> 269</del></span>
                                    <span class="price special-price"><i class="fa fa-inr"></i> 93</span>
                                    <a href="#" class="awe-btn awe-btn-medium" style="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cruise Deal Item -->
                    <!-- Cruise Deal Item -->
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="cruise-deal-item">
                            <figure class="cruise-img">
                                <a href="" title="">
                                    <img src="assets/images/deal/img-13.jpg" alt="">
                                </a>
                            </figure>
                            <div class="cruise-text">
                                <div class="cruise-name">
                                    <a href="#" title="">Atlanta</a>
                                </div>
                                <div class="cruise-night">
                                    <span>9 nights</span> - 05/12 - 12/14
                                </div>
                                <hr class="hr">
                                <div class="price-box">
                                    <span class="price old-price">Only  <del><i class="fa fa-inr"></i> 269</del></span>
                                    <span class="price special-price"><i class="fa fa-inr"></i> 95</span>
                                    <a href="#" class="awe-btn awe-btn-medium" style="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cruise Deal Item -->
                    <!-- Cruise Deal Item -->
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="cruise-deal-item">
                            <figure class="cruise-img">
                                <a href="" title="">
                                    <img src="assets/images/deal/img-14.jpg" alt="">
                                </a>
                            </figure>
                            <div class="cruise-text">
                                <div class="cruise-name">
                                    <a href="#" title="">Las Vegas</a>
                                </div>
                                <div class="cruise-night">
                                    <span>9 nights</span> - 05/12 - 12/14
                                </div>
                                <hr class="hr">
                                <div class="price-box">
                                    <span class="price old-price">Only  <del><i class="fa fa-inr"></i> 269</del></span>
                                    <span class="price special-price"><i class="fa fa-inr"></i> 175</span>
                                    <a href="#" class="awe-btn awe-btn-medium" style="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cruise Deal Item -->
                    <!-- Cruise Deal Item -->
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="cruise-deal-item">
                            <figure class="cruise-img">
                                <a href="" title="">
                                    <img src="assets/images/deal/img-7.jpg" alt="">
                                </a>
                            </figure>
                            <div class="cruise-text">
                                <div class="cruise-name">
                                    <a href="#" title="">San Francisco</a>
                                </div>
                                <div class="cruise-night">
                                    <span>9 nights</span> - 05/12 - 12/14
                                </div>
                                <hr class="hr">
                                <div class="price-box">
                                    <span class="price old-price">Only  <del><i class="fa fa-inr"></i> 269</del></span>
                                    <span class="price special-price"><i class="fa fa-inr"></i> 134</span>
                                    <a href="#" class="awe-btn awe-btn-medium" style="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cruise Deal Item -->
                    <!-- Cruise Deal Item -->
                    <div class="col-xs-6 col-md-4 col-lg-3">
                        <div class="cruise-deal-item">
                            <figure class="cruise-img">
                                <a href="" title="">
                                    <img src="assets/images/deal/img-16.jpg" alt="">
                                </a>
                            </figure>
                            <div class="cruise-text">
                                <div class="cruise-name">
                                    <a href="#" title="">Orlando</a>
                                </div>
                                <div class="cruise-night">
                                    <span>9 nights</span> - 05/12 - 12/14
                                </div>
                                <hr class="hr">
                                <div class="price-box">
                                    <span class="price old-price">Only  <del><i class="fa fa-inr"></i> 269</del></span>
                                    <span class="price special-price"><i class="fa fa-inr"></i> 137</span>
                                    <a href="#" class="awe-btn awe-btn-medium" style="">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Cruise Deal Item -->
                </div>
            </div>
            <!-- End Cruise Deals Content -->
        </section>
        <!-- End Cruise Deals -->




<?php include 'footer.php' ?>