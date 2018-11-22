<div class="boxed">
    <!--CONTENT CONTAINER-->
    <!--===================================================-->
    <div id="content-container">
        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="pageheader hidden-xs">
            <h3><i class="fa fa-home"></i> Dashboard </h3>
            <div class="breadcrumb-wrapper">
                
                <ol class="breadcrumb">
                    <li class="active"> Dashboard </li>
                </ol>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->
        <!--Page content-->
        <!--===================================================-->
        <div id="page-content">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                    <div class="widgetbox widgetbox-default widgetbox-item-icon">
                        <div class="widgetbox-item-right widgetbox-icon-info"> <span class="fa fa-users"></span> </div>
                        <div class="widgetbox-data-left">
                            <div class="widgetbox-int">0</div>
                            <p>Bookings</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                    <div class="widgetbox widgetbox-default widgetbox-item-icon">
                        <div class="widgetbox-item-right widgetbox-icon-warning"> <span class="fa fa-search"></span> </div>
                        <div class="widgetbox-data-left">
                            <div class="widgetbox-int">0</div>
                            <p>Bookings</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                    <div class="widgetbox widgetbox-default widgetbox-item-icon">
                        <div class="widgetbox-item-right widgetbox-icon-danger"> <span class="fa fa-home"></span> </div>
                        <div class="widgetbox-data-left">
                            <div class="widgetbox-int">0</div>
                            <p>Bookings</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                    <div class="widgetbox widgetbox-default widgetbox-item-icon">
                        <div class="widgetbox-item-right widgetbox-icon-danger"> <span class="fa fa-shopping-cart"></span> </div>
                        <div class="widgetbox-data-left">
                            <div class="widgetbox-int">0</div>
                            <p>Bookings</p>
                        </div>
                    </div>
                </div>
                                                
            </div>
          
         <div class="row">
                
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">                                        
                            <h3 class="panel-title">Recent Booking Log</h3>
                        </div>
                        <div class="panel-body">
                        
                            <table class="table table-hover">
                                            
                                <tr>
                                    <th>Booking-ID</th>
                                    <th>Passenger Email </th>
                                    <th>Passenger Mobile</th>
                                    <th>Passenger Fare</th>
                                    <th>Passenger IdType</th>
                                    <th>Passenger IdNumber</th>                                   
                                </tr> 
                                <?php foreach($booking_data as $data) { ?>                             
                                <tr>                                    
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['passengerEmail']; ?></td>
                                    <td><?php echo $data['passengerMobile']; ?></td>
                                    <td><?php echo $data['passengerFare']; ?></td>
                                    <td><?php echo $data['passengerIdType']; ?></td>
                                    <td><?php echo $data['passengerIdNumber']; ?></td>                             
                                </tr>
                               <?php } ?>
                            </table>
                         </div>
                        </div>
                    </div>                    
                </div>

        </div>
        <!--===================================================-->
        <!--End page content-->
    </div>
    <!--===================================================-->
    <!--END CONTENT CONTAINER-->
</div>