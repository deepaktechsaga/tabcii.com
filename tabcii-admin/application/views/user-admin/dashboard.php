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
                        <div class="widgetbox-item-right widgetbox-icon-info"> <span class="fa fa-bus"></span> </div>
                        <div class="widgetbox-data-left">
                            <div class="widgetbox-int"><?php $count1 = $this->db->query("SELECT t.*,u.* FROM tabcii_bus_booking AS t JOIN users AS u ON t.userId=u.id where u.id=".$this->session->userdata('userid'));
                            echo $count1->num_rows();
                            ?></div><p>Bus Bookings</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                    <div class="widgetbox widgetbox-default widgetbox-item-icon">
                        <div class="widgetbox-item-right widgetbox-icon-warning"> <span class="fa fa-truck"></span> </div>
                        <div class="widgetbox-data-left">
                            <div class="widgetbox-int">
                                <?php $count2 = $this->db->query("SELECT f.*,u.* FROM front_queries AS f JOIN users AS u ON f.user_id=u.id where u.id=".$this->session->userdata('userid'));
                               echo $count2->num_rows();
                            ?></div><p>Truck Booking</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                    <div class="widgetbox widgetbox-default widgetbox-item-icon">
                        <div class="widgetbox-item-right widgetbox-icon-danger"> <span class="fa fa-car"></span> </div>
                        <div class="widgetbox-data-left">
                            <div class="widgetbox-int">
                                <?php $count3 = $this->db->query("SELECT c.*,u.* FROM car_enquiry AS c JOIN users AS u ON c.user_id=u.id where u.id=".$this->session->userdata('userid'));
                                 echo $count3->num_rows();
                                 ?>
                                 </div>
                            <p>Car Bookings</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12">
                    <div class="widgetbox widgetbox-default widgetbox-item-icon">
                        <div class="widgetbox-item-right widgetbox-icon-danger"> <span class="fa fa-ambulance"></span> </div>
                        <div class="widgetbox-data-left">
                            <div class="widgetbox-int"> <?php $count4 = $this->db->query("SELECT a.*,u.* FROM ambulance_enquiry AS a JOIN users AS u ON a.user_id=u.id where u.id=".$this->session->userdata('userid'));
                                echo $count4->num_rows();
                                ?></div>

                            <p>Ambulance</p>
                        </div>
                    </div>
                </div>
                                                
            </div>
          
         <div class="row">
                
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">                                        
                            <h3 class="panel-title">Recent Bus Booking</h3>
                        </div>
                        <div class="panel-body" style="min-height: 161px;">
                        
                            <table class="table table-hover">
                                            
                                <tr>
                                    <th>Email </th>
                                    <th>Mobile</th>
                                    <th>Fare</th>
                                    <th>IdNumber</th>                                   
                                </tr> 
                                <?php 
                                $id=$this->session->userdata('userid');
                                $query = $this->db->query("SELECT t.*,u.* FROM tabcii_bus_booking AS t JOIN users AS u ON t.userId=u.id where u.id= $id ORDER BY u.id DESC LIMIT 5")->result();
                                                if(count($query) > 0 ){
                                                foreach ($query as $key => $data) { ?>                             
                                <tr>                                    
                                    <td><?php echo $data->email ; ?></td>
                                    <td><?php echo $data->mobile; ?></td>
                                    <td><?php echo $data->passengerFare; ?></td>
                                    <td><?php echo $data->passengerIdNumber; ?></td>                             
                                </tr>
                              <?php } }else{ ?>
                        <tr>
                        <td colspan="12" style="text-align: center;color: red;font-size: 16px;"><h3>You Don't have any booking yet!</h3></td>
                      </tr>
                       <?php }  ?>
                            </table>
                         </div>
                        </div>
                    </div> 

                    <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">                                        
                            <h3 class="panel-title">Recent Truck Booking</h3>
                        </div>
                        <div class="panel-body" style="min-height: 161px;">
                        
                            <table class="table table-hover">
                                            
                                <tr>
                                    <th>Pick up  </th>
                                    <th>Drop</th>
                                    <th>Mobile</th>
                                    <th>Email</th>                                   
                                </tr> 
                                <?php 
                                $id=$this->session->userdata('userid');
                                $query = $this->db->query("SELECT f.*,u.* FROM front_queries AS f JOIN users AS u ON f.user_id=u.id where u.id= $id ORDER BY u.id DESC LIMIT 5")->result();
                                                 if(count($query) > 0 ){
                                                foreach ($query as $key => $data) { ?>                             
                                <tr>                                    
                                    <td><?php $string= strip_tags($data->prepickuplocation);
                                    if (strlen($string) > 25) {
                                        $stringCut = substr($string, 0, 25);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                    }

                                    echo $string; ?></td>
                                    <td><?php $string= strip_tags($data->predroplocation);
                                    if (strlen($string) > 20) {
                                        $stringCut = substr($string, 0, 20);
                                        $endPoint = strrpos($stringCut, ' ');
                                        $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                                    }

                                    echo $string; ?></td>
                                    <td><?php echo $data->premobile; ?></td>
                                    <td><?php echo $data->preemail; ?></td>                             
                                </tr>
                              <?php } }else{ ?>
                        <tr>
                        <td colspan="12" style="text-align: center;color: red;font-size: 16px;"><h3>You Don't have any booking yet!</h3></td>
                      </tr>
                       <?php }  ?>
                            </table>
                         </div>
                        </div>
                    </div>    
                    <div class="row">
                
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">                                        
                            <h3 class="panel-title">Recent Ambulance Booking</h3>
                        </div>
                        <div class="panel-body" style="min-height: 161px;">
                        
                            <table class="table table-hover">
                                            
                                <tr>
                                    <th>Source</th>
                                    <th>Destination</th>
                                    <th>Pickup date</th>
                                                                  
                                </tr> 
                                <?php 
                                $id=$this->session->userdata('userid');
                                $query = $this->db->query("SELECT a.*,u.* FROM ambulance_enquiry AS a JOIN users AS u ON a.user_id=u.id where u.id= $id ORDER BY u.id DESC LIMIT 5")->result();
                                if(count($query) > 0 ){
                                foreach ($query as $key => $data) { ?>                             
                                <tr>                                    
                                    <td><?php echo $data->source; ?></td>
                                    <td><?php echo $data->destination; ?></td>
                                    <td><?php echo $data->pickup_date; ?></td>
                                                               
                                </tr>
                              <?php } }else{ ?>
                        <tr>
                        <td colspan="12" style="text-align: center;color: red;font-size: 16px;"><h3>You Don't have any booking yet!</h3></td>
                      </tr>
                       <?php }  ?>
                            </table>
                         </div>
                        </div>
                    </div> 

                    <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">                                        
                            <h3 class="panel-title">Recent Car Booking</h3>
                        </div>
                        <div class="panel-body" style="min-height: 161px;">
                        
                            <table class="table table-hover">
                                            
                                <tr>
                                    <th>Trip Type </th>
                                    <th>Pickup date</th>
                                    <th>Drop Date</th>
                                                                   
                                </tr> 
                                <?php 
                                $id=$this->session->userdata('userid');
                                $query = $this->db->query("SELECT c.*,u.* FROM car_enquiry AS c JOIN users AS u ON c.user_id=u.id where u.id= $id ORDER BY u.id DESC LIMIT 5")->result();
                                                //print_r($query);
                                if(count($query) > 0 ){
                                                foreach ($query as $key => $data) { ?>                             
                                <tr>                                    
                                    <td><?php echo $data->trip_type; ?></td>
                                   <td><?php echo $data->pickup_date; ?></td>
                                    <td><?php echo $data->drop_date; ?></td>
                                                              
                                </tr>
                              <?php } }else{ ?>
                        <tr>
                        <td colspan="12" style="text-align: center; color: red;font-size: 16px;"><h3>You Don't have any booking yet!</h3></td>
                      </tr>
                       <?php }  ?>
                           
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