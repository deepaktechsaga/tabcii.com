<div class="boxed">
  <!--CONTENT CONTAINER-->
  <!--===================================================-->
  <div id="content-container">
    <div class="pageheader hidden-xs">
      <h3><i class="fa fa-home"></i> Booking Logs </h3>
      <div class="breadcrumb-wrapper">
        
        <ol class="breadcrumb">
          <li> <a href="<?php echo base_url(); ?>index.php/admin/dashboard"> Home </a> </li>
          <li class="active"> Booking Logs </li>
          <li> <a href="<?php echo base_url(); ?>index.php/admin/manage_log"> Back </a> </li>
        </ol>
      </div>
    </div>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
      <!-- <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
          <div class="userWidget-1">
            <div class="avatar bg-info">
              <img alt="Profile Picture" class="widget-img img-border-light" src="<?php echo base_url(); ?>assets/user-img.jpg">
              
              <div class="name osLight">test </div>
            </div>
            
            <div class="address">address </div>
            <br>
     
            <div class="clearfix"> </div>
          </div>
          <div class="panel">
            <div class="panel-heading">
              <h3 class="panel-title"><i class="fa fa-user"> </i> Account Status</h3>
            </div>
            <div class="panel-body">
              <table class="table table-user-information">
                <tbody>
                  
                  <tr>
                    <td>Package :</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <td>Package started:</td>
                    <td> </td>
                  </tr>
                  <tr>
                    <td>Package Expired:</td>
                    <td><span class="label label-danger">
                    </span></td>
                  </tr>
                  <tr>
                    <td>Joined date:</td>
                    <td> </td>
                  </tr>
                  
                  
                </tbody>
              </table>
              
              
            </div>
          </div>
          
          
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
          <div class="panel">
            <div class="panel-body pad-no">
              
              <div class="tab-base">      
                <ul class="nav nav-tabs">
                  <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1"> About </a> </li>                  
                  
                </ul>
               
                <div class="tab-content">
                  <div id="demo-lft-tab-1" class="tab-pane fade active in">
                   
                      <?php foreach($log_data as $data) { ?>  
                    <table class="table table-user-information">                         
                      <tbody>                                  
                        <tr>
                          <td>Email:</td>
                          <td> <?php echo $data['passengerEmail']; ?></td>
                        </tr>
 
                        <tr>
                          <td>Contact Number</td>
                          <td> </td>
                        </tr>
                        
                        <tr>
                          <td>Address</td>
                          <td>  </td>
                        </tr>
                        
                        <tr>
                          <td>City </td>
                          <td> </td>
                        </tr>
                        <tr>
                          <td>State  </td>
                          <td> </td>
                        </tr>
                        <tr>
                          <td>Country </td>
                          <td> </td>
                        </tr>
                        
                   
                      </tbody>

                    </table>
                    <?php } ?> 
                   
                  </div>
                  
                  
                </div>
              </div>
      
            </div>
          </div>
        </div>
      </div> -->
      
      <div class="panel">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-user"> </i> Passenger Detail</h3>
        </div>
        <div class="panel-body">
          <table class="table table-hover">
            <tr>
              <th>Emp-ID</th>
              <th>Name</th>
              <th>age</th>
              <th>Gender</th>              
            </tr>
           <?php foreach($passenger_data as $data) { ?>
            <tr>
              <td><?php echo $data['booking_id']; ?> </td>
              <td><?php echo $data['title'].'. '.$data['name']; ?>    </td>
              <td> <?php echo $data['age']; ?> </td>
              <td> <?php echo ucfirst($data['gender']); ?></td>                       
            </tr>
          <?php } ?> 
        </table>
        </div>
      </div>
      
    </div>
    <!--===================================================-->
    <!--End page content-->
  </div>
  <!--===================================================-->
  <!--END CONTENT CONTAINER-->
  
</div>